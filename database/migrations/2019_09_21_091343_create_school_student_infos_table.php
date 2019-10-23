<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_student_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year');
            $table->integer('subsector');
            $table->integer('class');
            $table->integer('agerange');
            $table->integer('male');
            $table->integer('female');
            $table->timestamps();
        });
        Schema::create('student_ages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('class');
            $table->integer('age');
            $table->timestamps();
        });
        Schema::create('class', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('class');
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
        Schema::dropIfExists('school_student_infos');
        Schema::dropIfExists('student_ages');
        Schema::dropIfExists('class');
    }
}
