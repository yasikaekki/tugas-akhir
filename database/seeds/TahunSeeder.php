<?php

use Illuminate\Database\Seeder;
use App\Tahun;

class TahunSeeder extends Seeder
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
            '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2029', '2030'
        ];
        foreach ($array as $i) {
            $tahun = new Tahun;            
            $tahun->list_tahun = $i;
            $tahun->created_at = \Carbon\Carbon::now();
            $tahun->updated_at = \Carbon\Carbon::now();
            $tahun->save();
        }
    }
}
