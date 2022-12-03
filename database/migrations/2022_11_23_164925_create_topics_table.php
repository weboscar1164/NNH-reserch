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
            $table->unsignedBigInteger('views')->default(0)->comment('閲覧数');
            $table->unsignedBigInteger('published')->default(1)->comment('公開:1/非公開:0');
            $table->string('choice1', 20)->comment('選択肢１');
            $table->string('choice2', 20)->comment('選択肢２');
            $table->string('choice3', 20)->nullable()->comment('選択肢３');
            $table->string('choice4', 20)->nullable()->comment('選択肢４');
            $table->string('choice5', 20)->nullable()->comment('選択肢５');
            $table->unsignedBigInteger('answer1')->default(0)->comment('回答１');
            $table->unsignedBigInteger('answer2')->default(0)->comment('回答２');
            $table->unsignedBigInteger('answer3')->default(0)->comment('回答３');
            $table->unsignedBigInteger('answer4')->default(0)->comment('回答４');
            $table->unsignedBigInteger('answer5')->default(0)->comment('回答５');
            $table->unsignedBigInteger('user_id')->comment('投稿ユーザーID');
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