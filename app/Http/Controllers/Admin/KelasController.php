<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;
use Carbon\Carbon;

class KelasController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$kelass = Kelas::latest()->get();
    	return view ('admin.class.index',compact('kelass'));
    }

    public function StoreKelas(Request $request){
		$request->validate([
			'kelas_name' => 'required|unique:kelas,kelas_name'
		]);

		Kelas::insert([
			'kelas_name' => $request->kelas_name,
			'created_at' => Carbon::now(),
		]);

		return redirect()->back()->with('success', 'Kelas Added');
	}

		public function edit($kelas_id){
		$kelas = Kelas::find($kelas_id);
		return  view ('admin.class.edit', compact('kelas'));
	}

	public function UpdateKelas(Request $request){
		$kelas_id = $request->id;

		Kelas::find($kelas_id)->update([
			'kelas_name' => $request->kelas_name,
			'created_at' => Carbon::now()
		]);

		return redirect()->route('admin.kelas')->with('Update', 'Kelas data successfully updated');
	}

	public function Delete($kelas_id){
		Kelas::find($kelas_id)->delete();
		return redirect()->back()->with('delete','Kelas delete added');
	}

	public function Inactive($kelas_id){
		Kelas::find($kelas_id)->update(['status' => 0]);
		return redirect()->back()->with('Update','Kelas Inactive');	
	}

	public function Active($kelas_id){
		Kelas::find($kelas_id)->update(['status' => 1]);
		return redirect()->back()->with('Update','Kelas Active');
	}
}
