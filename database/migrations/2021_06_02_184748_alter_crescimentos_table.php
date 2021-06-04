<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCrescimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crescimentos', function (Blueprint $table) {
            $table->dropColumn('peso');
            $table->integer('kg');
            $table->integer('g');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crescimentos', function (Blueprint $table) {
            $table->dropColumn('kg');
            $table->dropColumn('g');
            $table->float('peso', 5, 2);
        });
    }
}
