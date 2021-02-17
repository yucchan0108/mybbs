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
            $table->string('title', 50);
            $table->text('body');
            $table->timestamps();
            $table->integer('user_id')->unsigned(); //カラム追加
            $table->foreign('user_id') //外部キー制約
                  ->references('id')->on('users') //ｕｓｅｒｓテーブルのidを参照する
                  ->onDelete('cascade');  //ユーザーが削除されたら紐付くpostsも削除
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
