<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->longText('feedback');
            $table->text('program_ken');
            $table->text('feedback_category');
//            $table->integer('program_ken_id');
            $table->text('program_mitelalefbet');
            $table->text('today_date');
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
        Schema::dropIfExists('feedback');
    }
}
