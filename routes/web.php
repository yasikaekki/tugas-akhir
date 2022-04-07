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

Route::get('/', function () {
    $judul = 'Selamat Datang';
    return view('welcome', compact('judul'));
});

Auth::routes();  

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function(){ 
    Route::get('/', 'HomeController@index')->name('home'); 
    Route::resource('/anggota', 'Users\AnggotaController');
    Route::get('/biodata', 'Users\BiodataController@index')->name('anggota.biodata.index');
    Route::resource('/profil', 'Users\AkunController');
});