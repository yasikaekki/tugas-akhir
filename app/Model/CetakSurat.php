<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CetakSurat extends Model
{
    //
    protected $fillable = ['user_id','konfigurasi_kop_surat_id','laporan_surat_id', 'surat_pembuka_id', 'tubuh_surat_id', 'surat_penutup_id'];
    
    public function laporan_surat(){
        return $this->hasMany('App\model\LaporanSurat');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function konfigurasi_kop_surat()
    {
       return $this->belongsTo('App\Model\KonfigurasiKopSurat');
    }

    public function buat_surat(){
        return $this->belongsTo('App\Model\BuatSurat');
    }

    public function tubuh_surat(){
        return $this->belongsTo('App\Model\TubuhSurat');
    }
}
