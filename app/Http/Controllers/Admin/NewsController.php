<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\NewsCategory;
use Intervention\Image\Facades\Image;
Use Carbon\Carbon;

class NewsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNews (){
    	$news = News::latest()->get();
    	$newscats = NewsCategory::latest()->get();
    	return view ('admin.news.add', compact('news','newscats'));
    }

    public function storeNews(Request $request){
    	$request->validate([
    		'news_tittle' => 'required|max:255',
    		'newscat_id' => 'required|max:255',
    		'long_description' => 'required',
    	],[
    		'newscat_id.required' => 'Select category name',
    	]);

    	$imag_one = $request->file('image_one');
    	$name_gen=hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
    	Image::make($imag_one)->resize(270,270)->save('upload/img/news/'.$name_gen);
    	$img_url1 = 'upload/img/news/'.$name_gen;

    	News::insert([
    		'newscat_id' => $request->newscat_id,
    		'news_tittle' => $request->news_tittle,
    		'news_slug' => strtolower(str_replace(' ','-',$request->news_tittle)),
    		'long_description' => $request->long_description,
    		'image_one' => $img_url1,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->back()->with('success', 'News Added');
    }

    public function manageNews(){
    	$news = News::orderby('id', 'DESC')->get();
    	return view('admin.news.manage', compact('news'));
    }

    public function editNews($news_id){
    	$news = News::findOrFail($news_id);
    	$newscats = NewsCategory::latest()->get();
    	return view('admin.news.edit', compact('news','newscats'));
    }

    public function updateNews(Request $request){
        $news_id = $request->id;

        News::findOrFail($news_id)->Update([
        'newscat_id' => $request->newscat_id,
        'news_tittle' => $request->news_tittle,
        'news_slug' => strtolower(str_replace(' ','-',$request->news_tittle)),
        'long_description' => $request->long_description,
        'created_at' => Carbon::now()
        ]);

        return redirect()->route('manage-news')->with('success', 'News succesfully updated');
    }

    public function updateImage(Request $request){
        $news_id = $request->id;
        $old_one = $request->img_one;

        if($request->has('image_one')){
            unlink($old_one);
            $imag_one = $request->file('image_one');
            $name_gen=hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('upload/img/news/'.$name_gen);
            $img_url1 = 'upload/img/news/'.$name_gen;

            News::findOrFail($news_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now()
            ]);

            return redirect()->Route('manage-news')->with('success','Image successfully updated');
        }
    }

    public function destroy($news_id){
            $image = News::findOrFail($news_id);
            $img_one = $image->image_one;
            unlink($img_one);

            News::findOrFail($news_id)->delete();
            return redirect()->back()->with('delete', 'successfully deleted');
    }

    public function Inactive($news_id){
        News::findOrFail($news_id)->update(['status' => 0]);
        return redirect()->back()->with('Catupdated','News Inactive');   
    }

    public function Active($news_id){
        News::findOrFail($news_id)->update(['status' => 1]);
        return redirect()->back()->with('Catupdated','News Active');
    }
}
