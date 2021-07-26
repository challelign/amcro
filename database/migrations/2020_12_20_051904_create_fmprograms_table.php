<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFmprogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fmprograms', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();
            $table->string('technician')->nullable();
            $table->string('artayi')->nullable();

            $table->longText('program_mitelalefbet_seat')->nullable();
            $table->longText('program_mitelalefbet_seat2')->nullable();

            $table->integer('program_ken_id')->nullable();
            $table->longText('program_mitelalefbet');
            $table->longText('today_date');
            $table->integer('program_meleya_id')->nullable();
            $table->longText('program_yizet');
            $table->longText('program_file');
            $table->longText('program_artayi');
            $table->longText('program_azegagi');
            $table->text('program_minute');
            $table->boolean('is_artayi_check')->default('0');
            $table->boolean('is_transmit')->default('0');
            $table->string('updated_by')->nullable();

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
        Schema::dropIfExists('fmprograms');
    }
}
