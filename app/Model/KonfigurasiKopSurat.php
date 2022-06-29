<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KonfigurasiKopSurat extends Model
{
    //
   public function cetak_surat()
   {
       return $this->hasMany('App\Model\CetakSurat');
   }

}
