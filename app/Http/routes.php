<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'pagesController@index');

Route::get('/edit', 'pagesController@editIndex');

Route::post('/edit', 'pagesController@saveEdit');

Route::resource('services', 'serviceController');

Route::resource('agreement', 'agreementController');

Route::resource('event', 'eventController');

Route::resource('help', 'helpController');

Route::get('contact', 'pagesController@contact');

Route::get('contact/{id}', 'pagesController@contactId');

Route::post('contact', 'pagesController@sendContact');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('login', function(){
	if(isset($_SESSION['Admin']))
		if($_SESSION['Admin'] == $_SERVER['REMOTE_ADDR'].'passwordHash'.password())
			return redirect('/');
	return view('auth.login');
});

Route::post('login', 'pagesController@login');

Route::get('logout', ['middleware'=>'Admin', function(){
	unset($_SESSION['Admin']);
	return redirect('/');
}]);

Route::get('changePassword', ['middleware' => 'Admin', function(){
	return view('auth.changePassword');
}]);

Route::post('changePassword', 'pagesController@changePassword');

Route::get('deletepic', 'serviceController@deletepic');

Route::get('editInfo/{name}', 'infoController@editSelected');
Route::post('editInfo', 'infoController@updateSelected');