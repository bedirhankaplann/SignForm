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
Route::get('/success', 'SignUpController@index')->name('signUpSuccess');
Route::get('/login', 'SignInController@index')->name('login.signIn');
Route::get('/terms', 'TermsController@index')->name('terms');
Route::get('/test/mail', function ()
{
    $kullanici = \App\Models\User::find(1);
    return new App\Mail\UserRegisterMail($kullanici);
});
Route::get('/user/activate/{key}', 'UserController@activate')->name('awsd');


Route::group(['prefix' => '/'], function ()
{
    Route::get('/signUp', 'UserController@signUpForm')->name('register.signUp');
    Route::post('/signUp', 'UserController@SignUp');
});
