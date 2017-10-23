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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'TemplateController@index')->name('template');

Route::resource('campaign', 'CampaignController');
Route::resource('template', 'TemplateController');
Route::resource('bunch', 'BunchController');
Route::resource('bunch.subscriber', 'SubscriberController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
