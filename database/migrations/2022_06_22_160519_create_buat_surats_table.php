<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuatSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buat_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->nullable();
            $table->foreignid('konfigurasi_kop_surat_id')->nullable();
            $table->foreignid('nomor_surat_id')->nullable();
            $table->foreignid('tubuh_surat_id')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('perihal')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('kepada')->nullable();
            $table->string('isi_pembuka',555)->nullable();
            $table->string('isi_penutup',555)->nullable();
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
        Schema::dropIfExists('buat_surats');
    }
}
