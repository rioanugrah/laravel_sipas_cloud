<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usr', function (Blueprint $table) {
            $table->string('usr_id', 36)->primary();
            $table->string('usr_nama', 250)->index();
            $table->string('usr_email', 250)->index();
            $table->string('usr_sandi', 45);
            $table->integer('usr_isaktif');
            $table->date('usr_registrasi_tgl')->index();
            $table->integer('usr_registrasi_status');
            $table->string('usr_staf', 36)->unique(); // FK
            $table->string('usr_org', 36)->unique(); // FK
            $table->string('usr_auth', 36)->unique(); // FK
            $table->integer('usr_ishapus');
            $table->dateTime('usr_lastmasuk');
            $table->string('usr_prop', 36)->unique(); // FK

            // $table->foreign('usr_prop')->references('org_adm_id')->on('orgadm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usr');
    }
}
