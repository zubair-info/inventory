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
            $table->integer('weight_kg');
            $table->integer('weight_pound');
            $table->boolean('cartoon');
            $table->boolean('cartoon_small');
            $table->integer('cartoon_qty_small');
            $table->boolean('cartoon_medium');
            $table->integer('cartoon_medium_qty');
            $table->boolean('cartoon_large');
            $table->integer('cartoon_large_qty');
            $table->boolean('cartoon_exrta_large');
            $table->integer('cartoon_extar_large_qty');
            $table->boolean('cartoon_exrta_xxl');
            $table->integer('cartoon_extar_large_xxl_qty');
            $table->boolean('dozon');
            $table->integer('dozon_qty');
            $table->boolean('box');
            $table->integer('box_qty');
            $table->boolean('pices');
            $table->integer('pices_qty');
            $table->boolean('roll');
            $table->integer('roll_qty');
            $table->integer('rate');
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
