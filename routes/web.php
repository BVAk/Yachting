<?php
Route::get('/{Booking_id}/oplata', function ($Booking_id) {
    return view('oplata')->with('Booking_id', $Booking_id);
});
Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/podtverZakaz', 'AdminController@podtverZakaz');
    Route::get('/Zakazi','AdminController@zakazi' );
    Route::get('/Delete', 'AdminController@deleteZakaz');
    Route::get('/Zakazi/{Countries_id}', function($Countries_id){
        return view ('admin.categories.Countries')->with('Countries_id',$Countries_id);});
    Route::get('/Zakazi/{Countries_id}/{Marinas_id}', function($Countries_id,$Marinas_id){
        return view ('admin.categories.Marinas')->with('Countries_id',$Countries_id)->with('Marinas_id',$Marinas_id);});
    Route::get('/Zakazi/{Countries_id}/yachts/{Yachts_id}', function($Countries_id,$Yachts_id){
        return view ('admin.categories.Yachts')->with('Countries_id',$Countries_id)->with('Yachts_id',$Yachts_id);});
    Route::get('/Zakaziz/{{Countries_id}}','AdminController@countries');
    Route::get('/addYacht','AdminController@addYacht');
    Route::post('/insertnewyacht','AdminController@insertnewyacht');
    
    Route::get('/editYacht','AdminController@editYacht');
    Route::get('/yachts/{Yachts_id}', function($Yachts_id){
        return view('admin.categories.editProfileYacht')->with('Yachts_id',$Yachts_id); });
    Route::post('/edityacht','AdminController@editprofile');

    Route::get('/yachts/delete/{Yachts_id}','AdminController@deleteYacht');
});


Route::get('/test', function () {
    return view('test');
});
Route::get('/downloadPDF/{booking_id}','HomeController@downloadPDF');
Route::get('/', function () {
    return view('welcome');
});
Route::get('booking/{yachts_id}', function ($yachts_id) {
    return view('book')->with('yachts_id', $yachts_id);
});
Route::get('yachts/{yachts_id}', function ($yachts_id) {
    return view('previewyachts')->with('yachts_id', $yachts_id);
});

Route::post('/insert', 'YachtController@store');
Route::post('/url', 'OplataController@loadImage');

Route::post('/agree', 'AdminController@agree');
Route::post('/cancel', 'AdminController@cancel');
Route::post('/delete', 'AdminController@delete');
Route::post('/return', 'AdminController@return');

Route::post('/book', 'BookController@store');
Route::get('/{booking}/edit/{status}', 'HomeController@edit')->name('yacht-edit');


Route::get('/countries/{countries_id}', function ($Countries_id) {
    return view('yachts')->with('Countries_id', $Countries_id);
});
Route::get('/routes/', function () { return view('routes');});
Route::get('/routes/{routes_id}', function ($routes_id) {
    return view('previewroutes')->with('routes_id', $routes_id);});
Route::get('/{countries_id}/{Date}', function ($Countries_id, $Date) {
    return view('yachts')->with('Countries_id', $Countries_id);
});

Route::get('/countries/{countries_id}/{Marinas_id}', function ($Countries_id, $Marinas_id) {
    return view('marinayachts')->with('Countries_id', $Countries_id)->with('Marinas_id', $Marinas_id);
});


Route::get('/countries', 'CountriesController@index');

Route::get('/yachts', 'AllYachtController@index');


Auth::routes();

