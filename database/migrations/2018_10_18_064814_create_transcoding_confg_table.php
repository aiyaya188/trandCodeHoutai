<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranscodingConfgTable extends Migration
{
    /**
     * Run the migrations.
     *此表为转码测试表
     * @return void
     */
    public function up()
    {
        Schema::create('transcoding_confgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('query_cycle')->default('')->values('查询周期');
            $table->string('number_of_tasks')->default(0)->values('任务数量');
            $table->string('transcoding_format')->default('')->values('转码格式');
            $table->string('remove_the_title')->default('')->values('去掉片头');
            $table->string('rate_setting')->default('')->values('码率设置');
            $table->string('rate_description')->default('')->values('码率描述');
            $table->string('ricture_size')->default('')->values('画面大小');
            $table->string('frame_rate_setting')->default('')->values('帧率设置');
            $table->string('frame_interval')->default('')->values('帧间隔');
            $table->string('left_upper_watermark')->default('')->values('左上水印');
            $table->string('right_upper_watermark')->default('')->values('右上水印');
            $table->string('left_lower_watermark')->default('')->values('左下水印');
            $table->string('right_lower_watermark')->default('')->values('右下水印');
            $table->string('fragmentation_duration')->default('')->values('分片时长');
            $table->tinyInteger('delete_or_not')->default(0)->values('是否删除0删除 1不删除');
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
        Schema::dropIfExists('transcoding_confgs');
    }
}
