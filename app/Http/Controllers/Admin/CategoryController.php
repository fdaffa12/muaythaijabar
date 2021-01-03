<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index (){
		$categories = Category::latest()->get();
		return view('admin.category.index', compact('categories'));
	}

	public function StoreCat(Request $request){
		$request->validate([
			'category_name' => 'required|unique:categories,category_name'
		]);

		Category::insert([
			'category_name' => $request->category_name,
			'created_at' => Carbon::now()
		]);

		return redirect()->back()->with('success','Category added');
	}

	public function Edit($cat_id){
		$category = Category::find($cat_id);
		return view('admin.category.edit', compact('category'));
	}

	public function UpdateCat(Request $request){
		$cat_id = $request->id;

		Category::find($cat_id)->update([
			'category_name' => $request->category_name,
			'created_at' => Carbon::now()
		]);

		return redirect()->route('admin.category')->with('Catupdated','Category updated');
	}

	public function Delete($cat_id){
		Category::find($cat_id)->delete();
		return redirect()->back()->with('delete','Category deleted');
	}

	public function Inactive($cat_id){
		Category::find($cat_id)->update(['status' => 0]);
		return redirect()->back()->with('Catupdated','Category Inactive');	
	}

	public function Active($cat_id){
		Category::find($cat_id)->update(['status' => 1]);
		return redirect()->back()->with('Catupdated','Category Active');
	}
}
