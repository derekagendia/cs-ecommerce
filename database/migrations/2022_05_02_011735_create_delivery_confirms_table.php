<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_confirms', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->boolean('delivery')->default(0);
            $table->string('token');
            $table->string('order_number')->unique();
            $table->string('shop_name');
            $table->string('phone_to_withdrawal');
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
        Schema::dropIfExists('delivery_confirms');
    }
}
