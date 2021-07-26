<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastawokiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastawokias', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();

            $table->longText('technician')->nullable();
            $table->longText('artayi')->nullable();
            $table->longText('technician_not')->nullable();

            $table->longText('today_date')->nullable();
            $table->integer('program_ken_id');
            $table->longText('mastawokia_mitelalefbet');

            $table->longText('mastawokia_tekuam');
            $table->longText('mastawokia_file');
            $table->longText('mastawokia_gize'); //dekika
            $table->text('mastawokia_mitelalefbet_seat');
            $table->integer('mastawokia_diggmosh');
//            $table->integer('mastawokia_Yetestenagedew_meten');

            $table->boolean('is_artayi_check')->default('0');
            $table->boolean('is_transmit')->default('0');
            $table->boolean('not_transmit')->default('0');
            $table->boolean('is_pro_check')->default('0');
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
        Schema::dropIfExists('mastawokias');
    }
}
