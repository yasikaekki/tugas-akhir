<?php

use Illuminate\Database\Seeder;
use App\Model\KonfigurasiKopSurat;
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
        $user->name = 'super admin';
        $user->gelar = 'S.Kom., M.Kom.';
        $user->nip = 'NIPPPK';
        $user->no_nip = 768787;
        $user->jabatan = 'Admin';
        $user->status = 'Aktif';
        $user->telepon = '0812222';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = \Carbon\Carbon::now();
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        $kop = new KonfigurasiKopSurat();
        $kop->created_at = \Carbon\Carbon::now();
        $kop->save();

        $surat = new BuatSurat;
        $surat->user_id = $user->id;
        $surat->konfigurasi_kop_surat_id = $kop->id;
        $surat->created_at = \Carbon\Carbon::now();
        $surat->save();

        $surat = new TubuhSurat();
        $surat->created_at = \Carbon\Carbon::now();
        $surat->save();
    }
}
