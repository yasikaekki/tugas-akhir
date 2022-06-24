<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KonfigurasiKopSurat extends Model
{
    //
    protected $fillable = ['user_id', 'lokasi_foto'];

   public function user(){
      return $this->belongsTo('App\User');
   }

   public function cetak_surat()
   {
       return $this->hasMany('App\Model\CetakSurat');
   }

}
