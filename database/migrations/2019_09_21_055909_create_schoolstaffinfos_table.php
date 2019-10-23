<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolstaffinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schoolstaffinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->integer('subsector');
            $table->integer('tmale');
            $table->integer('tfemale');
            $table->integer('cmale');
            $table->integer('cfemale');
            $table->integer('smale');
            $table->integer('sfemale');
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
        Schema::dropIfExists('schoolinfos');
    }
}
