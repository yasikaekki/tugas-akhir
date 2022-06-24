<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LaporanSurat extends Model
{
    //
    protected $fillable = ['user_id', 'surat_pembuka_id', 'tubuh_surat_id','surat_penutup_id'];

    public function cetak_surat()
    {
       return $this->hasMany('App\Model\CetakSurat');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function buat_surat(){
        return $this->hasMany('App\Model\BuatSurat');
    }

    public function rekapitulasi_surat(){
        return $this->belongsTo('App\Model\RekapitulasiSurat');
    }

    public function bulan(){
        return $this->hasMany('App\Bulan');
    }

    public function tahun(){
        return $this->hasMany('App\Tahun');
    }
}
