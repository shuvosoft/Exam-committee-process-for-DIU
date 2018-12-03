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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']], function (){

    Route::post('feedback/{post}','FeedBackController@store')->name('feedback.store');
});

//Admin section route

Route::group(['as'=>'admin.' ,'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin'] ], function (){

    Route:: get('dashboard', 'DashboardController@index')->name('dashboard');
    Route:: resource('subject', 'SubjectController');
    Route:: resource('semester', 'SemesterController');
    Route:: resource('term', 'TermController');
    Route:: resource('mark', 'MarkController');
    Route:: resource('section', 'SectionController');
    Route:: resource('time', 'TimeController');


    Route:: resource('post', 'PostController');


    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    Route::get('authors','AuthorController@index')->name('author.index');
    Route::delete('authors/{id}','AuthorController@destroy')->name('author.destroy');
    Route::get('subAdmin/add','SubAdminAdd@addSubAdmin')->name('subAdmin.add');
    Route::resource('subAdmin/add/confirm','SubadminController');




});


//Author section route

Route::group(['as'=>'author.' ,'prefix'=>'author', 'namespace'=>'Author', 'middleware'=>['auth', 'author'] ], function (){

    Route:: get('dashboard', 'DashboardController@index')->name('dashboard');

    Route:: resource('post', 'PostController');

    Route::get('/public/post','PostController@public')->name('post.public');


    Route::get('feedBacks','FeedbackController@index')->name('feedBack.index');
    Route::delete('feedBacks/{id}','FeedbackController@destroy')->name('feedBack.destroy');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');



});