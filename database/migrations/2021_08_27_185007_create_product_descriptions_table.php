<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_descriptions'))
        {
            Schema::create('product_descriptions', function (Blueprint $table)
            {
                $table->id();
                $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
                $table->text('first_description');
                $table->text('second_description')->nullable();
                $table->text('third_description')->nullable();
                $table->text('fourth_description')->nullable();
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
        Schema::dropIfExists('product_descriptions');
    }
}
