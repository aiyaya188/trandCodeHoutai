<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranscodingTable extends Migration
{
    /**
     * Run the migrations.
     *新增水印开关和水印位置字段
     * @return void
     */
    public function up()
    {
        Schema::table('transcoding_confgs', function (Blueprint $table) {
            $table->string('watermark_or_not')->default(0)->values('水印是否启动 1启动 0 不启动');
            $table->string('subtitle_startup')->default(0)->values('字幕是否启动 1启动 0 不启动');
            $table->string('watermark_location')->default('')->values('水印位置');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transcoding_confgs',function(Blueprint $table){
            $table->dropColumn('watermark_or_not');
            $table->dropColumn('subtitle_startup');
            $table->dropColumn('watermark_location');
        });
    }
}
