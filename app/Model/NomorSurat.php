<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    //
    public function SuratPembuka()
    {
       return $this->hasMany('App\Model\SuratPembuka');
    }

    public function SuratPenutup()
    {
       return $this->hasMany('App\Model\SuratPenutup');
    }
}
