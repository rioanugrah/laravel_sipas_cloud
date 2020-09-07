<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orgrole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgrole', function (Blueprint $table) {
            $table->string('org_role_id', 36)->primary();
            $table->string('org_role_nama', 30)->index();
            $table->integer('org_role_isaktif');
            $table->text('org_role_akses');
            $table->integer('org_role_ishapus');
            $table->string('org_role_prop', 36)->unique(); // FK
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orgrole');
    }
}
