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
//    return view('auth/login');
    if(Auth::check()){
        return view('home');
    }else{
        return view('auth/login');
    }
});

Auth::routes();


//home
Route::get('/home', 'HomeController@index')->name('home');


//mail
Route::get('/mail', 'MailController@index')->name('mail');
Route::get('/mailOut', 'MailController@mailOut')->name('mailOut');
Route::get('/mailWrite', 'MailController@mailWrite')->name('mailWrite');


//manager
Route::get('/user', 'UserController@index')->name('user');

Route::get('/group', 'GroupController@index')->name('group');
Route::post('/group/save', 'GroupController@save')->name('group.save');
Route::post('group/edit/{id}', 'GroupController@edit')->name('group.edit');
Route::post('group/delete/{id}', 'GroupController@delete')->name('group.delete');

Route::get('/km', 'KMController@index')->name('km');

Route::get('/document', 'DocumentController@index')->name('document');
Route::get('/document/store', 'DocumentController@store')->name('document.store');

Route::get('/notify', 'NotifyController@index')->name('notify');

Route::get('/car', 'CarController@index')->name('car');

Route::get('/meeting', 'MeetingRoomController@index')->name('meeting');

Route::get('/it', 'ITController@index')->name('it');
