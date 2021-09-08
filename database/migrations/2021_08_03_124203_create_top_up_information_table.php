<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopUpInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_up_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topUp_id')->references('id')->on('top_ups')->cascadeOnDelete();
            // $table->string('topUp_id');
            $table->string('name');
            $table->string('placeholder');
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
        Schema::dropIfExists('top_up_information');
    }
}
