<?php
/**
 * Created by PhpStorm.
 * User: Float
 * Date: 2018/10/31
 * Time: 11:16
 */
namespace App\Http\Controllers;


/**
 * Class WaterMarkController
 * @package App\Http\Controllers
 */
class WaterMarkController extends Controller
{
    protected $sourcePath;//水印前音视频源地址
    protected $destinationPath;//水印后音视频地址
    protected $waterPicPath;//水印图片地址
    protected $x;//水印起始点x
    protected $y;//水印起始点y
    protected $cmd;//水印生成命令

    public function __construct($sourcePath='2018-11-01/e10bd04a92df7daaab45e30b5174ebf9.mp4', $destinationPath='/out4.mp4',$waterPicPath='1.png')
    {
        parent::__construct();
        $this->sourcePath = config('ffmpegConf.SOURCE_PATH') . $sourcePath;
        $this->destinationPath = public_path() . $destinationPath;
        $this->waterPicPath = public_path() . '/' . $waterPicPath;
        $this->getWaterMarkConfig();
        $this->getCommand();
    }

    /**
     * @param 获取水印的全局配置信息
     * @return array
     */
    public function getWaterMarkConfig()
    {
        //redis获取，如无，读库
        $config =  [
//            'position' => 'left_top',//1
//            'position' => 'left_bottom',//2
//            'position' => 'right_top',//3
//            'position' => 'right_bottom',//4
            'position' => '4',//4
            'distance' => [
                'left' => 10,
                'right' => 10,
                'top' => 10,
                'bottom' => 10,
            ]
        ];
        switch($config['position'])
        {
            case 1:
                $this->x = $config['distance']['left'];
                $this->y = $config['distance']['top'];
                break;
            case 2:
                $this->x = $config['distance']['left'];
                $this->y = 'main_h-overlay_h-' . $config['distance']['bottom'];
                break;
            case 3:
                $this->x = 'main_w-overlay_w-' . $config['distance']['right'];
                $this->y = $config['distance']['top'];
                break;
            case 4:
                $this->x = 'main_w-overlay_w-' . $config['distance']['right'];
                $this->y = 'main_h-overlay_h-' . $config['distance']['bottom'];
        }
    }

    /**
     * @param 生成水印操作命令
     */
    public function getCommand()
    {
//      $cmd =  /opt/local/ffmpeg/bin/ffmpeg -i /www/wwwroot/tran.vik888.com/cloudTranscodin/public/test.mp4 -i /www/wwwroot/tran.vik888.com/cloudTranscodin/public/1.png -filter_complex overlay="(main_w/2)-(overlay_w/2):(overlay_h)" /www/wwwroot/tran.vik888.com/cloudTranscodin/public/uploads/video/mp4/out1.mp4
        $this->cmd = <<<EOF
$this->ffmpegPath -y -i $this->sourcePath -i  $this->waterPicPath -filter_complex overlay="($this->x):($this->y)"  $this->destinationPath > /dev/null &
EOF;
    }

    /**
     * @return bool
     */
    public function startWaterMark() :bool
    {
        \Log::info('start:' . date('Y-m-d H:i:s'));
        set_time_limit(0) ;
        exec($this->cmd, $res, $resCode);
        var_dump($res);
        var_dump($resCode);
        if ($resCode == 0)
        {
            //success
            \Log::info('water-success' . date('Y-m-d H:i:s'));
            return true;

        } else {
            var_dump($res);echo $resCode;die;
            //fail
            \Log::info(date('Y-m-d H:i:s') . json_encode($res, true));
            return false;
        }
    }
}
