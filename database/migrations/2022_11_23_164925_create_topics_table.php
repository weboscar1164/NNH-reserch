<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30)->nullalble(false)->comment('トピックタイトル');
            $table->string('Answer1', 20)->nullalble(false)->comment('回答１');
            $table->string('Answer2', 20)->nullalble(false)->comment('回答２');
            $table->string('Answer3', 20)->comment('回答３');
            $table->string('Answer4', 20)->comment('回答４');
            $table->string('Answer5', 20)->comment('回答５');
            $table->unsignedBigInteger('user_id')->nullalble(false)->comment('投稿ユーザーID');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
};