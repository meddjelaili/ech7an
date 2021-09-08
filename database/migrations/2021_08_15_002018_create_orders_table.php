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
            // $table->integer('topUpAmount_id')->nullable();
            // $table->integer('cardType_id')->nullable();
            $table->foreignId('topUpAmount_id')->nullable()->references('id')->on('top_up_amounts')->cascadeOnDelete();
            $table->foreignId('cardType_id')->nullable()->references('id')->on('card_types')->cascadeOnDelete();
            $table->string('coupon')->nullable();
            $table->string('email');
            $table->string('payment_id');
            $table->string('payment_method');
            $table->string('price');
            $table->string('currency');
            $table->string('quantity');
            $table->string('img')->nullable();
            $table->string('pdf')->nullable();
            $table->string('payment_status')->default('0');
            $table->string('status')->default('0');
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
        Schema::dropIfExists('orders');
    }
}
