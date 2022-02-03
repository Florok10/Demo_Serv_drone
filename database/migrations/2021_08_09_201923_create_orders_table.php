<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('orders'))
            {
                Schema::create('orders', function (Blueprint $table)
                {
                    $table->id();
                    $table->foreignId('orders_history_id')->constrained('orders_history');
                    $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
                    $table->string('first_name');
                    $table->string('last_name');
                    $table->string('country');
                    $table->string('address');
                    $table->string('postal_code');
                    $table->string('apartment_number')->nullable();
                    $table->string('building')->nullable();
                    $table->string('status');
                    $table->unsignedSmallInteger('total_price');
                    $table->timestamp('done_at');
                    $table->timestamps();
                });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
