<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPembukasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pembukas', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id');
            $table->string('lampiran')->nullable();
            $table->string('perihal')->nullable();
            $table->string('kepada')->nullable();
            $table->string('isi_surat_pembuka')->nullable();
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
        Schema::dropIfExists('surat_pembukas');
    }
}
