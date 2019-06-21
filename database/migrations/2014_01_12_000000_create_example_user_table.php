<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateExampleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('user_name',50)->unique()->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->char('nick_name',20)->nullable()->comment('用户昵称');
            $table->string('password')->comment('密码');
            $table->integer('integral')->default(0)->comment('积分');
            $table->smallInteger('level')->comment('等级');
            $table->rememberToken()->comment('token');
            $table->integer('status')->default(1)->comment('状态:1为正常;2为隐藏');
            $table->index(['user_name','email'],'name_email');
            $table->index(['user_name','status']);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `example_user` comment '例子表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('example_user');
    }
}
