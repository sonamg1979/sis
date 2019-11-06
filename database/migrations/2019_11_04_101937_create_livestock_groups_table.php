<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivestockGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestock_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->year('year');
            $table->string('group_name');
            $table->string('registration_number');
            $table->integer('male');
            $table->string('female');
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
        Schema::dropIfExists('livestock_groups');
    }
}
