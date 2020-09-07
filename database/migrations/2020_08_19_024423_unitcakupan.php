<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Unitcakupan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitcakupan', function (Blueprint $table) {
            $table->string('unit_cakupan_id', 36)->primary();
            $table->string('unit_cakupan_unit', 36)->unique();
            $table->string('unit_cakupan_jab', 36)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unitcakupan');
    }
}
