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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_id')->comment('トピックID');
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->integer('answer')->length(1)->comment('回答番号');
            $table->string('comment_body', 30)->nullable()->comment('コメント');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
};