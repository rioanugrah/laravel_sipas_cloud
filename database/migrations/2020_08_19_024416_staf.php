<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Staf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staf', function (Blueprint $table) {
            $table->string('staf_id', 36)->primary();
            $table->string('staf_nama', 150)->index();
            $table->string('staf_peran', 32)->unique(); // FK
            $table->string('staf_kode', 30)->index();
            $table->integer('staf_isaktif');
            $table->integer('staf_kelamin');
            $table->integer('staf_ishapus');
            $table->string('staf_org', 36)->unique(); // FK
            $table->string('staf_unit', 36)->unique(); // FK
            $table->string('staf_jab', 36)->unique(); // FK
            $table->string('staf_usr', 36)->unique(); // FK
            $table->string('staf_profil', 36)->unique(); // FK
            $table->string('staf_prop', 36)->unique(); // FK
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staf');
    }
}
