<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacinas', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');

            $table->foreign('pet_id')->references('id')->on('bichinhos');
        });

        Schema::table('vermifugos', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');

            $table->foreign('pet_id')->references('id')->on('bichinhos');
        });

        Schema::table('medicamentos', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');

            $table->foreign('pet_id')->references('id')->on('bichinhos');
        });

        Schema::table('alimentos', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');

            $table->foreign('pet_id')->references('id')->on('bichinhos');
        });

        Schema::table('crescimentos', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');

            $table->foreign('pet_id')->references('id')->on('bichinhos');
        });

        Schema::table('outros', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');

            $table->foreign('pet_id')->references('id')->on('bichinhos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('vacinas', function (Blueprint $table) {
            $table->dropColumn('pet_id');
        });

        Schema::table('vermigufos', function (Blueprint $table) {
            $table->dropColumn('pet_id');
        });

        Schema::table('medicamentos', function (Blueprint $table) {
            $table->dropColumn('pet_id');
        });

        Schema::table('alimentos', function (Blueprint $table) {
            $table->dropColumn('pet_id');
        });

        Schema::table('crescimentos', function (Blueprint $table) {
            $table->dropColumn('pet_id');
        });

        Schema::table('outros', function (Blueprint $table) {
            $table->dropColumn('pet_id');
        });

        Schema::enableForeignKeyConstraints();
    }
}
