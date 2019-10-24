<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCulturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->string('sitename');
            $table->string('location');
            $table->integer('heritage_type');
            $table->year('estdyear');
            $table->longText('description');
            $table->string('photo');
            $table->timestamps();
        });
        Schema::create('heritage_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heritage_type');
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
        Schema::dropIfExists('cultures');
        Schema::dropIfExists('heritage_type');
    }
}
