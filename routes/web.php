<?php

use Illuminate\Support\Facades\Route;
use App\Model\CetakSurat;

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
    if(!Auth::user()){
        return redirect()->route('login');
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
    Route::resource('surat', 'Users\BuatSuratController');
    Route::resource('surat-agenda', 'Users\TubuhSuratController');
    Route::resource('surat-cetak', 'Users\CetakSuratController');
    Route::resource('list-surat', 'Users\ListSuratController');
    Route::get('surat-cetak/invoice', 'Users\CetakSuratController@invoice')->name('print');
    Route::get('laporan', 'Users\LaporanSuratController@index')->name('laporan.index');
    Route::get('rekapitulasi-bulan', 'Users\RekapitulasiSuratController@index')->name('rekapitulasi.bulan.index');
    Route::get('rekapitulasi-jenis-surat', 'Users\RekapitulasiSuratController@jenis_surat')->name('rekapitulasi.jenis_surat.index');
    Route::resource('anggota', 'Users\AnggotaController');
    Route::resource('konfigurasi', 'Users\KonfigurasiKopSuratController');
    Route::resource('profil', 'Users\ProfilController');
});