<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop', function (Blueprint $table) {
            $table->string('prop_id', 36)->primary();
            $table->string('prop_buat_staf', 36)->unique();
            $table->dateTime('prop_buat_tgl')->index();
            $table->string('prop_ubah_staf', 36)->unique();
            $table->dateTime('prop_ubah_tgl')->index();
            $table->string('prop_hapus_staf', 36)->unique();
            $table->dateTime('prop_hapus_tgl')->index();
            $table->string('prop_entitas_id', 36);
            $table->string('prop_entitas', 20)->index();
            $table->string('prop_slug', 20)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prop');
    }
}
