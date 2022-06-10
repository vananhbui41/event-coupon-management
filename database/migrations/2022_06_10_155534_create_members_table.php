<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('id');
            $table->string('cam_member_id',64);
            $table->string('email',255);
            $table->string('cam_member_password',255);
            $table->bigInteger('ronline_member_id')->nullable();
            $table->string('nickname',255)->default()->nullable();
            $table->string('ronline_member_password',255)->nullable();
            $table->tinyInteger('activate_flag')->default(0)->comment('会員登録未完了：0、会員登録完了：1');
            $table->string('access_token',255)->nullable();
            $table->tinyInteger('delete_flag')->default(0);
            $table->tinyInteger('add_family_point')->default(0);
            $table->dateTime('created');
            $table->dateTime('modified');
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
        Schema::dropIfExists('members');
    }
}
