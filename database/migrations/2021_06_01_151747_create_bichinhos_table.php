<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBichinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bichinhos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guardiao_id');
            $table->string('pet');
            $table->string('especie');
            $table->string('raca');
            $table->integer('idade_ano');
            $table->integer('idade_mes');
            $table->timestamps();
            
            $table->foreign('guardiao_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bichinhos');
        
    }
}
