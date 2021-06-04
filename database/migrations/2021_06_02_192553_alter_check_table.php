<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacinas', function (Blueprint $table) {
            $table->boolean('check')->default(0)->change();
        });

        Schema::table('vermifugos', function (Blueprint $table) {
            $table->boolean('check')->default(0)->change();
        });

        Schema::table('medicamentos', function (Blueprint $table) {
            $table->boolean('check')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
