<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TubuhSurat extends Model
{
    //
    public function buat_surat(){
        return $this->belongsTo('App\Model\BuatSurat');
    }

    public function cetak_surat(){
        return $this->hasMany('App\Model\CetakSurat');
    }
}
