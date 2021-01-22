<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Athlete;
use App\Category;
use App\Club;
use App\Kelas;
use App\Pengcab;
use Intervention\Image\Facades\Image;
Use Carbon\Carbon;

class AthleteController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function addAthlete (){
    	$categories = Category::orderby('category_name', 'ASC')->get();
    	$clubs = Club::orderby('club_name', 'ASC')->get();
    	$kelass = Kelas::orderby('kelas_name', 'ASC')->get();
    	$pengcabs = Pengcab::orderby('pengcab_name', 'ASC')->get();
    	return view ('admin.athlete.add', compact('categories', 'clubs', 'kelass', 'pengcabs'));
    }

    public function storeAthlete(Request $request) {
    	$request->validate([
    		'athlete_name' => 'required|max:255',
    		'pengcab_id' => 'required|max:255',
    		'category_id' => 'required|max:255',
    		'club_id' => 'required|max:255',
    		'kelas_id' => 'required|max:255',
    		'address' => 'required|max:255',
            'gender' => 'required',
    		'birthday' => 'required|date:Y-m-d',
    		'prestasi' => 'required|max:255',
    		'image_one' => 'required|mimes:jpg,jpeg,png,gif',
    	],[
    		'category_id.required' => 'Select category name',
    		'pengcab_id.required' => 'Select pengcab name',
    		'club_id.required' => 'Select club name',
    		'kelas_id.required' => 'Select kelas name',
    	]);

    	$imag_one = $request->file('image_one');
    	$name_gen=hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    	Image::make($imag_one)->resize(270,270)->save('upload/img/athlete/'.$name_gen);
    	$img_url1 = 'upload/img/athlete/'.$name_gen;

    	Athlete::insert([
    		'category_id' => $request->category_id,
    		'pengcab_id' => $request->pengcab_id,
    		'club_id' => $request->club_id,
    		'kelas_id' => $request->kelas_id,
    		'athlete_name' => $request->athlete_name,
    		'athlete_slug' => strtolower(str_replace(' ','-',$request->athlete_name)),
    		'address' => $request->address,
            'gender' => $request->gender,
    		'birthday' => $request->birthday,
    		'prestasi' => $request->prestasi,
    		'image_one' => $img_url1,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->back()->with('success','Athlete Added');
    }

    public function manageAthlete(){
    	$athletes = Athlete::orderBy('id','DESC')->get();
    	return view('admin.athlete.manage', compact('athletes'));
    }

    public function editAthlete($athlete_id){
    	$athlete = Athlete::findOrFail($athlete_id);
    	$categories = Category::latest()->get();
    	$clubs = Club::latest()->get();
    	$kelass = Kelas::latest()->get();
    	$pengcabs = Pengcab::latest()->get();
    	return view('admin.athlete.edit', compact('athlete','categories','clubs', 'kelass', 'pengcabs'));
    }

    public function updateAthlete(Request $request){
    	$athlete_id = $request->id;

    	Athlete::findOrFail($athlete_id)->update([
    		'category_id' => $request->category_id,
    		'pengcab_id' => $request->pengcab_id,
    		'club_id' => $request->club_id,
    		'kelas_id' => $request->kelas_id,
    		'athlete_name' => $request->athlete_name,
    		'athlete_slug' => strtolower(str_replace(' ','-',$request->athlete_name)),
    		'address' => $request->address,
            'gender' => $request->gender,
    		'birthday' => $request->birthday,
    		'prestasi' => $request->prestasi,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->route('manage-athletes')->with('success', 'Athlete Data Updated');
    }

    public function updateImage(Request $request){
    	$athlete_id = $request->id;
    	$old_one = $request->img_one;

    	if($request->has('image_one')){
    		unlink($old_one);
    		$imag_one = $request->file('image_one');
	    	$name_gen=hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
	    	Image::make($imag_one)->resize(270,270)->save('upload/img/athlete/'.$name_gen);
	    	$img_url1 = 'upload/img/athlete/'.$name_gen;

	    	Athlete::findOrFail($athlete_id)->update([
	    		'image_one' => $img_url1,
	    		'updated_at' => Carbon::now()
	    	]);

	    	return redirect()->Route('manage-athletes')->with('success','Image successfully updated');
    	}
    }

    public function destroy($athlete_id){
    		$image = Athlete::findOrFail($athlete_id);
    		$img_one = $image->image_one;
    		unlink($img_one);

    		Athlete::findOrFail($athlete_id)->delete();
    		return redirect()->back()->with('delete', 'successfully deleted');
    }

    public function Inactive($athlete_id){
		Athlete::findOrFail($athlete_id)->update(['status' => 0]);
		return redirect()->back()->with('Catupdated','Athlete Inactive');	
	}

	public function Active($athlete_id){
		Athlete::findOrFail($athlete_id)->update(['status' => 1]);
		return redirect()->back()->with('Catupdated','Athlete Active');
	}
}
