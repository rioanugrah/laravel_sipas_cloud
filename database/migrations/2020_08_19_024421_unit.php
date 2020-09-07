<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Unit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->string('unit_id', 36)->primary();
            $table->string('unit_nama', 150)->index();
            $table->string('unit_kode', 30)->index();
            $table->string('unit_rubrik', 30)->index();
            $table->integer('unit_isaktif');
            $table->string('unit_org', 36)->unique();
            $table->string('unit_induk', 36)->unique();
            $table->integer('unit_ishapus');
            $table->string('unit_manager', 36)->unique();
            $table->text('unit_level');
            $table->text('unit_path');
            $table->string('unit_prop', 36)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit');
    }
}
