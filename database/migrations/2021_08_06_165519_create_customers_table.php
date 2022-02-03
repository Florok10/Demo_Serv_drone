<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     if (!Schema::hasTable('customers'))
    //     {
    //         Schema::create('customers', function (Blueprint $table)
    //         {
    //             $table->id();
    //             $table->string('first_name');
    //             $table->string('last_name');
    //             $table->string('email')->unique();
    //             $table->integer('mobile_phone')->unique()->nullable();
    //             $table->integer('home_phone')->unique()->nullable();
    //             $table->string('password');
    //             $table->string('password_reset')->unique()->nullable();
    //             $table->ipAddress('ip');
    //             $table->timestamps();
    //         });
    //     }

    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
