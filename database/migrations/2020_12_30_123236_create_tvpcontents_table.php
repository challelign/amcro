<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvpcontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvpcontents', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->text('program_ken_id')->nullable();
//            $table->integer('program_ken_id')->nullable();
//            $table->integer('tvmitelalefbet_id')->nullable();
            $table->text('tvmitelalefbet_id')->nullable();
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
        Schema::dropIfExists('tvpcontents');
    }
}
