<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsCategory;
use Carbon\Carbon;

class NewsCategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index (){
		$newscats = NewsCategory::latest()->get();
		return view('admin.news_cat.index', compact('newscats'));
	}

	public function StoreCat(Request $request){
		$request->validate([
			'newscat_name' => 'required|unique:news_categories,newscat_name'
		]);

		NewsCategory::insert([
			'newscat_name' => $request->newscat_name,
			'created_at' => Carbon::now()
		]);

		return redirect()->back()->with('success','Category added');
	}

	public function Edit($newscat_id){
		$newscat = NewsCategory::find($newscat_id);
		return view('admin.news_cat.edit', compact('newscat'));
	}

	public function UpdateCat(Request $request){
		$newscat_id = $request->id;

		NewsCategory::find($newscat_id)->update([
			'newscat_name' => $request->newscat_name,
			'created_at' => Carbon::now()
		]);

		return redirect()->route('admin.newscat')->with('Catupdated','Category updated');
	}

	public function Delete($newscat_id){
		NewsCategory::find($newscat_id)->delete();
		return redirect()->back()->with('delete','Category deleted');
	}

	public function Inactive($newscat_id){
		NewsCategory::find($newscat_id)->update(['status' => 0]);
		return redirect()->back()->with('Catupdated','Category Inactive');	
	}

	public function Active($newscat_id){
		NewsCategory::find($newscat_id)->update(['status' => 1]);
		return redirect()->back()->with('Catupdated','Category Active');
	}
}
