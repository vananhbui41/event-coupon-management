<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
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
            $table->string('code',20);
            $table->string('title',255);
            $table->string('name',255);
            $table->text('summary');
            $table->string('image');
            $table->dateTime('public_date');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            
            $table->tinyInteger('order_keyword');
            $table->tinyInteger('checked_keyword');
            $table->text('keyword_text');
            $table->string('short_keyword');
           
            $table->tinyInteger('order_question');
            $table->tinyInteger('checked_question');
            $table->text('question_text');
            $table->tinyInteger('question_type');
            $table->text('answer1');
            $table->text('answer2');
            $table->text('answer3');
            
            $table->tinyInteger('order_comment');
            $table->tinyInteger('checked_comment');
            $table->text('comment_text');
            
            $table->tinyInteger('order_checkin');
            $table->tinyInteger('checked_checkin');
            $table->tinyInteger('checked_shop');

            $table->text('completed_message');
            $table->tinyInteger('checked_type');
            $table->integer('point');
            $table->unsignedInteger('coupon_id');
            $table->text('memo');
            $table->integer('number_of_members');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('events');
    }
}
