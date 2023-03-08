<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTvmallToTvmastawokiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tvmastawokias', function (Blueprint $table) {
            $table->longText('tvmall')->default(null)->after('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tvmastawokias', function (Blueprint $table) {
            $table->dropColumn('tvmall');
        });
    }
}
