<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','FrontendController@index')->name('home.route');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('admin','Admin\LoginController@showLoginForm')->name('login.admin');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','AdminController@Logout')->name('admin.logout');
//=======================Admin Route============================================================
// Klub Section
Route::get('admin/club', 'Admin\ClubController@index')->name('admin.club');
Route::post('admin/clubs-store', 'Admin\ClubController@StoreClub')->name('store.club');
Route::get('admin/clubs/edit/{club_id}','Admin\ClubController@Edit');
Route::post('admin/clubs-update', 'Admin\ClubController@UpdateClub')->name('update.club');
Route::get('admin/clubs/delete/{club_id}','Admin\ClubController@Delete');
Route::get('admin/clubs/inactive/{club_id}','Admin\ClubController@Inactive');
Route::get('admin/clubs/active/{club_id}','Admin\ClubController@Active');
// Pengcab Section
Route::get('admin/pengcab', 'Admin\PengcabController@index')->name('admin.pengcab');
Route::post('admin/pengcabs-store', 'Admin\PengcabController@StorePengcab')->name('store.pengcab');
Route::get('admin/pengcabs/edit/{pengcab_id}','Admin\PengcabController@Edit');
Route::post('admin/pengcabs-update', 'Admin\PengcabController@UpdatePengcab')->name('update.pengcab');
Route::get('admin/pengcabs/delete/{pengcab_id}','Admin\PengcabController@Delete');
Route::get('admin/pengcabs/inactive/{pengcab_id}','Admin\PengcabController@Inactive');
Route::get('admin/pengcabs/active/{pengcab_id}','Admin\PengcabController@Active');
// Category Section
Route::get('admin/categories', 'Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store', 'Admin\CategoryController@StoreCat')->name('store.category');
Route::get('admin/categories/edit/{cat_id}','Admin\CategoryController@Edit');
Route::post('admin/categories-update', 'Admin\CategoryController@UpdateCat')->name('update.category');
Route::get('admin/categories/delete/{cat_id}','Admin\CategoryController@Delete');
Route::get('admin/categories/inactive/{cat_id}','Admin\CategoryController@Inactive');
Route::get('admin/categories/active/{cat_id}','Admin\CategoryController@Active');
//Class Section
Route::get('admin/kelas', 'Admin\KelasController@index')->name('admin.kelas');
Route::post('admin/kelass-store', 'Admin\KelasController@StoreKelas')->name('store.kelas');
Route::get('admin/kelass/edit/{kelas_id}','Admin\KelasController@Edit');
Route::post('admin/kelass-update', 'Admin\KelasController@UpdateKelas')->name('update.kelas');
Route::get('admin/kelass/delete/{kelas_id}','Admin\KelasController@Delete');
Route::get('admin/kelass/inactive/{kelas_id}','Admin\KelasController@Inactive');
Route::get('admin/kelass/active/{kelas_id}','Admin\KelasController@Active');
//setting
Route::get('admin/setting', 'Admin\SettingController@setting')->name('add.setting');
Route::post('admin/setting/store', 'Admin\SettingController@storeSetting')->name('addsetting');
Route::get('admin/setting/edit/{setting_id}', 'Admin\SettingController@editSetting');
Route::post('admin/setting/update', 'Admin\SettingController@updateSetting')->name('updatesetting');
// Athlete
Route::get('admin/athletes/add','Admin\AthleteController@addAthlete')->name('add-athletes');
Route::post('admin/athletes/store', 'Admin\AthleteController@storeAthlete')->name('store-athletes');
Route::get('admin/athletes/manage','Admin\AthleteController@manageAthlete')->name('manage-athletes');
Route::get('admin/athletes/edit/{athlete_id}','Admin\AthleteController@editAthlete');
Route::post('admin/athletes/update', 'Admin\AthleteController@updateAthlete')->name('update-athletes');
Route::post('admin/athletes/image-update', 'Admin\AthleteController@updateImage')->name('update-image');
Route::get('admin/athletes/delete/{athlete_id}','Admin\AthleteController@destroy');
Route::get('admin/athletes/inactive/{athlete_id}','Admin\AthleteController@Inactive');
Route::get('admin/athletes/active/{athlete_id}','Admin\AthleteController@Active');
// EventaddEvent
Route::get('admin/events/add', 'Admin\EventController@addEvent')->name('add.events');
Route::post('admin/events/store', 'Admin\EventController@storeEvent')->name('store-events');
Route::get('admin/events/manage','Admin\EventController@manageEvent')->name('manage-events');
Route::get('admin/events/edit/{event_id}','Admin\EventController@editEvent');
Route::post('admin/events/update', 'Admin\EventController@updateEvent')->name('update-events');
Route::post('admin/events/image-update', 'Admin\EventController@updateImage')->name('update-eventimg');
Route::get('admin/events/delete/{event_id}','Admin\EventController@destroy');
Route::get('admin/events/inactive/{event_id}','Admin\EventController@Inactive');
Route::get('admin/events/active/{event_id}','Admin\EventController@Active');
// News Category
Route::get('admin/newscat', 'Admin\NewsCategoryController@index')->name('admin.newscat');
Route::post('admin/newscat-store', 'Admin\NewsCategoryController@StoreCat')->name('store.newscat');
Route::get('admin/newscat/edit/{newscat_id}','Admin\NewsCategoryController@Edit');
Route::post('admin/newscat-update', 'Admin\NewsCategoryController@UpdateCat')->name('update.newscat');
Route::get('admin/newscat/delete/{newscat_id}','Admin\NewsCategoryController@Delete');
Route::get('admin/newscat/inactive/{newscat_id}','Admin\NewsCategoryController@Inactive');
Route::get('admin/newscat/active/{newscat_id}','Admin\NewsCategoryController@Active');
// News
Route::get('admin/news/add', 'Admin\NewsController@addNews')->name('add.news');
Route::post('admin/news/store', 'Admin\NewsController@storeNews')->name('store-news');
Route::get('admin/news/manage','Admin\NewsController@manageNews')->name('manage-news');
Route::get('admin/news/edit/{news_id}','Admin\NewsController@editNews');
Route::post('admin/news/update', 'Admin\NewsController@updateNews')->name('update-news');
Route::post('admin/news/image-update', 'Admin\NewsController@updateImage')->name('update-newsimg');
Route::get('admin/news/delete/{news_id}','Admin\NewsController@destroy');
Route::get('admin/news/inactive/{news_id}','Admin\NewsController@Inactive');
Route::get('admin/news/active/{news_id}','Admin\NewsController@Active');

//Frotend
//athlete
Route::get('athlete', 'FrontendController@athlete')->name('athletes');
Route::get('athlete/details/{athlete_slug}', 'FrontendController@athleteDetail');
//category
Route::get('category/{cat_id}', 'FrontendController@category')->name('categories');
Route::get('category/news/{news_slug}', 'FrontendController@article')->name('news');
//Event
Route::get('event', 'FrontendController@event')->name('event');
Route::get('event/details/{event_slug}', 'FrontendController@eventArticle')->name('event-article');
//Search
Route::get('search','FrontendController@search');
Route::get('search-athlete','FrontendController@athsearch');