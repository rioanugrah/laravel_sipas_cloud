<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jab', function (Blueprint $table) {
            $table->string('jab_id', 36)->primary();
            $table->string('jab_nama', 150)->index();
            $table->string('jab_kode', 20)->index();
            $table->integer('jab_isaktif');
            $table->integer('jab_isnomor');
            $table->string('jab_org', 36)->unique();
            $table->string('jab_induk', 36)->unique();
            $table->integer('jab_ishapus');
            $table->integer('jab_level');
            $table->integer('jab_path');
            $table->string('jab_prop', 36)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jab');
    }
}
