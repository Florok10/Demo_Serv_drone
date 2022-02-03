<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('shipping_addresses'))
        {
            Schema::create('shipping_addresses', function (Blueprint $table)
            {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
                $table->string('sh_country')->nullable();
                $table->string('sh_address')->nullable();
                $table->unsignedSmallInteger('sh_postal_code')->nullable();
                $table->unsignedSmallInteger('sh_apartment_number')->nullable();
                $table->string('sh_building')->nullable();
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
        Schema::dropIfExists('shipping_addresses');
    }
}
