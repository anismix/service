<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('adress');
            $table->string('openhour');
            $table->string('closehour');
            $table->string('phone');
            $table->string('image');
            $table->text('description');
            $table->unsignedInteger("category_id");
            $table->foreign("category_id")->references("id")->on('categories')->onDelete('cascade');
            $table->unsignedInteger("user_id")->nullable();
           $table->foreign("user_id")->references("id")->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
}
