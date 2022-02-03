<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('billing_addresses'))
        {
            Schema::create('billing_addresses', function (Blueprint $table)
            {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
                $table->string('country')->nullable();
                $table->string('address')->nullable();
                $table->unsignedSmallInteger('postal_code')->nullable();
                $table->unsignedSmallInteger('apartment_number')->nullable();
                $table->string('building')->nullable();
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
        Schema::dropIfExists('billing_addresses');
    }
}
