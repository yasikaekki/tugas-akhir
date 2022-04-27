<?php

use Illuminate\Database\Seeder;
use App\Model\KonfigurasiKopSurat;
use App\Model\RekapitulasiSurat;
use App\Model\SuratPembuka;
use App\Model\TubuhSurat;
use App\Model\SuratPenutup;
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
        $user->nip = 'NIPPPK';
        $user->no_nip = 768787;
        $user->jabatan = 'Ketua Umum';
        $user->status = 'Aktif';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = \Carbon\Carbon::now();
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        $kop = new SuratPembuka;
        $kop->user_id = $user->id;
        $kop->created_at = \Carbon\Carbon::now();
        $kop->save();

        $kop = new TubuhSurat;
        $kop->user_id = $user->id;
        $kop->created_at = \Carbon\Carbon::now();
        $kop->save();

        $kop = new SuratPenutup;
        $kop->user_id = $user->id;
        $kop->created_at = \Carbon\Carbon::now();
        $kop->save();

        $kop = new LaporanSurat;
        $kop->user_id = $user->id;
        $kop->created_at = \Carbon\Carbon::now();
        $kop->save();

        $kop = new RekapitulasiSurat;
        $kop->user_id = $user->id;
        $kop->created_at = \Carbon\Carbon::now();
        $kop->save();

        $kop = new KonfigurasiKopSurat;
        $kop->user_id = $user->id;
        $kop->created_at = \Carbon\Carbon::now();
        $kop->save();
    }
}
