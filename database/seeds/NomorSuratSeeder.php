<?php

use Illuminate\Database\Seeder;
use App\NomorSurat;

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
        $array = [
            'Surat Undangan (SU)', 'Surat Keputusan (SK)', 'Surat Permohonan (SPm)', 
            'Surat Pemberitahuan (SPb)', 'Berita Acara (BA)', 'Sertifikat (SRT)',
            'Surat Pernyataan (SPn)', 'Surat Tugas (ST)', 'Surat Keterangan (SKet)', 
            'Surat Rekomendasi (SR)', 'Surat Balasan (SB)' , 'Kuitansi (K)',
            'Perjanjian Kerja (PK)', 'Surat Pengantar (SPeng)', 'Surat Peminjaman (SPp)'

        ];

        foreach ($array as $i) {
            $nomor = new NomorSurat;            
            $nomor->jenis_surat = $i;
            $nomor->created_at = \Carbon\Carbon::now();
            $nomor->updated_at = \Carbon\Carbon::now();
            $nomor->save();
        }
    }
}
