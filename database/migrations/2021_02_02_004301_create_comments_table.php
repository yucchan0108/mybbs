<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->text('body');
            $table->timestamps();
            $table->integer('user_id')->unsigned(); //カラム追加
            $table->foreign('user_id') //外部キー制約
                  ->references('id')->on('users') //ｕｓｅｒｓテーブルのidを参照する
                  ->onDelete('cascade');  //ユーザーが削除されたら紐付くpostsも削除
            $table->foreign('post_id')->references('id')->on('posts');
            
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
}
