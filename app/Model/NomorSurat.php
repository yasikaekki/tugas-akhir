<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
   //
   public function laporan_surats(){
      return $this->hasMany('App\Model\LaporanSurat');
   }

   public function users(){
      return $this->hasMany('App\User');
   }

    public function SuratPembuka()
    {
       return $this->hasMany('App\Model\SuratPembuka');
    }

    public function SuratPenutup()
    {
       return $this->hasMany('App\Model\SuratPenutup');
    }
}
