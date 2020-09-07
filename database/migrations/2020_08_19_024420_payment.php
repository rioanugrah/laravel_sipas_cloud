<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Payment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->string('payment_id', 36)->primary();
            $table->string('payment_nomor')->index();
            $table->string('payment_user')->unique();
            $table->dateTime('payment_tgl');
            $table->integer('payment_nominal');
            $table->integer('payment_status');
            $table->string('payment_org')->unique();
            $table->string('payment_sublog')->unique();
            $table->string('payment_prop')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
