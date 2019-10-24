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
Route::get('/', 'HomepageController@index')->name('homepage');
Route::get('/homepage', 'UserController@homepage')->name('homepage');
Route::get('/test/mail', function ()
{
    $kullanici = \App\Models\User::find(1);
    return new App\Mail\UserRegisterMail($kullanici);
});

Route::group(['prefix' => '/'], function ()
{
    Route::get('/signUp', 'UserController@signUpForm')->name('register.signUp');
    Route::post('/signUp', 'UserController@SignUp');
    Route::get('/success', 'UserController@signUpSuccess')->name('signUpSuccess');
    Route::get('/terms', 'UserController@terms')->name('terms');
    Route::get('/user/activate/{key}', 'UserController@activate')->name('activate');
    Route::get('/login', 'UserController@signInForm')->name('login.signIn');
    Route::post('/login', 'UserController@signIn');
    Route::get('/homepage', 'UserController@homepage')->name('homepage');
});
