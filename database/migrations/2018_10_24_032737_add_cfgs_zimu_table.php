<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCfgsZimuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cfgs', function (Blueprint $table) {
            $table->string('duration')->default(0)->values('单条字幕播放时长');
            $table->string('cycle_interval')->default(0)->values('循环播放间隔');
            $table->string('starting_position')->default('')->values('字幕开始位置');
            $table->string('font_size')->default('')->values('字幕字体大小');
            $table->string('colour')->default('')->values('字幕颜色 ');
            $table->string('font')->default('')->values('微软雅黑，黑体，宋体');
            $table->string('shadow')->default('')->values('阴影效果1 是 0 否');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cfgs',function(Blueprint $table){
            $table->dropColumn('duration');
            $table->dropColumn('cycle_interval');
            $table->dropColumn('starting_position');
            $table->dropColumn('font_size');
            $table->dropColumn('colour');
            $table->dropColumn('font');
            $table->dropColumn('shadow');
        });

    }
}
