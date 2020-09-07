<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subslog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subslog', function (Blueprint $table) {
            $table->string('subslog_id', 36)->primary();
            $table->string('subslog_paket_nama', 250)->index();
            $table->integer('subslog_paket_storage')->index();
            $table->date('subslog_jumlah_user');
            $table->string('subslog_org')->unique(); // FK
            $table->integer('subslog_jumlah_unit');
            $table->integer('subslog_jabatan');
            $table->string('subslog_payment_id', 36)->unique(); // FK
            $table->integer('subslog_jumlah_surat');
            $table->integer('subslog_jumlah_disposisi');
            $table->integer('subslog_jumlah_arsip');
            $table->integer('subslog_jumlah_dokumen');
            $table->date('subslog_payment_tgl');
            $table->string('subslog_prop', 36);

            // $table->foreign('subslog_org')->references('subslog_org')->on('org')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subslog');
    }
}
