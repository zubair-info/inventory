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
            $table->string('product_name')->nullable();
            $table->boolean('category')->nullable();
            $table->string('description')->nullable();
            $table->boolean('yarn_type')->nullable();
            $table->boolean('brand')->nullable();
            $table->string('matiral_type')->nullable();
            $table->boolean('color')->nullable();
            $table->boolean('color_name')->nullable();
            $table->boolean('color_code')->nullable();
            $table->boolean('unit_type')->nullable();
            $table->boolean('weight')->nullable();
            $table->integer('weight_kg')->nullable();
            $table->integer('weight_pound')->nullable();
            $table->integer('weight_pound_qty')->nullable();
            $table->boolean('cartoon')->nullable();
            $table->boolean('cartoon_small')->nullable();
            $table->integer('cartoon_qty_small')->nullable();
            $table->boolean('cartoon_medium')->nullable();
            $table->integer('cartoon_medium_qty')->nullable();
            $table->boolean('cartoon_large')->nullable();
            $table->integer('cartoon_large_qty')->nullable();
            $table->boolean('cartoon_exrta_large')->nullable();
            $table->integer('cartoon_extar_large_qty')->nullable();
            $table->boolean('cartoon_exrta_xxl')->nullable();
            $table->integer('cartoon_extar_large_xxl_qty')->nullable();
            $table->boolean('dozon')->nullable();
            $table->integer('dozon_qty')->nullable();
            $table->boolean('box')->nullable();
            $table->integer('box_qty')->nullable();
            $table->boolean('pices')->nullable();
            $table->integer('pices_qty')->nullable();
            $table->boolean('roll')->nullable();
            $table->integer('roll_qty')->nullable();
            $table->integer('rate')->nullable();
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
