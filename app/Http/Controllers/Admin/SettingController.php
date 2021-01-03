<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\setting;
use Carbon\Carbon;

class SettingController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function setting(){
    	$data = setting::latest()->get();
    	return view('admin.setting.add-setting', compact('data'));
    }

    public function storeSetting(Request $request){
    	$request->validate([
    		'address' => 'required|max:255',
    		'phone' => 'required|max:13',
    		'fax' => 'required|max:25',
    		'email' => 'required|max:30',
    		'social' => 'required|max:100',
    		'about' => 'required|max:255'
    	]);

    	setting::insert([
    		'address' =>$request->address,
    		'phone' =>$request->phone,
    		'fax' =>$request->fax,
    		'email' =>$request->email,
    		'social' =>$request->social,
    		'about' =>$request->about,
    		'created_at' => Carbon::now()
    	]);
    	return redirect()->back()->with('success','Athlete Added');
    }
}
