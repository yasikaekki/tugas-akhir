<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LaporanSurat extends Model
{
    //
    protected $fillable = ['user_id', 'surat_pembuka_id', 'tubuh_surat_id','surat_penutup_id'];

    public function nomor_surat(){
        return $this->belongsTo('App\NomorSurat');
    }

    public function cetak_surat()
    {
       return $this->hasMany('App\Model\CetakSurat');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
