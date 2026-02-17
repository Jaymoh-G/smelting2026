<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('teaser');
            $table->longText('content')->nullable();
            $table->dateTime('date_published')->default(NOW());
            $table->integer('is_draft')->default(1);
            $table->integer('is_published')->default(0);
            $table->string('image_url');
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('blog_items');
    }
}
