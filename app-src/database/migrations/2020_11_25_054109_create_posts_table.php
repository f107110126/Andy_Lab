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
            // version 001
            // $table->bigIncrements('id');
            // $table->string('slug');
            // $table->text('content');
            // $table->timestamps();
            // $table->timestamp('published_at')->nullable();

            // version 002
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
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
