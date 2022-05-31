<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Member extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->integer('cam_member_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cam_member_password');
            $table->bigInteger('ronline_member_id');
            $table->string('nickname');
            $table->string('ronline_member_password');
            $table->tinyInteger('activate_flag');
            $table->string('access_token');
            $table->tinyInteger('add_family_point');
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
        Schema::dropIfExists('member');
    }
}
