<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgriproductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agriproductions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subsector');
            $table->integer('year');
            $table->integer('category');
            $table->integer('products');
            $table->double('area_number',11,2);
            $table->double('productions',11,2);
            $table->timestamps();
        });
        Schema::create('agricategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->timestamps();
        });
        Schema::create('agriproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category');
            $table->string('product');
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
        Schema::dropIfExists('agriproductions');
        Schema::dropIfExists('agricategories');
        Schema::dropIfExists('agriproducts');
    }
}
