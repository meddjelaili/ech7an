<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cardType_id')->references('id')->on('card_types')->cascadeOnDelete();
            // $table->string('cardType_id');
            $table->integer('order_id')->nullable();
            $table->string('code');
            $table->bigInteger('serial_number')->nullable();
            $table->boolean('bought')->default(false);
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
        Schema::dropIfExists('codes');
    }
}
