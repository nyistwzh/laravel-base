<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('username', 256)->default('')->comment('用户名');
            $table->string('actual_name', 256)->default('')->comment('真实姓名');
            $table->string('province', 16)->default('')->comment('省');
            $table->string('city', 16)->default('')->comment('市');
            $table->string('county', 16)->default('')->comment('县');
            $table->boolean('is_overseas')->default(0)->comment('是否海外（1：是，0：否）');
            $table->unsignedTinyInteger('certificate_type_id')->default(0)->comment('证件类型ID');
            $table->string('id_number', 32)->default('')->comment('证件号码');
            $table->string('avatar', 256)->default('')->comment('头像');
            $table->string('email', 256)->default('')->comment('邮箱');
            $table->timestamp('email_verify_at')->nullable()->comment('邮箱激活时间');
            $table->char('mobile', 11)->unique()->default('')->comment('手机号');
            $table->timestamp('mobile_verify_at')->nullable()->comment('手机激活时间');
            $table->char('password', 60)->default('')->comment('密码');
            $table->unsignedTinyInteger('level')->default(0)->comment('等级');
            $table->unsignedBigInteger('experience')->default(0)->comment('经验');
            $table->unsignedBigInteger('general_integral')->default(0)->comment('通用积分');
            $table->string('authenticate_picture', 256)->default('')->comment('认证照片');
            $table->unsignedTinyInteger('authenticate_status')->default(0)->comment('认证状态（0：未提交，1：待审核，2：审核失败，3：审核成功）');
            $table->string('authenticate_message', 256)->default('')->comment('认证消息');
            $table->timestamp('last_login_at')->nullable()->comment('最后登录时间');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `pa_users` comment '用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pa_users');
    }
}
