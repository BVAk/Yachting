<?php

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
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']], function(){
	Route::get('/','DashboardController@dashboard')->name('admin.index');
	Route::resource('/category','CategoryController',['as'=>'admin']);
});
Route::get('/', function () {
	return view('welcome');
});

Route::get('/page', function () {
	return view('page');
});


Route::get('/gallery', function () {
	return view('gallery');
});

Route::get('/countries', function () {
	return view('Countries\countries');
});

Route::get('/yachts', function () {
	//$country=DB::table('Countries')->get();
	return view('yachts');
});
//Route::get('page', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
