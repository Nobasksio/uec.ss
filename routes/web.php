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

Route::get('/', 'PublicController@index');

Route::prefix('admin')->group(function(){

    Route::get('restaurant','PublicController@restaurantList')->name('restaurant_list');
    Route::get('restaurant_creat', 'PublicController@restaurantCreate')->name('restaurant_creat');
    Route::get('restaurant/{userId}', 'PublicController@restaurantRedact')->name('restaurant_redact');

    Route::get('position','PublicController@positionList')->name('position_list');
    Route::get('position_creat', 'PublicController@positionCreat')->name('position_creat');
    Route::get('position/{userId}', 'PublicController@positionRedact')->name('position_redact');

    Route::get('user','PublicController@userlist')->name('user_list');
    Route::get('user_invite', 'PublicController@invite')->name('user_invite');
    Route::post('user_invite', 'PublicController@invitePost')->name('userInvitePost');
    Route::get('user/{userId}', 'PublicController@userinfoist');

});

Auth::routes();

//Route::get('/register', 'RegisterController@index')->name('register');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/accept_invite', 'InviteController@acceptInvite')->name('accept_invite');
Route::Post('/accept_invite', 'InviteController@acceptInvitePost')->name('accept_invite_post');