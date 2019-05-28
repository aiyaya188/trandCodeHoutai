<?php
/**
 * Created by PhpStorm.
 * User: Float
 * Date: 2018/10/31
 * Time: 11:16
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cache\RedisLock;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\TransformController;
use App\Http\Controllers\WaterMarkController;
use App\Http\Controllers\CaptionController;
use Redis;
use App\Models\Videos;
use App\Models\Config;

/**
 * Class TranslateController
 * @package App\Http\Controllers
 */
class TranslateController extends Controller
{
    protected $redis;

    /**
     * 扫描等待队列，获取等待转码的节点
     * @return bool|string
     */
    public function scanWaitingList(){
        \Log::info("开始获取等待队列节点。。。。。。。。。。。。。");
        $listKey=config('TranslateConf.WAITING_LIST_KEY');
        $nodeValue=$this->redis->lpop($listKey);
        if(!empty($nodeValue)){
            \Log::info("节点信息：".var_export($nodeValue,1));
            return $nodeValue;
        }else{
            if($this->getWaitingFromDb()){
                $nodeValue=$this->redis->lpop($listKey);
                \Log::info("节点信息：".var_export($nodeValue,1));
                return $nodeValue;
            }else{
                return false;
            }
        }
    }

    /**
     * 从mysql获取等待任务，每次获取N条等待任务，写入redis
     */
    protected function getWaitingFromDb(){
        \Log::info("从mysql 获取队列信息。。。。。。。。。。。。。");
        $videos=Videos::where("status",'=',config('statusCode.translate_waiting'))->limit(50)->get();
        if(is_array($videos->toArray())){
            foreach ($videos->toArray() as $k=>$v)
            {
                $listKey=config('TranslateConf.WAITING_LIST_KEY');
                $nodeValue=json_encode($v);
                $this->redis->rPush($listKey,$nodeValue); //推进缓存队列
                $videos[$k]['status']= config('tranlate_waiting_cache');//改变视频状态
                $videos[$k]->save();

            }
        }
    }
    public function test()
    {
        \Log::info("开始检查等待队列。。。。。。。。。。。。。");
    }
    /**
     *  定时器调用该函数
     * @return bool
     */
    public function translateCode(){
        \Log::info("开始检查等待队列。。。。。。。。。。。。。");
        $maxKey = config('TranslateConf.MAX_TRANSLATING_KEY');
        $maxValue = $this->redis->get($maxKey);//获取最多可以允许同时多少个转码进程工作
        if(empty($maxValue)){ //如果redis获取不到，则从mysql取，取完写入redis
            \Log::info("从mysql获取最大并发进程数量。。。。。。。。。。。。。");
            $config=Config::where("id","=",'1')->find(1);
            $maxValue=$config['max_translate'];
            $this->redis->set($maxKey,$maxValue);
        }
        \Log::info("最大并发进程数量:".$maxValue);
        $currenKey = config('TranslateConf.CURREN_TRANSLATING_KEY');
        $currenValue = $this->redis->get($currenKey);//获取当前有多少个转码进程在同时工作
        if(empty($currenValue )){ //如果redis获取不到，设置为0
            \Log::info("设置当前并发数量为0");
            $currenValue = 0;
            $this->redis->set($currenKey,$currenValue);
        }
        \Log::info("当前并发数量为:".$currenValue);
        if($currenValue<=$maxValue){ // 并发进程在设置范围内
            $nodeValue=$this->scanWaitingList(); //扫描等待队列，获取等待转码的节点
            if(!empty($nodeValue)){
                $currenValue = $currenValue+1;//并发进程加1
                $this->redis->set($currenKey,$currenValue);
                \Log::info("开始执行任务,当前并发任务数量：".$currenValue);
                $this->start($nodeValue);
                $currenValue = $this->redis->get($currenKey);//并发进程减1
                $currenValue = $currenValue-1;
                $this->redis->set($currenKey,$currenValue);
                \Log::info("执行任务完毕,当前并发任务数量：".$currenValue);
            }else{
                \Log::info("等待队列没有任务");
                return false;
            }
        }else{
            \Log::info("当前并发数量大于设定并发量，退出队列");
            return false;
        }

    }



    /**
     * 启动执行命令
     * 启动任务的时候:任务并发数量+1
     * 任务执行完成: 任务并发数量-1
     * 加减必须保证原子操作
     * 任务执行完毕后，修改任务状态为完成或失败
     * @param $path
     */
    public function start(){
        $waterMark = new WaterMarkController();

    }
}
