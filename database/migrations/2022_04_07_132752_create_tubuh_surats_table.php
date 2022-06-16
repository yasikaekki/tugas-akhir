<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTubuhSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tubuh_surats', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id');
            $table->string('tanggal')->nullable();
            $table->string('acara')->nullable();
            $table->string('tempat')->nullable();
            $table->string('jam')->nullable();
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
        Schema::dropIfExists('tubuh_surats');
    }
}
