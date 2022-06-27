<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LaporanSurat extends Model
{
    //
    public function cetak_surat(){
        return $this->belongsTo('App\Model\CetakSurat');
    }
}
