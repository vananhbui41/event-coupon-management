<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Coupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id('id');
            $table->integer('coupon_code');
            $table->integer('r_online_code');
            $table->string('title');
            $table->string('name');
            $table->text('summary');
            $table->string('image');
            $table->date('date_public_start');
            $table->dateTime('start_from');
            $table->dateTime('end_to');
            $table->tinyInteger('type');
            $table->text('memo');
            $table->timestamp('deleted_at')->nullValue();
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
