<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tweet_id');
            $table->boolean('liked');
            // $table->boolean('disliked');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tweet_id')->references('id')->on('tweets')->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['user_id', 'tweet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
