<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrediccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prediccions', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('businesses');
            $table->integer('mantenimiento');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prediccions');
    }
}
