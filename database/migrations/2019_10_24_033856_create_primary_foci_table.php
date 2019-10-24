<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimaryFociTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_foci', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->string('title');
            $table->string('description');
            $table->double('budget');
            $table->date('complete_date');
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
        Schema::dropIfExists('primary_foci');
    }
}
