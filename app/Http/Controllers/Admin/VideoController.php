<?php
/**
 * Created by PhpStorm.
 * User: ablitt
 * Date: 2018/10/16
 * Time: 9:33
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Cfg;
use App\Http\Models\Log;
use App\Http\Models\Transcoding_confg;
use App\Http\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
      public function index(){
         $user = $this->get_user();
         if(!$user){
             return redirect('login');
         }
         
          return view('admin.video.index', [
              'user' => $user,
              ]);
      }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 视频管理列表
     */
      public function video(Request $request){
          $videos=new Videos();
          if($request->isMethod('post')){
		  //post请求匹配id或文件名
              if($request->status > 0 ){
                  //状态筛选
                  $videos = $videos->where('status',$request->status)->orderBy('id','desc')->paginate(20);
              } elseif($request->sousuo !=null ){
                  //搜索条件
                  if($request->name==0  ){
                            $videos=Videos::where( 'id', $request->sousuo)->paginate(1);
                  }elseif($request->name==1 ){
                           $videos=Videos::where('status','>',0)->where('file_name','like',"%$request->sousuo%")->orderBy('id','desc')->paginate(20);
                  }
              }else{
                //无搜索条件
                  $videos = $videos->where('status','>',0)->orderBy('id','desc')->paginate(20);
              }
          }else{
              //get请求返回所有数据
              $videos = $videos->where('status','>',0)->orderBy('id','desc')->paginate(20);
	 
	  }
          //计算成功失败
          $success=Videos::where('status','=',3)->orwhere('status','=',4)->count();//成功
          $failure=Videos::where('status','=',5)->count();//失败
          //获取播放域名
          $url=Cfg::where('id',1)->value('domain_name_setting');
          // 获取当前已认证的用户...
        $user = $this->get_user();
         if(!$user){
             return redirect('login');
	 }
          return view('admin.video.video', [
              'videos' => $videos,
              'success' => $success ?? 0,
              'failure' => $failure ?? 0,
              'url' => $url,
              'user' => $user,

          ]);
      }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     * 删除视频211
     */
    public function video_delete(Request $request){
        $id = $request->id;
        $videos = Videos::find($id);


        if($videos){
            $path = $videos->path;
            $file_name = Videos::cut_str($videos->path,'/',-1);
            $file=str_replace($file_name,'',$path);
            $source = env('STORAGESOURCE').'/'.$file;//删除文件路径
            \Illuminate\Support\Facades\Log::info($source);
            $path=['path'=>$source];
             $del_url=env('DEL_URL');
             if($videos->status==5){
                 $this-> delUrl($del_url,$path);
                     $videos->delete();
             }else{
                 $videos->delete();
             }

            return redirect('admin/video');

        }else{
            return '删除失败数据不存在';
        }

    }


    /**
     * @param $delurl
     * @param $path
     * @return mixed 发送请求
     */
    public static function delUrl($delurl,$path){
        $params = json_encode($path);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $delurl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params)
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $res = curl_exec($ch);
        curl_close($ch);
        $res=json_decode($res);
       return $res->status ;
    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 日志列表
     */
      public function log(){

        $logs=Log::orderBy('id','desc')->paginate(8);
          // 获取当前已认证的用户...
         $user = $this->get_user();
         if(!$user){
             return redirect('login');
         }
        return view('admin.log.index', [
              'logs'=>$logs,
              'user'=>$user,
              ]);
      }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * api设置
     */
    public function system(Request $request){
        $system= new Cfg();;
        if($request->isMethod('post')){
            //配置存在就修改
            $system = $system->where('id',1)->get();
            if($system->count()>0){
                DB::table('cfgs')
                    ->where('id', 1)
                    ->update(['system_settings' => $request->system_settings]);
                return redirect('admin/system');
            }else{//配置不存在就添加
                return redirect('admin/add_config');
            }
        }else{//get方式请求
            $system=$system->where('id',1)->value('system_settings');

        }
        // 获取当前已认证的用户...
       $user = $this->get_user();
         if(!$user){
             return redirect('login');
         }
        return view('admin.setting.system', [
            'system'=>$system,
            'user'=>$user,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 字幕设置
     */
    public function subtitle(Request $request){
        $subtitle= new Cfg();;
        if($request->isMethod('post')){
            //配置存在就修改
            $system = $subtitle->where('id',1)->get();
            if($system->count()>0){
                DB::table('cfgs')
                    ->where('id', 1)
                    ->update([
                        'subtitle_settings' => $request->subtitle_settings ?? "",
                        'duration' => $request->cycle_interval ?? "",
                        'starting_position' => $request->starting_position ?? '1',
                        'font_size' => $request->font_size ?? 9,
                        'colour' => $request->colour ?? "",
                        'font' => $request->font ?? "",
                        'shadow' => $request->shadow ?? 0,
                    ]);
                return redirect('admin/subtitle');
            }else{//配置不存在就添加
                return redirect('admin/add_config');
            }
        }else{//get方式请求
            $subtitle_settings=Cfg::where('id',1)->get();
            if(!$subtitle_settings->count()){
                return redirect('admin/add_config');
            }
        }
       $user = $this->get_user();
         if(!$user){
             return redirect('login');
         }
        return view('admin.setting.subtitle', [
            'subtitle_settings'=>$subtitle_settings,
            'user'=>$user,
        ]);
    }

    /**
     *域名设置
     */
    public function domain_name(Request $request){
        $system= new Cfg();;
        if($request->isMethod('post')){
            //配置存在就修改
            $system = $system->find(1)->count();
            if($system){
                DB::table('cfgs')
                    ->where('id', 1)
                    ->update([
                        'domain_name_setting' => $request->domain_name_setting
                    ]);
                return redirect('admin/domain_name');
            }else{//配置不存在就添加
                return redirect('admin/add_config');
            }
        }else{//get方式请求
            $domain_name=Cfg::where('id',1)->value('domain_name_setting');
        }
       $user = $this->get_user();
         if(!$user){
             return redirect('login');
         }
        return view('admin.setting.domain_name', [
            'domain_name'=>$domain_name,
            'user'=>$user,
        ]);
    }

    /**
     *转码设置
     */
    public function transcoding(Request $request){

        if($request->isMethod('post')){
            $transcoding = Transcoding_confg::find(1)->count();
            if($transcoding){
                DB::table('transcoding_confgs')
                    ->where('id', 1)
                    ->update([
                        'query_cycle' => $request->query_cycle ?? '',
                        'number_of_tasks' => $request->number_of_tasks ?? '',
                        'transcoding_format' => $request->transcoding_format ?? '',
                        'remove_the_title' => $request->remove_the_title ?? '',
                        'rate_setting' => $request->rate_setting ?? '',
                        'rate_description' => $request->rate_description ?? '',
                        'ricture_size' => $request->ricture_size ?? '',
                        'frame_rate_setting' => $request->frame_rate_setting ?? '',
                        'frame_interval' => $request->frame_interval ?? '',
                        'fragmentation_duration' => $request->fragmentation_duration ?? '',//分片时长
                        'delete_or_not' => $request->delete_or_not ?? 0,
                        'watermark_or_not' => $request->watermark_or_not ?? 0,//水印是否启动
                        'subtitle_startup' => $request->subtitle_startup ?? 0,//字幕是否启动

                    ]);
                return redirect('admin/transcoding');
            }else{

                return '请初始化转码配置表';
            }

        }else{
            $transcoding=Transcoding_confg::where('id',1)->get();
            if($transcoding->count()==0){
                $this->save_sranscoding();
                return redirect('admin/transcoding');
            }

        }
       $user = $this->get_user();
         if(!$user){
             return redirect('login');
         }
        return view('admin.setting.transcoding', [
            'transcoding'=>$transcoding,
            'user'=>$user
        ]);
    }

    /**
     * 初始化配置表cfgs
     */
    public function add_config(){
        $cfgs = new Cfg();
        $cfgs->id = 1;
        $cfgs->system_settings ='http://127.0.0.1:4234/file_info';
        $cfgs->domain_name_setting ='http://www.x8xb.info';
        $cfgs->subtitle_settings ='我是字幕内容';
        $cfgs->font =1;
        $cfgs->save();
        return '初始化配置表数据请返回刷新';
    }

    /**
     * @return int
     * 返回用户登录信息
     */
    public function get_user(){

        if (Auth::check()) {
            // 用户已登录...
            return  $user = Auth::user()->name;
        }else{
            return 0;

        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function file_upload(){


        $user = $this->get_user();
        if(!$user){
            return redirect('login');
        }
        return view('admin.setting.file_upload', [
            'user'=>$user
        ]);
    }


    /**
     *水印设置
     */
    public function watermark(Request $request){
        if($request->isMethod('post')){
            $transcoding = Transcoding_confg::find(1)->count();
            if($transcoding){
                DB::table('transcoding_confgs')
                    ->where('id', 1)
                    ->update([
                        'left_upper_watermark' => $request->left_upper_watermark ?? '',
                        'right_upper_watermark' => $request->right_upper_watermark ?? '',
                        'left_lower_watermark' => $request->left_lower_watermark ?? '',
                        'right_lower_watermark' => $request->right_lower_watermark ?? '',
                        'watermark_location' => $request->watermark_location ?? '',//水印位置
                    ]);
                return redirect('admin/watermark');
            }else{

                return '请初始化转码配置表';
            }

        }else{
            $transcoding=Transcoding_confg::where('id',1)->get();
            if($transcoding->count()==0){
                $this->save_sranscoding();
                return redirect('admin/watermark');
            }

        }
        $user = $this->get_user();
        if(!$user){
            return redirect('login');
        }
        return view('admin.setting.watermark', [
            'transcoding'=>$transcoding,
            'user'=>$user
        ]);
    }

    /**
     * 初始化转码配置表
     */
    public function save_sranscoding(){
        $transcoding = new Transcoding_confg();
        $transcoding->id = 1;
        $transcoding->query_cycle = 30;
        $transcoding->number_of_tasks = 5;
        $transcoding->transcoding_format = 'rmvb|flv|vob|mp4|mov|3gp|wmv|mp3|m';
        $transcoding->remove_the_title = 0;
        $transcoding->rate_setting =250|480;
        $transcoding->rate_description ='标清|高清';
        $transcoding->ricture_size ='480:-1|720:-1';
        $transcoding->frame_rate_setting =10|15;
        $transcoding->frame_interval =20 | 30;
        $transcoding->fragmentation_duration = 2;
        $transcoding->watermark_or_not = '';
        $transcoding->subtitle_startup = '';
        $transcoding->fragmentation_duration = 2;
        $transcoding->left_upper_watermark = '10:10|20:20';//下面水印默认
        $transcoding->right_upper_watermark = 0;
        $transcoding->left_lower_watermark = 0;
        $transcoding->right_lower_watermark = 0;
        $transcoding->save();
    }

    public function video_url(Request $request){
        $url = $request->all();
        return view('admin.video.url', [
            'url'=>$url,
        ]);
    }
}
