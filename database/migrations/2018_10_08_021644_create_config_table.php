<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *此表暂时不用
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain', 100)->comment('播放域名');
            $table->string('format', 256)->comment('支付的播放类型');
            $table->tinyInteger('current_translate')->comment('并发转码');
            $table->tinyInteger('max_translate')->comment('最大并发转码');
           // $table->timestamp('created_at')->useCurrent()->comment('提交时间');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
