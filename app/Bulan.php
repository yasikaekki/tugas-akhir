<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    //
    public function rekapitulasi_surat(){
        return $this->hasMany('App\Model\RekapitulasiSurat');
    }
}
