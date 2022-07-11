<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuatSurat extends Model
{
    //
    protected $fillable = ['nomor_surat_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function konfigurasi_kop_surat(){
        return $this->belongsTo('App\Model\KonfigurasiKopSurat');
    }
    public function nomor_surat(){
        return $this->belongsTo('App\NomorSurat');
    }

    public function tubuh_surat(){
        return $this->belongsTo('App\Model\TubuhSurat');
    }
}
