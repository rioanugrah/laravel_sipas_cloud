<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->string('paket_id', 36)->primary();
            $table->string('paket_nama', 250)->index();
            $table->string('paket_tipe', 100);
            $table->integer('paket_ishapus');
            $table->integer('paket_isaktif');
            $table->integer('paket_nominal');
            $table->string('paket_prop', 36)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket');
    }
}
