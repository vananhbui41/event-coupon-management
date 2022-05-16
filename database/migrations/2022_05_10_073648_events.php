<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            $table->integer('event_code');
            $table->string('title');
            $table->string('name');
            $table->text('summary');
            $table->text('image');
            $table->date('date_public_start');
            $table->tinyInteger('order_keyword');
            $table->tinyInteger('checked_keyword');
            $table->text('keyword');
            $table->text('keyword_text');
            $table->tinyInteger('order_question');
            $table->tinyInteger('checked_question');
            $table->text('question_text');
            $table->tinyInteger('question_type');
            $table->text('answer_1');
            $table->text('answer_2');
            $table->text('answer_3');
            $table->tinyInteger('order_comment');
            $table->tinyInteger('checked_comment');
            $table->text('comment_text');
            $table->tinyInteger('order_checkin');
            $table->tinyInteger('checkin_at');
            $table->string('name_address');
            $table->integer('zip_code');
            $table->string('detail_address');
            $table->text('message');
            $table->tinyInteger('incentive');
            $table->integer('point');
            $table->unsignedInteger('coupon_id');
            $table->text('memo');
            $table->timestamp('deleted_at');
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
        //
    }
}
