<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapitulasiSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekapitulasi_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id');
            $table->foreignid('laporan_surat_id')->nullable();
            $table->foreignid('bulan_id')->nullable();
            $table->foreignid('tahun_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekapitulasi_surats');
    }
}
