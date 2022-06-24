<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RekapitulasiSurat extends Model
{
    //

    public function buat_surat(){
        return $this->belongsTo('App\Model\BuatSurat');
    }
}
