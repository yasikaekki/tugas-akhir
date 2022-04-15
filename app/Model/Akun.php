<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'ubah_foto',
        'ubah_ttd',
        'nip',
        'jabatan',
        'gelar',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_rumah',
        'jenis_kelamin',
        'telepon'
    ];

    protected $guarded = [
        'user_id',
    ];
}
