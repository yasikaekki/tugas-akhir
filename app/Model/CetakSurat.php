<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CetakSurat extends Model
{
    //
    protected $fillable = ['user_id','konfigurasi_kop_surat_id','laporan_surat_id', 'surat_pembuka_id', 'tubuh_surat_id', 'surat_penutup_id'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function konfigurasi_kop_surat()
    {
       return $this->belongsTo('App\Model\KonfigurasiKopSurat');
    }

    public function laporan_surat()
    {
       return $this->belongsTo('App\Model\LaporanSurat');
    }

    public function surat_pembuka(){
        return $this->belongsTo('App\Model\SuratPembuka');
    }

    public function surat_penutup(){
        return $this->belongsTo('App\Model\SuratPenutup');
    }
}
