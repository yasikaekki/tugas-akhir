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
        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Surat Undangan (SU)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Surat Keputusan (SK)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Surat Permohonan (SPm)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Surat Pemberitahuan (SPb)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Berita Acara (BA)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Sertifikat (SRT)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Surat Pernyataan (SPn)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Surat Tugas (ST)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;            
        $nomor->jenis_surat = 'Surat Keterangan (SKet)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;
        $nomor->jenis_surat = 'Surat Rekomendasi (SR)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;
        $nomor->jenis_surat = 'Surat Balasan (SB)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;
        $nomor->jenis_surat = 'Kuitansi (K)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;;
        $nomor->jenis_surat = 'Perjanjian Kerja (PK)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;
        $nomor->jenis_surat = 'Surat Pengantar (SPeng)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();

        $nomor = new NomorSurat;
        $nomor->jenis_surat = 'Surat Peminjaman (SPp)';
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->updated_at = \Carbon\Carbon::now();
        $nomor->save();
    }
}
