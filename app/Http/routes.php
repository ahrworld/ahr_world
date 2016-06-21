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


Route::get('/portfolio', function(){
	return view('portfolio');
});

Route::get('/search', function(){
	return view('m_search');
});
Route::get('/m_profile', function(){
	return view('m_profile');
});



//m before
Route::get('/portfolio_b', function(){
	return view('protfolio_b');
});
Route::get('/company', function(){
	return view('company');
});
//form


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
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/business', function () {
        return view('business');
    });
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
    Route::get('/test', 'BusinessController@test');
    Route::post('/business_a', 'BusinessController@business_a');
    Route::post('/business_b', 'BusinessController@business_b');

    Route::get('/profile_b2','BusinessController@profile');
    Route::post('/business/update', 'BusinessController@update');
    Route::post('/business/image', 'BusinessController@image');
    Route::post('/business/image/test', 'BusinessController@image_test');
    Route::post('/business/summary', 'BusinessController@summary');
    Route::post('/business/recruitments_add', 'BusinessController@recruitments_add');
    // bs mail_box
    Route::get('/mail_box_bs','BusinessController@mail_box');
    Route::get('/mail_box_bs/{id}',['as' => 'mail_bs.show' , 'uses' => 'BusinessController@mail_view']);
    // bs_blog
    Route::post('/business/blog','BusinessController@blog');
    Route::get('/news_b2', 'BusinessController@news');
    // user
    Route::get('/step', 'UserController@step');
    Route::post('personnel_in', 'UserController@personnel_in');
    Route::get('/mail_box','UserController@mail_box');
    Route::get('/mail_box/{id}',['as' => 'mail.show' , 'uses' => 'UserController@mail_view']);
    Route::get('/profile','UserController@profile');
    Route::get('/news','UserController@news');
    Route::post('ttt','UserController@ttt');
    Route::post('like','UserController@like');
    // search
    Route::post('search','UserController@search');
    // user ger business view
    Route::get('posts/{id}',['as' => 'posts.show' , 'uses' => 'UserController@show']);

	Route::get('/bs_end', function(){
	return view('auth/bs_signin-end');
	});
	Route::get('/upload_ts', function(){
	return view('testupload');
	});
	Route::get('/bs_setting', function(){
		return view('bs_setting');
	});
	//m
	Route::get('/register', function(){
		return view('auth/register');
	});

});


