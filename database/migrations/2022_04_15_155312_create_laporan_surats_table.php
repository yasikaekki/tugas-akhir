<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id');
            $table->foreignid('nomor_surat_id')->nullable();
            $table->foreignid('surat_pembuka_id')->nullable();
            $table->foreignid('tubuh_surat_id')->nullable();
            $table->foreignid('surat_penutup_id')->nullable();
            $table->string('no_surat')->nullable();
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
        Schema::dropIfExists('laporan_surats');
    }
}
