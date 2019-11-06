<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgrigeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agrigenerals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->integer('subsector');
            $table->string('location');
            $table->double('length', 15, 2);
            $table->integer('benefeciaries');
            $table->double('area',15,2);
            $table->integer('construct_mode');
            $table->integer('construct_type');
            $table->integer('chennel_type');
            $table->string('association');
            $table->integer('male');
            $table->integer('female');
            $table->string('status');
            $table->longText('remarks');
            $table->timestamps();
        });
        Schema::create('construct_modes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('construct_mode');
            $table->timestamps();
        });
        Schema::create('construct_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('construct_type');
            $table->timestamps();
        });
        Schema::create('chennel_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chennel_type');
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
        Schema::dropIfExists('agrigenerals');
        Schema::dropIfExists('construct_modes');
        Schema::dropIfExists('construct_types');
    }
}
