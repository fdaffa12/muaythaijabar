<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Club;
use Carbon\Carbon;

class ClubController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$clubs = Club::latest()->get();
    	return view ('admin.club.index',compact('clubs'));
    }

    public function StoreClub(Request $request){
    	$request->validate([
    		'club_name' => 'required|unique:clubs,club_name',
    	]);

    	Club::insert([
    		'club_name' =>$request->club_name,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->back()->with('success', 'Club Successfully Added');
    }

    public function Edit($club_id){
    	$club = Club::find($club_id);
    	return view('admin.club.edit', compact('club'));
    }

    public function UpdateClub(Request $request){
    	$club_id = $request->id;

    	Club::find($club_id)->update([
    		'club_name' => $request->club_name,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->route('admin.club')->with('ClubUpdate', 'Club Successfully Update');
    }

    public function Delete($club_id){
		Club::find($club_id)->delete();
		return redirect()->back()->with('delete','Club deleted');
	}

	public function Inactive($club_id){
		Club::find($club_id)->update(['status' => 0]);
		return redirect()->back()->with('ClubUpdate','Club Inactive');	
	}

	public function Active($club_id){
		Club::find($club_id)->update(['status' => 1]);
		return redirect()->back()->with('ClubUpdate','Club Active');
	}
}
