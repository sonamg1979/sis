<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgriFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agri_facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->double('wet',15,2);
            $table->double('c_wet',15,2);
            $table->double('dry',15,2);
            $table->double('c_dry',15,2);
            $table->double('orchard',15,2);
            $table->double('c_orchard',15,2);
            $table->integer('food_processing');
            $table->integer('mills');
            $table->integer('tradition_mills');
            $table->integer('oil_expeller');
            $table->integer('corn_flake');
            $table->integer('electric_dryer');
            $table->integer('potatoe_fryer');
            $table->integer('power_tiller');
            $table->integer('tractor');
            $table->integer('transplanter');
            $table->integer('grass_cutter');
            $table->integer('green_house');
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
        Schema::dropIfExists('agri_facilities');
    }
}
