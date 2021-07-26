<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramMeleyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_meleyas', function (Blueprint $table) {
            $table->id();
//            $table->integer('user_id')->nullable();

            $table->string('name');
//            $table->enum('isPurchased', ['0', '1'])->default('0');
//            $table->enum('isPend', ['0', '1'])->default('0');
            $table->boolean('yeteshete')->default('0');
            $table->boolean('expire_contract')->default('0');

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
        Schema::dropIfExists('program_meleyas');
    }
}
