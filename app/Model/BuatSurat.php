<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuatSurat extends Model
{
    //
    protected $fillable = ['nomor_surat_id'];

    public function nomor_surat(){
        return $this->belongsTo('App\NomorSurat');
    }

    public function tubuh_surat(){
        return $this->hasMany('App\Model\TubuhSurat');
    }

    public function cetak_surat(){
        return $this->hasMany('App\Model\CetakSurat');
    }
}
