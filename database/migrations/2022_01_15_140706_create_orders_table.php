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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('courier_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->string('message');
            $table->integer('total');
            $table->timestamps();
            $table->foreign('buyer_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('address_id')->references('id')->on('addresses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('courier_id')->references('id')->on('couriers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('service_id')->references('id')->on('services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->cascadeOnDelete()->cascadeOnUpdate();
        });
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
