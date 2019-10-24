<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('f_year',9);
            $table->integer('sector');
            $table->integer('subsector');
            $table->char('budget',2);
            $table->string('activity');
            $table->char('budget_line',1);
            $table->integer('allotted_budget');
            $table->date('sdate');
            $table->date('edate');
            $table->string('site_engineer');
            $table->char('status',1);
            $table->longText('remarks');
            $table->timestamps();
        });
        Schema::create('budgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('f_year',9);
            $table->char('budget_code',2);
            $table->string('budget');
            $table->double('current',8,2);
            $table->double('capital',8,2);
            $table->double('total_budget',8,2);
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
        Schema::dropIfExists('activities');
    }
}
