<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('comments');
    }
};
