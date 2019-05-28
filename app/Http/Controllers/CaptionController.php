<?php
/**
 * Created by PhpStorm.
 * User: Float
 * Date: 2018/10/31
 * Time: 11:16
 */

namespace App\Http\Controllers;

/**
 * Class CaptionController
 * @package App\Http\Controllers
 */
class CaptionController extends Controller
{
    protected $sourcePath;//字幕前音视频地址
    protected $destinationPath;//字幕后音视频地址
    protected $text;//字幕内容
    protected $fontColor;//字幕颜色
    protected $fontSize;//字幕大小
    protected $shadow;//阴影效果
    protected $shadowX;//水平阴影偏移
    protected $shadowY;//垂直阴影偏移
    protected $cmd;//字幕生成命令

    /**
     * CaptionController constructor.
     * @param $sourcePath
     * @param $destinationPath
     * @param $text
     * @param string $fontColor
     * @param int $fontSize
     * @param bool $shadow
     * @param int $shadowX
     * @param int $shadowY
     */
    public function __construct($sourcePath='/www/wwwroot/tran.vik888.com/cloudTranscodin/public/uploads/video/mp4/out2.mp4', $destinationPath='/www/wwwroot/tran.vik888.com/cloudTranscodin/public/uploads/video/mp4/cap1.mp4', $text='检查配置文件定义要查找的问题类型。例如，这些检查项的禁用启', $fontColor='red', $fontSize=42, $shadow=false, $shadowX=0, $shadowY=0)
    {
        parent::__construct();
        $this->sourcePath = $sourcePath;
        $this->destinationPath = $destinationPath;
        $this->text = $text;
        $this->fontColor = $fontColor;
        $this->fontSize = $fontSize;
        $this->shadow = $shadow;
        $this->shadowX = $shadow ? $shadowX : 0;
        $this->shadowY = $shadow ? shadowY : 0;
        $this->getCommand();

    }

    /**
     * @return $this
     */
    public function getCommand()
    {
        $this->cmd =  <<<EOF
{$this->ffmpegPath} -y -i  {$this->sourcePath}   -filter:v drawtext="{$this->fontTypePath}: text='{$this->text}':fontcolor={$this->fontColor}:fontsize={$this->fontSize}:y=h-line_h-30:x=(tw-mod(5*n\,w+tw*1.8)): shadowx={$this->shadowX}: shadowy={$this->shadowY}" -codec:v libx264  -codec:a  copy -y  $this->destinationPath
EOF;
        echo $this->cmd;
    }

    /**
     *
     */
    public function startCaption() :bool
    {
        exec($this->cmd, $res, $resCode);

        if ($resCode == 0)
        {
            //success
            \Log::info('caption-success');
        } else {
            var_dump($res);die;
            //fail
        }
    }


}
