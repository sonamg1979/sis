<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectricFencingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electric_fencings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->integer('subsector');
            $table->string('location');
            $table->double('length',15,2);
            $table->integer('beneficiaries');
            $table->double('dry',15,2);
            $table->double('wet',15,2);
            $table->char('status',1);
            $table->char('type',1);
            $table->longText('remarks');
            $table->timestamps();
        });
        Schema::create('fencing_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
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
        Schema::dropIfExists('electric_fencings');
        Schema::dropIfExists('fencing_type');
    }
}
