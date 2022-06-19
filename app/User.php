<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->atributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function rekapitulasi_kop_surat(){
        return $this->belongsTo('App\Model\KonfigurasiKopSurat');
    }

    public function laporan_surat(){
        return $this->hasMany('App\Model\LaporanSurat');
    }

    public function rekapitulasi_surat(){
        return $this->hasMany('App\Model\RekapitulasiSurat');
    }

    public function nomor_surat(){
        return $this->hasMany('App\NomorSurat');
    }

    public function surat_pembuka(){
        return $this->hasMany('App\Model\SuratPembuka');
    }

    public function surat_penutup(){
        return $this->hasMany('App\Model\SuratPenutup');
    }
    
    public function cetak_surat(){
        return $this->hasMany('App\Model\CetakSurat');
    }
}
