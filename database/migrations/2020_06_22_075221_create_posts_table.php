<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_author');
            $table->string('title');
            $table->string('slug');
            $table->enum('type',['music','podcast','video']);
            $table->text('description')->nullable();
            $table->text('poster')->nullable();
            $table->string('duration')->nullable();
            $table->string('released')->nullable();
            $table->string('comment_status')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->boolean('featured')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
