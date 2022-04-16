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
    if(!Auth::user()){
        return view('welcome', compact('judul'));
    }else{
        return redirect()->route('home');
    }
});

// Auth::routes(); 
Auth::routes([
    'register' => false, 
    'verify' => false,
    'confirm' => false,
    'email' => false,
    'reset' => false
]); 

Route::group(['prefix' => '/', 'middleware' => 'auth'], function(){ 
    Route::get('home', 'HomeController@index')->name('home'); 
    Route::resource('surat/nomor', 'Users\NomorSuratController');
    Route::resource('surat/pembuka', 'Users\SuratPembukaController');
    Route::get('surat/penutup', 'Users\SuratPenutupController@index')->name('surat.suratpenutup.index');
    Route::get('laporan', 'Users\LaporanSuratController@index')->name('laporan.index');
    Route::get('rekapitulasi', 'Users\RekapitulasiSuratController@index')->name('rekapitulasi.index');
    Route::get('anggota', 'Users\AnggotaController@index')->name('anggota.index');
    Route::get('biodata', 'Users\BiodataController@index')->name('anggota.biodata.index');
    Route::resource('konfigurasi', 'Users\KonfigurasiKopSuratController');
    Route::resource('profil', 'Users\AkunController');
});