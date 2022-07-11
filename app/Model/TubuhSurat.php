<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TubuhSurat extends Model
{
    //
    protected $fillable = ['buat_surat_id'];

    public function buat_surat(){
        return $this->hasMany('App\Model\BuatSurat');
    }
}
