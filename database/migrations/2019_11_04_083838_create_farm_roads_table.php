<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_roads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->integer('subsector');
            $table->string('road_name');
            $table->string('chiwog');
            $table->double('length', 15, 2);
            $table->integer('benefeciaries');
            $table->integer('construct_mode');
            $table->integer('construct_type');
            $table->string('group');
            $table->integer('male');
            $table->integer('female');
            $table->string('status');
            $table->longText('remarks');
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
        Schema::dropIfExists('farm_roads');
    }
}
