<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_functions'))
        {
            Schema::create('product_functions', function (Blueprint $table)
            {
                $table->id();
                $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
                $table->string('first_title');
                $table->text('first_function');
                $table->string('second_title')->nullable();
                $table->text('second_function')->nullable();
                $table->string('third_title')->nullable();
                $table->text('third_function')->nullable();
                $table->text('characteristics');
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
        Schema::dropIfExists('product_functions');
    }
}
