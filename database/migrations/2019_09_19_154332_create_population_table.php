<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopulationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->integer('subsector');
            $table->integer('age_id');
            $table->integer('mtot');
            $table->integer('ftot');
            $table->integer('tot');
            $table->timestamps();
        });
        Schema::create('age_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('age_group');
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
        Schema::dropIfExists('populations');
        Schema::dropIfExists('age_groups');
    }
}
