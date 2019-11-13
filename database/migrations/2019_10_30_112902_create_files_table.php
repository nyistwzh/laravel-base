<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('name', 128)->default('')->comment('名称');
            $table->string('type', 128)->default('')->comment('类型');
            $table->string('path', 128)->default('')->comment('路径');
            $table->unsignedBigInteger('size')->default(0)->comment('大小');
            $table->ipAddress('request_ip')->default('0.0.0.0')->comment('请求IP');
            $table->unsignedBigInteger('user_id')->default(0)->comment('用户ID');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `files` comment '文件表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
