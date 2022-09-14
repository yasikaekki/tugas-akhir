<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfigurasiSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigurasi_surats', function (Blueprint $table) {
            $table->id();
            $table->integer('size_font_surat')->nullable();
            $table->string('kementerian',555)->nullable();
            $table->string('nama_upt',555)->nullable();
            $table->string('alamat_email_laman',555)->nullable();
            $table->string('logo_upt')->nullable();
            $table->string('logo_stempel')->nullable();
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
        Schema::dropIfExists('konfigurasi_surats');
    }
}
