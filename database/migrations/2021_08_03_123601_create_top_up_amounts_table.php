<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopUpAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_up_amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topUp_id')->references('id')->on('top_ups')->cascadeOnDelete();
            // $table->string('topUp_id');
            $table->string('amount');
            $table->float('price');
            $table->float('merchant_price');
            $table->integer('status')->default(0);
            $table->integer('stock')->default(1);
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
        Schema::dropIfExists('top_up_amounts');
    }
}
