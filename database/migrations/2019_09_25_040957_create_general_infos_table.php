<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->year('year');
            $table->integer('type');
            $table->integer('ambulance');
            $table->integer('doctor');
            $table->integer('dungtsho');
            $table->integer('clinicofficer');
            $table->integer('asstclinicofficer');
            $table->integer('ha');
            $table->integer('bhw');
            $table->integer('physiotherapists');
            $table->integer('nurses');
            $table->integer('sowamenpa');
            $table->integer('pharmacists');
            $table->integer('technicians');
            $table->integer('labtechonologist');
            $table->integer('vhw');
            $table->integer('supportstaff');
            $table->timestamps();
        });
        Schema::create('health_types', function (Blueprint $table) {
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
        Schema::dropIfExists('general_infos');
        Schema::dropIfExists('health_types');
    }
}
