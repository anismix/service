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
            $table->increments('id');
            $table->text('post');
            $table->unsignedInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on('users')->onDelete('cascade');
            $table->unsignedInteger('service_id');
           $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('time')->nullable();
            $table->string('date')->nullable();
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
