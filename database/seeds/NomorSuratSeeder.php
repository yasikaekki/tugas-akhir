<?php

use Illuminate\Database\Seeder;
use App\Model\NomorSurat;

class NomorSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
            $uid = DB::table('users')->select('id')->value('id');
            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 1;
            $nomor->id_kode_surat = 1;
            $nomor->jenis_surat = 'Surat Undangan (SU)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 2;
            $nomor->id_kode_surat = 2;
            $nomor->jenis_surat = 'Surat Keputusan (SK)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 3;
            $nomor->id_kode_surat = 3;
            $nomor->jenis_surat = 'Surat Permohonan (SPm)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 4;
            $nomor->id_kode_surat = 4;
            $nomor->jenis_surat = 'Surat Pemberitahuan (SPb)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();
    }
}
