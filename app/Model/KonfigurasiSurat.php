<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KonfigurasiSurat extends Model
{
    //
    public function cetak_surat()
   {
       return $this->hasMany('App\Model\BuatSurat');
   }
}
