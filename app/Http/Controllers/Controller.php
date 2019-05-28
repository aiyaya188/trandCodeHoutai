<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Redis;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected  $redis;
    protected  $ffmpegPath;
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->ffmpegPath = config('ffmpegConf.FFMPEG_PATH');
        $this->fontTypePath = config('ffmpegConf.FONTTYPE_PATH');
//        $this->redis = new \Redis();
//        $this->redis->connect(getenv('REDIS_HOST'), getenv('REDIS_PORT'));

    }
}
