<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sector');
            $table->integer('subsector');
            $table->string('employee_id')->unique();
            $table->string('employee_name');
            $table->date('dob');
            $table->char('sex',1);
            $table->char('nationality',1);
            $table->char('type',1);
            $table->string('cid_number');
            $table->string('email');
            $table->integer('qualification_id');
            $table->integer('designation_id');
            $table->string('photo');
            $table->timestamps();
        });
        Schema::create('employee_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hemployee_id');
            $table->date('year_from');
            $table->date('year_to');
            $table->string('place');
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
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('employee_history');
    }
}
