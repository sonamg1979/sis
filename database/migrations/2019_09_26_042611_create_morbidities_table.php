<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMorbiditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morbidities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->integer('subsector');
            $table->integer('morbidity');
            $table->integer('male');
            $table->integer('female');
            $table->integer('total');
            $table->timestamps();
        });
        Schema::create('morbidity_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('morbidity');
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
        Schema::dropIfExists('morbidities');
        Schema::dropIfExists('morbidity_type');
    }
}
