<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFmmerejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fmmerejas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();

            $table->string('technician')->nullable();
            $table->string('artayi')->nullable();

            $table->string('today_date')->nullable();
            $table->longText('mereja');
            $table->longText('music');
            $table->integer('program_ken_id');
            $table->longText('program_mitelalefbet');
            $table->string('updated_by')->nullable();

            $table->boolean('is_artayi_check')->default('0');
            $table->boolean('is_transmit')->default('0');
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
        Schema::dropIfExists('fmmerejas');
    }
}
