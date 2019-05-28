<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCfgsTable extends Migration
{
    /**
     * Run the migrations.
     *用于配置系统设置,域名和字幕
     * @return void
     */
    public function up()
    {
        Schema::create('cfgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('system_settings')->default('')->values('系统设置配置');
            $table->string('domain_name_setting')->default('')->values('域名设置');
            $table->string('subtitle_settings')->default('')->values('字幕设置');
            $table->string('subtitle_status')->default(0)->values('字幕状态1启用 ,0不启用');
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
        Schema::dropIfExists('cfgs');
    }
}
