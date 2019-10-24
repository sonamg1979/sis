<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolInfrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_infras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->string('schoolname');
            $table->string('location');
            $table->double('area');
            $table->integer('schoollevel');
            $table->year('estdyear');
            $table->integer('classroom');
            $table->integer('hall');
            $table->string('football');
            $table->string('volleyball');
            $table->string('basketball');
            $table->string('indoor');
            $table->timestamps();
        });
        Schema::create('school_level', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('schoollevel');
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
        Schema::dropIfExists('school_infras');
        Schema::dropIfExists('school_level');
    }
}
