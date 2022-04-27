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
	    $table->foreignid('id_kop_surat');
	    $table->foreignid('id_no_surat');
	    $table->foreignid('id_surat_pembuka');
	    $table->foreignid('id_tubuh_surat');
	    $table->foreignid('id_surat_penutup');
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
