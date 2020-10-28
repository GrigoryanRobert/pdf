<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'PdfController@index')->name('index');
Route::post('/', 'PdfController@index_post')->name('addresss');
Route::get('/upload', 'PdfController@upload')->name('upload');
Route::get('/show', 'PdfController@show')->name('show');
Route::post('/upload', 'PdfController@fileUploadPost')->name('fileupload');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

