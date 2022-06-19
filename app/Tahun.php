<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    //
    public function laporan_surat(){
        return $this->belongsTo('App\Model\LaporanSurat');
    }
}
