<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RekapitulasiSurat extends Model
{
    //
    protected $fillable = ['user_id', 'laporan_surat_id', 'bulan_id', 'tahun_id'];

    public function bulan(){
        return $this->belongsTo('App\Bulan');
    }

    public function tahun(){
        return $this->belongsTo('App\Tahun');
    }
}
