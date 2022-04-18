<?php

use Illuminate\Database\Seeder;
use App\Model\KonfigurasiKopSurat;
use App\Model\RekapitulasiSurat;
use App\Model\SuratPembuka;
use App\Model\SuratPenutup;
use App\Model\LaporanSurat;
use App\Model\Akun;
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
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = \Carbon\Carbon::now();
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        $akun = new Akun;
        $akun->user_id = $user->id;
        $akun->created_at = \Carbon\Carbon::now();
        $akun->updated_at = \Carbon\Carbon::now();
        $akun->save();

        $kop = new KonfigurasiKopSurat;
        $kop->user_id = $user->id;
        $kop->created_at = \Carbon\Carbon::now();
        $kop->updated_at = \Carbon\Carbon::now();
        $kop->save();

        $pembuka = new SuratPembuka;
        $pembuka->user_id = $user->id;
        $pembuka->created_at = \Carbon\Carbon::now();
        $pembuka->updated_at = \Carbon\Carbon::now();
        $pembuka->save();

        $penutup = new SuratPenutup;
        $penutup->user_id = $user->id;
        $penutup->created_at = \Carbon\Carbon::now();
        $penutup->updated_at = \Carbon\Carbon::now();
        $penutup->save();

        $laporan = new LaporanSurat;
        $laporan->user_id = $user->id;
        $laporan->created_at = \Carbon\Carbon::now();
        $laporan->updated_at = \Carbon\Carbon::now();
        $laporan->save();

        $rekapitulasi = new RekapitulasiSurat;
        $rekapitulasi->user_id = $user->id;
        $rekapitulasi->created_at = \Carbon\Carbon::now();
        $rekapitulasi->updated_at = \Carbon\Carbon::now();
        $rekapitulasi->save();
    }
}
