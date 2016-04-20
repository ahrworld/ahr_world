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

// bs



Route::get('/password_end', function(){
	return view('auth/bs_pwd_end');
});

Route::get('/news', function(){
	return view('news');
});
Route::get('/profile', function(){
	return view('profile');
});

Route::get('/mail-box', function(){
	return view('mail-box');
});

Route::get('/view', function(){
	return view('view');
});
Route::get('/hot-user', function(){
	return view('hot_user');
});
Route::get('/filys', function(){
	return view('index');
});
//m
// Route::get('/login', function(){
// 	return view('auth/m_login');
// });

Route::get('/step', function(){
	return view('step');
});
Route::get('/portfolio', function(){
	return view('portfolio');
});

Route::get('/search', function(){
	return view('m_search');
});
Route::get('/m_profile', function(){
	return view('m_profile');
});

Route::get('/proflie_b2', function(){
	return view('bs_sidebar/profile');
});
Route::get('news_b2', function(){
	return view('bs_sidebar/news');
});
//m before
Route::get('/portfolio_b', function(){
	return view('protfolio_b');
});
Route::get('/company', function(){
	return view('company');
});
//form

Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts', 'PostsController');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('auth/fb', 'FBController@redirectToProvider');
	Route::get('auth/fb/callback', 'FBController@handleProviderCallback');

	Route::get('auth/google', 'GoogleController@redirectToProvider');
	Route::get('auth/google/callback', 'GoogleController@handleProviderCallback');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::get('/date', 'TaskController@testdate');
	// Route::post('/task',function(){
	//    // return response()->json(['name' => 'Abigail', 'state' => 'CA']);
	// 	return 'bruce';
	// });
	Route::delete('/task/{task}', 'TaskController@destroy');
    Route::get('/home', 'HomeController@index');

    Route::get('/bs_info', 'BusinessController@bs_info');
    Route::post('/business_a', 'BusinessController@business_a');
	Route::get('/bs_end', function(){
	return view('auth/bs_signin-end');
	});
	Route::get('/bs_setting', function(){
		return view('bs_setting');
	});
	//m
	Route::get('/register', function(){
		return view('auth/register');
	});
});


