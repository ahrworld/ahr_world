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


Route::get('/hot-user', function(){
	return view('hot_user');
});
Route::get('/filys', function(){
	return view('index');
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



//m before
Route::get('/portfolio_b', function(){
	return view('protfolio_b');
});
Route::get('/company', function(){
	return view('company');
});

Route::get('/ahr/privacy', function(){
    return view('privacy');
});
Route::get('/ahr/policy', function(){
    return view('policy');
});
Route::post('/language', array(
        'Middleware' => 'LanguageSwitcher',
        'uses' => 'LanguageController@index'
));
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

Route::get('ahr/admin','AdminController@index');
Route::get('ahr/admin/exp_job_category','AdminController@exp_job_category');
Route::get('ahr/admin/exp_job','AdminController@exp_job');
Route::get('ahr/admin/subject','AdminController@subject');
Route::get('ahr/admin/personnels','AdminController@personnels');
Route::get('ahr/admin/business','AdminController@business');
Route::get('ahr/admin/contact','AdminController@contact');
Route::post('ahr/admin/contact/delete','AdminController@contact_delete');
Route::post('ahr/admin/personnels/delete','AdminController@personnels_delete');
Route::post('ahr/admin/personnels/block','AdminController@personnels_block');
Route::post('ahr/admin/personnels/unblock','AdminController@personnels_unblock');
Route::post('ahr/admin/business/delete','AdminController@business_delete');
Route::post('ahr/admin/business/block','AdminController@business_block');
Route::post('ahr/admin/business/unblock','AdminController@business_unblock');
Route::post('ahr/admin/exp_job/delete','AdminController@exp_job_delete');
Route::post('ahr/admin/exp_category/delete','AdminController@exp_category_delete');
Route::post('ahr/admin/subject/delete','AdminController@subject_delete');
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

    Route::post('/business/contact/us','HomeController@contact');

    Route::get('/bs_info', 'BusinessController@bs_info');
    Route::get('/test', 'BusinessController@test');

    Route::post('/business_a', 'BusinessController@business_a');
    Route::post('/business_b', 'BusinessController@business_b');

    Route::get('/profile_b2','BusinessController@profile');

    Route::post('/business/update', 'BusinessController@update');
    Route::post('/business/image_big', 'BusinessController@image_big');
    Route::post('/business/image_small', 'BusinessController@image_small');
    // bs_setting
    Route::get('/business/setting', 'BusinessController@setting');
    // bs_summary
    Route::post('/business/summary', 'BusinessController@summary');
    Route::post('/business/recruitments_add', 'BusinessController@recruitments_add');

    // bs_blog
    Route::get('/blog', function(){
         return view('bs_sidebar/profile_branch/tab3');
    });
    // bs interview_time
    Route::get('/interview/edit','BusinessController@interview');
    Route::post('/interview/edit/submit','BusinessController@interview_submit');

    Route::post('/business/blog','BusinessController@blog');
    Route::post('/business/preview','BusinessController@preview');
    Route::get('/news_b2', 'BusinessController@news');
    Route::get('personnel/{id}/',['as' => 'personnels.show' , 'uses' => 'BusinessController@show']);
    // bs mail_box
    Route::get('/mail_box_bs','MailBox\BusinessController@mail_box');
    Route::get('/mail_box_bs/{id}',['as' => 'mail_bs.show' , 'uses' => 'MailBox\BusinessController@mail_view']);
    Route::post('/mail_box_bs/delete','MailBox\BusinessController@delete');
    Route::post('/assess','MailBox\BusinessController@assess');

    Route::get('/bs_e', 'BusinessController@bs_e');
    // user
    Route::get('/step', 'UserController@step');
    Route::post('personnel_in', 'UserController@personnel_in');
    Route::post('/image_small', 'UserController@image_small');
    // user blog
    Route::post('/personnel/blog','UserController@blog');
    // user portfolio
    Route::post('/portfolio/add', 'UserController@portfolio_add');
    //
    Route::get('/mail_box','MailBox\UserController@mail_box');
    Route::get('/mail_box/{id}',['as' => 'mail.show' , 'uses' => 'MailBox\UserController@mail_view']);
    Route::post('/mail_box/delete','MailBox\UserController@delete');
    Route::get('/setting','UserController@setting');
    Route::get('/profile','UserController@profile');
    // 分析
    Route::post('/analysis','UserController@analysis');
    Route::get('/view/analysis','UserController@analysis_view');
    Route::get('/news','UserController@news');
    // 應徵
    Route::post('ttt','UserController@ttt');
    // リクエスト
    Route::post('message','UserController@message');
    // メールBOXへ
    Route::post('chat','UserController@chat');
    // お気に入り
    Route::post('like','UserController@like');
    // search
    Route::post('search','UserController@search');
    // 辭退
    Route::post('giveup','UserController@giveup');

    // user ger business view

    Route::get('business/company/{id}/',['as' => 'business.show' , 'uses' => 'UserController@show']);
    Route::get('schedule/{id}',['as' => 'schedule.show' , 'uses' => 'UserController@schedule']);
    Route::post('schedule/check','UserController@schedule_check');
    Route::post('personnels/update','UserController@personnels_update');



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


