<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_features', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->boolean('category');
            $table->string('description');
            $table->boolean('yarn_type');
            $table->boolean('brand');
            $table->string('matiral_type');
            $table->boolean('color');
            $table->boolean('color_name');
            $table->boolean('color_code');
            $table->boolean('unit_type');
            $table->boolean('weight');
            $table->boolean('cartoon');
            $table->boolean('dozon');
            $table->boolean('box');
            $table->boolean('pices');
            $table->boolean('rate');
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
        Schema::dropIfExists('product_features');
    }
}
