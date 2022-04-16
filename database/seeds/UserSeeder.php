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
    }
}
