<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

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

    Route::get('/', 'WelcomeController@index');

    Route::get('/home', 'HomeController@index');

    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard.index');
    });


    Route::resource('profile', 'ProfileController');

    Route::get('news', 'NewsController@index');

    Route::post('/request', ['uses'=>'RequestController@store', 'as'=>'request.store']);

    Route::get('/request', ['uses' => 'RequestController@create', 'as' => 'request.create']);

    Route::resource('/money', 'RequestMoneyController');

    Route::get('/history', 'HistoryMoneyController@index');

    Route::get('/calc', 'CalcController@index');

    Route::get('/offers', 'OfferController@index');

    Route::get('/conclusion/{id}', 'ConclusionController@getDeposit');
    Route::get('/conclusion', 'ConclusionController@index');
    Route::post('/conclusion', array(
        'uses' => 'ConclusionController@store',
        'as' => 'conclusion.store'
    ));

    Route::post('/profile/{id}/update',
        array(
            'uses' => 'ProfileController@update',
            'as' => 'profiles.update'));

    Route::get('/messenger', 'ChatController@index');
    Route::post('/sendmessage', 'ChatController@sendMessage');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'web'], function () {

    Route::resource('dashboard', 'AdminController');

    Route::model('news', 'App\\Models\\News');
    Route::resource('news', 'AdminNewsController');

    Route::model('user', 'App\\Models\\User');
    Route::resource('user', 'AdminUserController');

    Route::post('user/{user}/block', array(
        'uses' => 'AdminUserController@block',
        'as' => 'admin.user.block',
    ));

    Route::get('/user/{user}/addBalance',
        array('uses' => 'AdminModifyController@createBalance',
            'as' => 'admin.user.addmoney'));

    Route::post('/user/storeBalance',
        array('uses' => 'AdminModifyController@storeBalance',
            'as' => 'admin.user.storebalance'));

    Route::get('/request', ['uses'=>'AdminRequestController@index', 'as' => 'admin.request.index']);
    Route::delete('/request/{id}', ['uses' => 'AdminRequestController@delete', 'as' => 'admin.request.delete']);



    Route::resource('percent', 'AdminPercentController');

    Route::resource('course', 'AdminCourseController');

    Route::resource('days', 'AdminDaysController');

    Route::resource('/history', 'AdminHistoryMoneyController');

    Route::post('history/{req}/block', array(
        'uses' => 'AdminHistoryMoneyController@block',
        'as' => 'admin.money.block',
    ));

    Route::get('conclusion', array(
        'uses' => 'AdminConclusionController@index',
        'as' => 'admin.conclusion.index',
    ));

    Route::delete('conclusion/{id}', array(
        'uses' => 'AdminConclusionController@delete',
        'as' => 'admin.conclusion.destroy',
    ));

    Route::post('conclusion/{id}/success', array(
        'uses' => 'AdminConclusionController@success',
        'as' => 'admin.conclusion.success',
    ));
});


