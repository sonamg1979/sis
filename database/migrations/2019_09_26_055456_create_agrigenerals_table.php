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
            $table->double('dry', 15, 2);
            $table->double('wet', 15, 2);
            $table->double('orchad', 15, 2);
            $table->integer('f_irrigation');
            $table->integer('n_irrigation');
            $table->decimal('l_irrigation',11,2);
            $table->decimal('area_irrigation',11,2);
            $table->integer('benefit_irrigation');
            $table->integer('processing_unit');
            $table->integer('mills');
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
    }
}
