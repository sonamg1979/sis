<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivestockproductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestockproductions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('year');
            $table->integer('subsector');
            $table->integer('products');
            $table->integer('total');
            $table->timestamps();
        });
        Schema::create('ls_product_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('products');
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
        Schema::dropIfExists('livestockproductions');
        Schema::dropIfExists('ls_product_types');
    }
}
