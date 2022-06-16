<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    //
    public function laporan_surat(){
        return $this->hasOne('App\Model\LaporanSurat');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
