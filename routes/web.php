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

Route::group(['prefix' => '/', 'middleware' => 'auth'], function(){ 
    Route::get('home', 'HomeController@index')->name('home'); 
    Route::get('surat/nomor', 'Users\NomorSuratController@index')->name('surat.nosurat.index');
    Route::get('surat/pembuka', 'Users\SuratPembukaController@index')->name('surat.suratpembuka.index');
    Route::get('surat/penutup', 'Users\SuratPenutupController@index')->name('surat.suratpenutup.index');
    Route::resource('anggota', 'Users\AnggotaController');
    Route::get('biodata', 'Users\BiodataController@index')->name('anggota.biodata.index');
    Route::resource('profil', 'Users\AkunController');
});