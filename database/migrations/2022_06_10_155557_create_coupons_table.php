<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
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
            $table->string('code',20)->unique();
            $table->string('ronline_coupon_code',20);
            $table->string('title',255);
            $table->text('name');
            $table->text('summary');
            $table->string('image',255);
            $table->dateTime('public_date');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->tinyInteger('type');
            $table->text('memo');
            $table->softDeletes('deleted_at');
            $table->integer('number_of_members');
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
        Schema::dropIfExists('coupons');
    }
}
