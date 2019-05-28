<?php
/**
 * Created by PhpStorm.
 * User: Float
 * Date: 2018/10/31
 * Time: 11:16
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class TransformController
 * @package App\Http\Controllers
 */
class TransformController extends Controller
{

    protected $sourcePath;
    protected $destinationPath;

    /**
     * TransformController constructor.
     * @param string $sourcePath
     * @param string $destinationPath
     */
    public function __construct($sourcePath='/www/wwwroot/tran.vik888.com/cloudTranscodin/public/uploads/video/mp4/cap1.mp4', $destinationPath='/www/wwwroot/tran.vik888.com/cloudTranscodin/public/uploads/video/m3u8/tra1.m3u8')
    {
        parent::__construct();
        $this->sourcePath = $sourcePath;
        $this->destinationPath = $destinationPath;
        $this->getCommand();
    }


    /**
     */
    public function getCommand()
    {
//        $cmd = '/opt/local/ffmpeg/bin/ffmpeg -i ' . $mp4Path .'/out13.mp4 -c:v libx264 -c:a aac -strict -2 -hls_list_size 0 -f hls ' . $m3u8Path . '/output.m3u8';
        $this->cmd = <<<EOF
{$this->ffmpegPath} -y -i {$this->sourcePath} -c:v libx264 -c:a aac -strict -2 -hls_list_size 0 -f hls {$this->destinationPath}
EOF;
        return $this;
    }

    /**
     * @param 开始转码
     */
    public function startTransform()
    {
        exec($this->cmd, $res, $resCode);

        if ($resCode == 0)
        {
            //success
            \Log::info('transform-success');
        } else {
            var_dump($res);die;
            //fail
        }
    }


}
