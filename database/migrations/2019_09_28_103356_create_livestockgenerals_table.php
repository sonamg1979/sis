<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivestockgeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestockgenerals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->integer('subsector');
            $table->integer('animal_types');
            $table->integer('total');
            $table->timestamps();
        });
        Schema::create('animal_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('animal');
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
        Schema::dropIfExists('livestockgenerals');
        Schema::dropIfExists('animal_types');
    }
}
