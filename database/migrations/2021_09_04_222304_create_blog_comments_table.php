<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();

            $table->longText('comment_text');
            $table->string('commenter_email')->nullable();
            $table->string('commenter_name')->nullable();
            $table->dateTime('comment_time')->default(NOW());
            $table->unsignedBigInteger('blog_item_id');

            $table->foreign('blog_item_id')
                ->references('id')
                ->on('blog_items')
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
        Schema::dropIfExists('blog_comments');
    }
}
