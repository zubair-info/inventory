<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('bitBirds');
            $table->string('company_phone')->default('01873873008');
            $table->string('company_email')->default('info@birbirds.com');
            $table->string('company_address')->default('Dhaka,Bangladesh');
            $table->string('company_logo')->default('logo.png');
            $table->string('mobile_logo')->default('mobilelogo.png');
            $table->string('company_favicon')->default('favlogo.png');
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
        Schema::dropIfExists('companies');
    }
}
