<?php

use Illuminate\Database\Seeder;
use App\Bulan;

class BulanSeeder extends Seeder
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
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];

        foreach ($array as $i) {
            $tahun = new Bulan;            
            $tahun->nama_bulan = $i;
            $tahun->created_at = \Carbon\Carbon::now();
            $tahun->updated_at = \Carbon\Carbon::now();
            $tahun->save();
        }
    }
}
