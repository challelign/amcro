<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFmmallToFmmastawokiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fmmastawokias', function (Blueprint $table) {
            //

            $table->longText('fmmall')->default(null)->after('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fmmastawokias', function (Blueprint $table) {
            $table->dropColumn('fmmall');
        });
    }
}
