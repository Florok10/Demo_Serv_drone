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
            $table->string('first_name');
            $table->string('name');
            $table->string('email')->unique();
            $table->smallInteger('admin')->default(3);
            $table->boolean('rgpd');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('mobile_phone')->unique()->nullable();
            $table->integer('home_phone')->unique()->nullable();
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
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
