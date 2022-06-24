<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    //
    public function buat_surat(){
        return $this->hasMany('App\Model\BuatSurat');
    }
}
