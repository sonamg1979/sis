<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivestockInfrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestock_infras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->integer('ais');
            $table->integer('biogas');
            $table->integer('poultry_micro');
            $table->integer('poultry_commercial');
            $table->integer('poultry_broiler');
            $table->integer('diary_micro');
            $table->integer('diary_commercial');
            $table->integer('milk_processing');
            $table->longText('remarks');
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
        Schema::dropIfExists('livestock_infras');
    }
}
