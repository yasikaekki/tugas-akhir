<?php

use Illuminate\Database\Seeder;
use App\Model\KonfigurasiSurat;
use App\Model\RekapitulasiSurat;
use App\Model\TubuhSurat;
use App\Model\CetakSurat;
use App\Model\BuatSurat;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User;
        $user->name = 'Dwi Ahmad Priyadi';
        $user->gelar = 'S.Pt., M.Sc.';
        $user->nip = 'NIP';
        $user->no_nip = '19910414 201903 1 010';
        $user->jabatan = 'Admin';
        $user->status = 'Aktif';
        $user->telepon = '08**********';
        $user->email = 'inkubistek@poliwangi.ac.id';
        $user->password = Hash::make('12345678');
        $user->created_at = \Carbon\Carbon::now();
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        $konfigurasi = new KonfigurasiSurat();
        $konfigurasi->created_at = \Carbon\Carbon::now();
        $konfigurasi->save();

        $surat = new BuatSurat;
        $surat->user_id = $user->id;
        $surat->konfigurasi_surat_id = $konfigurasi->id;
        $surat->created_at = \Carbon\Carbon::now();
        $surat->save();

        $surat = new TubuhSurat();
        $surat->created_at = \Carbon\Carbon::now();
        $surat->save();
    }
}
