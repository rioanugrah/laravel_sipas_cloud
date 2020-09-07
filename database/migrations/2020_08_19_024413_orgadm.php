<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orgadm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgadm', function (Blueprint $table) {
            $table->string('org_adm_id', 36)->primary();
            $table->string('org_adm_user', 36)->unique(); // FK
            $table->string('org_adm_org', 36)->unique(); // FK
            $table->integer('org_adm_isaktif');
            $table->integer('org_adm_ishapus');
            $table->string('org_adm_role', 36);
            $table->string('org_adm_prop', 36)->unique(); // FK

            // $table->foreign('org_adm_user')->references('org_prop')->on('org');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orgadm');
    }
}
