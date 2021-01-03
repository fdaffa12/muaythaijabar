<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengcab;
use Carbon\Carbon;

class PengcabController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index (){
		$pengcabs = Pengcab::latest()->get();
		return view ('admin.pengcab.index', compact('pengcabs'));
	}

	public function StorePengcab(Request $request){
		$request->validate([
			'pengcab_name' => 'required|unique:pengcabs,pengcab_name'
		]);

		Pengcab::insert([
			'pengcab_name' => $request->pengcab_name,
			'created_at' => Carbon::now(),
		]);

		return redirect()->back()->with('success', 'Pengcab Added');
	}

	public function edit($pengcab_id){
		$pengcab = Pengcab::find($pengcab_id);
		return  view ('admin.pengcab.edit', compact('pengcab'));
	}

	public function UpdatePengcab(Request $request){
		$pengcab_id = $request->id;

		Pengcab::find($pengcab_id)->update([
			'pengcab_name' => $request->pengcab_name,
			'created_at' => Carbon::now()
		]);

		return redirect()->route('admin.pengcab')->with('Update', 'Pengcab data successfully updated');
	}

	public function Delete($pengcab_id){
		Pengcab::find($pengcab_id)->delete();
		return redirect()->back()->with('delete','Pengcab delete added');
	}

	public function Inactive($pengcab_id){
		Pengcab::find($pengcab_id)->update(['status' => 0]);
		return redirect()->back()->with('Update','Pengcab Inactive');	
	}

	public function Active($pengcab_id){
		Pengcab::find($pengcab_id)->update(['status' => 1]);
		return redirect()->back()->with('Update','Pengcab Active');
	}
}
