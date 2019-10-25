<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->integer('activity');
            $table->string('engineer');
            $table->date('visit_date');
            $table->longText('observation');
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('status', function (Blueprint $table) {
            $table->char('id');
            $table->string('status');
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
        Schema::dropIfExists('engineers');
        Schema::dropIfExists('status');
    }
}
