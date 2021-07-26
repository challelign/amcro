<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvprogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvprograms', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();
//            $table->enum('program_ken');
            $table->string('technician')->nullable();
            $table->string('artayi')->nullable();
            $table->string('supervisor')->nullable();
            $table->boolean('is_supervisor')->default('0');

//            $table->longText('program_mitelalefbet_seat')->nullable();
//            $table->longText('program_mitelalefbet_seat2')->nullable();

            $table->integer('program_ken_id')->nullable();
//            $table->integer('tvmitelalefbet_id')->nullable();
//            ,['ጠዋት[12:00-6:00]','ቀን[6:00-12:00]','ማታ[12:00-6:00]','ሌሊት[6:00-12:00]'])
            $table->longText('program_mitelalefbet')->nullable();
            $table->longText('today_date');
//            $table->integer('program_meleya_id')->nullable();
//            $table->integer('music_id')->nullable();
//            $table->integer('mereja_id')->nullable();
//            $table->integer('mastawokia_id')->nullable();
//            $table->time('program_m_time');
            $table->longText('program_yizet');
//            $table->longText('program_file');
//            $table->longText('program_artayi');
//            $table->longText('program_azegagi');
//            $table->longText('program_minute');
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
        Schema::dropIfExists('tvprograms');
    }
}
