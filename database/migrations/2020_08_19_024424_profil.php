<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->string('profil_id', 36)->primary();
            $table->string('profil_staf', 36)->unique();
            $table->string('profil_staf_nama', 150)->index();
            $table->string('profil_unit', 36)->unique();
            $table->string('profil_unit_nama', 150)->index();
            $table->string('profil_jab', 36)->unique();
            $table->string('profil_jab_nama', 150)->index();
            $table->dateTime('profil_buat_tgl')->index();
            $table->string('profil_prop', 36)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil');
    }
}
