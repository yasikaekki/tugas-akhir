<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCetakSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cetak_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id');
            $table->foreignid('konfigurasi_kop_surat_id');
            $table->foreignid('nomor_surat_id');
            $table->foreignid('surat_pembuka_id');
            $table->foreignid('tubuh_surat_id');
            $table->foreignid('surat_penutup_id');
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
        Schema::dropIfExists('cetak_surats');
    }
}
