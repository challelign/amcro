<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
//            $table->string('first_name');
//            $table->string('last_name');
            $table->string('user_created_by')->nullable();
//            $table->enum('gender',['Male','Female']);
//            / 1 for user
//                2 for technican
//                3 for artayi
            $table->integer('role_id');
            $table->boolean('isActive')->default('1');
            $table->boolean('isAdmin')->default('0');
//            $table->integer('is_artayi')->default('0');
//            $table->integer('is_rfm')->default('0');
//            $table->integer('is_tv')->default('0');

//            $table->enum('is_artayi', ['0', '1', '2','3'])->default('0');

//            $table->string('technician')->nullable();
//            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
