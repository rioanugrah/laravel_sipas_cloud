<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Authsrc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authsrc', function (Blueprint $table) {
            $table->string('auth_src_id', 36)->primary();
            $table->string('auth_src_usr', 36)->unique(); // FK
            $table->string('auth_src_provider', 250)->unique(); // FK
            $table->string('auth_src_prop', 36)->unique(); // FK

            // $table->foreign('auth_src_usr')->references('usr_id')->on('usr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authsrc');
    }
}
