<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_ups', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('region_en');
            $table->string('region_ar');
            $table->string('note_en');
            $table->string('note_ar');
            $table->text('instruction_en');
            $table->text('instruction_ar');
            $table->string('cover_image');
            $table->integer('popular')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('top_ups');
    }
}
