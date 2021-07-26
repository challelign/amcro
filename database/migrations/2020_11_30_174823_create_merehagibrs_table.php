<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerehagibrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merehagibrs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('program_ken_id')->nullable();
            $table->integer('miraf_id')->nullable();
            $table->longText('name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merehagibrs');
    }
}
