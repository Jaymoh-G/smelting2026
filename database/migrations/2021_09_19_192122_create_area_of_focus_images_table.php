<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaOfFocusImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_of_focus_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_title')->nullable();
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger('area_of_focus_id');

            $table->foreign('area_of_focus_id')
            ->references('id')
            ->on('area_of_foci')
            ->onDelete('cascade');
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
        Schema::dropIfExists('area_of_focus_images');
    }
}
