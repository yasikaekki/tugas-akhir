<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LaporanSurat extends Model
{
    //
    public function nomor_surat(){
        return $this->belongsTo('App\Model\NomorSurat');
    }

    public function users(){
        return $this->hasMany('App\User');
    }


}
