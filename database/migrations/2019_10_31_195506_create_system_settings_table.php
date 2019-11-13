<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->unsignedBigInteger('gpu_available_time')->default(0)->comment('1积分GPU可用时长');
            $table->unsignedBigInteger('register')->default(0)->comment('注册可获得积分数');
            $table->unsignedBigInteger('real_name')->default(0)->comment('实名认证可获得积分数');
            $table->unsignedBigInteger('education_info')->default(0)->comment('教育信息可获得积分数');
            $table->unsignedBigInteger('position_info')->default(0)->comment('职业信息可获得积分数');
            $table->unsignedBigInteger('award_info')->default(0)->comment('奖项信息可获得积分数');
            $table->unsignedTinyInteger('no_login_time')->default(0)->comment('未登录月份（单位：月）');
            $table->unsignedBigInteger('no_login_deduction_integral')->default(0)->comment('未登录扣除积分');
            $table->unsignedBigInteger('no_login_deduction_experience')->default(0)->comment('未登录扣除经验');
            $table->unsignedBigInteger('free_mirror_space')->default(0)->comment('免费镜像空间（单位：G）');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `system_settings` comment '系统配置表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_settings');
    }
}
