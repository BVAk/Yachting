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
Route::get('/addyacht', function () {
	return view('admin.categories.addyacht');
});
Route::get('/vue', function () {
	return view('vue.vue_tutorial');
});
Route::get('/', function () {
	return view('welcome');
});

Route::get('booking/{yachts_id}', function ($yachts_id) {
	return view('book')->with('yachts_id',$yachts_id);
});
Route::get('yachts/{yachts_id}', function ($yachts_id) {
	return view('previewyachts')->with('yachts_id',$yachts_id);
});
Route::post('/book', 'BookController@store');

Route::post('yachts/{yachts_id}', 'PreviewController@update');

Route::get('/countries/{countries_id}', function ($Countries_id) {
	return view('yachts')->with('Countries_id',$Countries_id);
});
Route::get('/countries/{countries_id}/{{Yacht_marina}}', function ($Countries_id,$Yacht_marina) {
	return view('yachts')->with('Countries_id',$Countries_id)->with('Yacht_marina',$Yacht_marina);
});
Route::get('/countries', 'CountriesController@index');
Route::get('/cancel', function () {
	return view('cancel');
});

Route::get('/yachts', 'AllYachtController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
