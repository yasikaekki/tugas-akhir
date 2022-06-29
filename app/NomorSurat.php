<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    //
    protected $fillable = ['cetak_surat_id'];

    public function buat_surat(){
        return $this->hasMany('App\Model\BuatSurat');
    }
}
