<?php
Route::get('/{Booking_id}/oplata', function ($Booking_id) {
	return view('oplata')->with('Booking_id',$Booking_id);
});
Route::get('/home', 'HomeController@index')->name('home');


 Route::prefix('/admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/podtverZakaz',function () {
         return view('admin.categories.podtverZakaz');
     });
     Route::get('/Zakazi',function () {
         return view('admin.categories.Zakazi');
     });
     Route::get('/index', function (){return view('admin.category.index');})->name('admin.category.index');
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
Route::post('/insert', 'YachtController@store');
Route::post('/url','OplataController@loadImage');
Route::post('/agree','Admin\DashboardController@agree');

Route::post('/book', 'BookController@store');
Route::get('/{booking}/edit/{status}', 'HomeController@edit')->name('yacht-edit');


Route::get('/countries/{countries_id}', function ($Countries_id) {
	return view('yachts')->with('Countries_id',$Countries_id);
});


Route::get('/{countries_id}/{Date}', function ($Countries_id,$Date) {
	return view('yachts')->with('Countries_id',$Countries_id);
});

Route::get('/countries/{countries_id}/{Marinas_id}', function ($Countries_id,$Marinas_id) {
	return view('marinayachts')->with('Countries_id',$Countries_id)->with('Marinas_id',$Marinas_id);
});



Route::get('/countries', 'CountriesController@index');

Route::get('/yachts', 'AllYachtController@index');


Auth::routes();

