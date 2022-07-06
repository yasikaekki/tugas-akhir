<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulans', function (Blueprint $table) {
            $table->id();
            $table->foreignid('tahun_satu')->nullable();
            $table->foreignid('tahun_dua')->nullable();
            $table->foreignid('tahun_tiga')->nullable();
            $table->foreignid('tahun_empat')->nullable();
            $table->foreignid('tahun_lima')->nullable();
            $table->foreignid('tahun_enam')->nullable();
            $table->foreignid('tahun_tujuh')->nullable();
            $table->foreignid('tahun_delapan')->nullable();
            $table->foreignid('tahun_sembilan')->nullable();
            $table->string('nama_bulan');
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
        Schema::dropIfExists('bulans');
    }
}
