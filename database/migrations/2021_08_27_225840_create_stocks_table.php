<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('stocks'))
        {
            Schema::create('stocks', function (Blueprint $table)
            {
                $table->id();
                $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedSmallInteger('available_product_amount');
                $table->unsignedSmallInteger('product_in_shopping_cart')->default(0);
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
        Schema::dropIfExists('stocks');
    }
}
