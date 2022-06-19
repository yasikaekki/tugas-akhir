<?php

use Illuminate\Database\Seeder;
use App\Model\KonfigurasiKopSurat;
use App\Model\RekapitulasiSurat;
use App\Model\SuratPembuka;
use App\Model\TubuhSurat;
use App\Model\SuratPenutup;
use App\Model\CetakSurat;
use App\Model\LaporanSurat;
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
        $user->konfigurasi_kop_surat_id = 1;
        $user->nip = 'NIPPPK';
        $user->no_nip = 768787;
        $user->jabatan = 'Ketua Umum';
        $user->status = 'Aktif';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = \Carbon\Carbon::now();
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        $pembuka = new SuratPembuka;
        $pembuka->user_id = $user->id;
        $pembuka->created_at = \Carbon\Carbon::now();
        $pembuka->save();

        $tubuh = new TubuhSurat;
        $tubuh->user_id = $user->id;
        $tubuh->created_at = \Carbon\Carbon::now();
        $tubuh->save();

        $penutup = new SuratPenutup;
        $penutup->user_id = $user->id;
        $penutup->created_at = \Carbon\Carbon::now();
        $penutup->save();

        $cetak = new CetakSurat;
        $cetak->user_id = $user->id;
        $cetak->created_at = \Carbon\Carbon::now();
        $cetak->save();

        $laporan = new LaporanSurat;
        $laporan->user_id = $user->id;
        $laporan->created_at = \Carbon\Carbon::now();
        $laporan->save();

        $kop = new KonfigurasiKopSurat;
        $kop->id = 1;
        $kop->created_at = \Carbon\Carbon::now();
        $kop->save();
    }
}
