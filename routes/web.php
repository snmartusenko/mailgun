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
use Illuminate\Support\Facades\Mail;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'TemplateController@index')->name('template');

Route::resource('campaign', 'CampaignController');
Route::resource('template', 'TemplateController');
Route::resource('bunch', 'BunchController');
Route::resource('bunch.subscriber', 'SubscriberController');

Route::get('campaign/{campaign}/preview', ['as' => 'campaign.preview', 'uses' => 'CampaignController@preview']);
Route::get('campaign/{campaign}/send', ['as' => 'campaign.send', 'uses' => 'CampaignController@send']);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
