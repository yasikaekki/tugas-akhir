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

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 5;
            $nomor->id_kode_surat = 5;
            $nomor->jenis_surat = 'Berita Acara (BA)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 6;
            $nomor->id_kode_surat = 6;
            $nomor->jenis_surat = 'Sertifikat (SRT)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 7;
            $nomor->id_kode_surat = 7;
            $nomor->jenis_surat = 'Surat Pernyataan (SPn)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 8;
            $nomor->id_kode_surat = 8;
            $nomor->jenis_surat = 'Surat Tugas (ST)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 9;
            $nomor->id_kode_surat = 9;
            $nomor->jenis_surat = 'Surat Keterangan (SKet)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 10;
            $nomor->id_kode_surat = 10;
            $nomor->jenis_surat = 'Surat Rekomendasi (SR)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 11;
            $nomor->id_kode_surat = 11;
            $nomor->jenis_surat = 'Surat Balasan (SB)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 12;
            $nomor->id_kode_surat = 12;
            $nomor->jenis_surat = 'Kuitansi (K)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 13;
            $nomor->id_kode_surat = 13;
            $nomor->jenis_surat = 'Perjanjian Kerja (PK)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 14;
            $nomor->id_kode_surat = 14;
            $nomor->jenis_surat = 'Surat Pengantar (SPeng)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();

            $nomor = new NomorSurat;
            $nomor->user_id = $uid;
            $nomor->id_no_surat = 15;
            $nomor->id_kode_surat = 15;
            $nomor->jenis_surat = 'Surat Peminjaman (SPp)';
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();
    }
}
