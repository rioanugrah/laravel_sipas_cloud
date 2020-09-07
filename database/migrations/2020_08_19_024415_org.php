<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Org extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org', function (Blueprint $table) {
            $table->string('org_id', 36)->primary();
            $table->string('org_nama', 150)->index()->nullable();
            $table->string('org_kode', 45)->index()->nullable();
            $table->text('org_alamat')->index()->nullable();
            $table->string('org_telp', 15)->nullable();
            $table->string('org_usr', 36)->unique()->nullable(); // FK
            $table->integer('org_ishapus')->nullable();
            $table->integer('org_isaktif')->nullable();
            $table->date('org_aktif_akhir_tgl')->nullable();
            $table->date('org_tenggang_akhir_tgl')->nullable();
            $table->integer('org_status')->nullable();
            $table->string('org_tipe', 100)->nullable();
            $table->string('org_bidang', 100)->nullable();
            $table->string('org_provinsi', 100)->nullable();
            $table->string('org_kota', 100)->nullable();
            $table->string('org_induk', 36)->unique()->nullable(); // FK
            $table->string('org_paket', 36)->unique()->nullable(); // FK
            $table->string('org_prop', 36)->unique()->nullable(); // FK
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org');
    }
}
