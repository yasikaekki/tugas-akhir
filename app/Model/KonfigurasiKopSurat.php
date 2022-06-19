<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KonfigurasiKopSurat extends Model
{
    //
    protected $fillable = ['user_id', 'lokasi_foto'];

    public function cetak_surat()
    {
       return $this->hasMany('App\Model\CetakSurat');
    }

    public function konfigurasi_kop_surat()
    {
       return $this->hasMany('App\Model\KonfigurasiKopSurat');
    }
}
