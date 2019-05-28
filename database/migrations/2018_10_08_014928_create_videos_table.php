<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('md5', 100)->comment('文件唯一标志符号');
            $table->string('file_name', 255)->comment('文件上传的名字');
            $table->string('file_type', 24)->comment('视频类型');
            $table->string('task_id', 24)->comment('task_id');
            $table->string('path', 255)->comment('path');
            $table->integer('file_size')->unsigned()->nullable()->comment('文件长度');
            $table->integer('minutes')->unsigned()->nullable()->comment('播放长度');
            $table->integer('offset')->unsigned()->nullable(0)->comment('上传偏移');
            $table->tinyInteger('translat_count')->default(0)->comment('转码次数');
            $table->tinyInteger('upload_count')->default(0)->comment('上传s3次数');
            $table->tinyInteger('status')->comment('视频状态');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->comment('删除时间');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
