<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete;
use App\NewsCategory;
use App\News;
use App\Event;

class FrontendController extends Controller
{
	public function __construct(){
		$newscats = NewsCategory::where('status','1')->get();
		view()->share(['newscats' => $newscats]);
	}

	public function index(){
		$banners = News::where('newscat_id','LIKE','%3%')->orderby('id','DESC')->get();
		$posts = News::where('status', '1')->orderby('id','DESC')->paginate(10);
		return view('index', compact('banners','posts'));
	}

	public function athlete(){
		$athletes = Athlete::where('status','1')->orderby('id','DESC')->paginate(12);
		return view('athlete', compact('athletes'));
	}

	public function athleteDetail($athlete_slug){
		$athlete = Athlete::where('athlete_slug', $athlete_slug)->first();
		return view('ath-det', compact('athlete'));
	}

	public function event(){
		$events = Event::where('status','1')->latest()->get();
		return view('event', compact('events'));
	}

	public function eventArticle($tittle_slug){
		$events = Event::where('tittle_slug', $tittle_slug)->first();
		$newscats = NewsCategory::where('status','1')->get();
        $latest = News::where('status','1')->orderby('id', 'DESC')->get();
		return view ('event-article', compact('events','newscats','latest'));
	}

	public function category($cat_id){
		$category = NewsCategory::findOrFail($cat_id);
		$posts = News::where('newscat_id','LIKE','%'.$category->id.'%')->orderby('id','DESC')->paginate(10);
		return view ('category', compact('category','posts'));
	}

	public function article($news_slug){
		$data = News::where('news_slug',$news_slug)->first();
        $views = $data->views;
        News::where('news_slug',$news_slug)->update(['views'=>$views + 1]);
        $newscats = NewsCategory::where('status','1')->get();
        $latest = News::where('status','1')->orderby('id', 'DESC')->get();
        return view ('article', compact('data','views', 'newscats','latest'));
	}

	public function search(Request $request){
		$query = $request->input('query');
		$posts = News::where('news_tittle', 'LIKE', "%$query%")->orderby('id','DESC')->paginate(10);
		return view('show', compact('posts'));
	}

	public function athsearch(Request $request){
		$query = $request->input('query');
		$posts = Athlete::where('athlete_name', 'LIKE', "%$query%")->orderby('id','DESC')->paginate(10);
		return view('search_athlete', compact('posts'));
	}
}
