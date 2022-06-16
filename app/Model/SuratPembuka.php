<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuratPembuka extends Model
{
    //
    protected $fillable = ['user_id', 'laporan_surat_id', 'tubuh_surat_id', 'surat_penutup_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function cetak_surat(){
        return $this->hasMany('App\Model\CetakSurat');
    }
}
