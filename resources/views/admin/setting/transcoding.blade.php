<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/lib/html5shiv.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>转码设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>  <span class="c-gray en"></span>  <span class="c-gray en"></span>  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="pd-20">
        <form method="POST" action="{{ url('admin/transcoding') }}">
            {{ csrf_field() }}
            @foreach($transcoding as $value)
                <div class="tabCon1">
                    <div class="row cl">
                        {{--<label class="form-label col-xs-4 col-sm-2">--}}
                {{--<span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                {{--</span>--}}
                            {{--查询周期11：</label>--}}
                        {{--<div class="formControls col-xs-8 col-sm-9">--}}
                            {{--<input type="text" maxlength="10" onkeyup="this.value=this.value.replace(/\D/g,'')" name="query_cycle" id="" placeholder=""  value="{{$value->query_cycle ?? ''}}" class="input-text">--}}
                        {{--</div>--}}
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            任务数量：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="2" onkeyup="this.value=this.value.replace(/\D/g,'')" name="number_of_tasks" id="" placeholder="" value="{{$value->number_of_tasks ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            转码格式：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="100" name="transcoding_format" id="" placeholder="" value="{{$value->transcoding_format ?? ''}}" class="input-text">
                        </div>
                        {{--<label class="form-label col-xs-4 col-sm-2">--}}
                {{--<span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                {{--</span>--}}
                            {{--去掉片头：</label>--}}
                        {{--<div class="formControls col-xs-8 col-sm-9">--}}
                            {{--<input type="text" maxlength="100" onkeyup="this.value=this.value.replace(/\D/g,'')" name="remove_the_title" id="" placeholder="" value="{{$value->remove_the_title ?? ''}}" class="input-text">--}}
                        {{--</div>--}}
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            码率设置：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="100" name="rate_setting" id="" placeholder="" value="{{$value->rate_setting ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            码率描述：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="100" name="rate_description" id="" placeholder="" value="{{$value->rate_description ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            画面大小：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="100" name="ricture_size" id="" placeholder="" value="{{$value->ricture_size ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            帧率设置：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="100" name="frame_rate_setting" id="" placeholder="" value="{{$value->frame_rate_setting ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            帧间隔：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="100" name="frame_interval" id="" placeholder="" value="{{$value->frame_interval ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            分片时长：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            {{--<input type="text" maxlength="7" onkeyup="this.value=this.value.replace(/\D|^1/g,'')" onafterpaste="this.value=this.value.replace(/\D|^1/g,'')"--}}
                                   {{--name="fragmentation_duration" id="" placeholder="" value="{{$value->fragmentation_duration ?? ''}}"  class="input-text">--}}
                            <input type="text" maxlength="7" onkeyup="this.value=this.value.replace(/\D/g,'')" name="fragmentation_duration" id="fragmentation_duration" placeholder="" value="{{$value->fragmentation_duration ?? ''}}"  class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            </label>
                        <div class="formControls col-xs-8 col-sm-911">
                            {{--是否删除--}}
                            {{--@if($value->delete_or_not)--}}
                                {{--<input name="delete_or_not" checked type="radio" value=1 />是--}}
                                {{--否 <input name="delete_or_not"  type="radio" value=0 />--}}
                            {{--@else--}}
                                {{--<input name="delete_or_not"  type="radio" value=1 />是--}}
                                {{--否 <input name="delete_or_not"checked  type="radio" value=0 />--}}
                            {{--@endif--}}
                            {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                            {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                            {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                            {{--水印是否启动--}}
                            {{--@if($value->watermark_or_not)--}}
                                {{--<input name="watermark_or_not" checked type="radio" value=1 />是--}}
                                {{--否 <input name="watermark_or_not"  type="radio" value=0 />--}}
                            {{--@else--}}
                                {{--<input name="watermark_or_not"  type="radio" value=1 />是--}}
                                {{--否 <input name="watermark_or_not"checked  type="radio" value=0 />--}}
                            {{--@endif--}}
                            {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                            {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                            {{--字幕是否启动--}}
                            {{--@if($value->subtitle_startup)--}}
                                {{--<input name="subtitle_startup" checked type="radio" value=1 />是--}}
                                {{--否 <input name="subtitle_startup"  type="radio" value=0 />--}}
                            {{--@else--}}
                                {{--<input name="subtitle_startup"  type="radio" value=1 />是--}}
                                {{--否 <input name="subtitle_startup"checked  type="radio" value=0 />--}}
                            {{--@endif--}}
                            <input onclick="return  check()"   name="system-base-save" id="system-base-save2" class="btn btn-success radius"
                                    type="submit" value="保存"><i class="icon-ok"></i>
                        </div>
                        </label>

                    </div>
                </div>
            @endforeach
        </form>

    </div>
</div>
    <link rel="stylesheet" type="text/css" href="/css/page.css" />
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

    function check(){
        // var reg = new RegExp("^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$");
        var obj =$(" #fragmentation_duration ").val();
        if(obj < 2){
            alert("分片时长最小为2");
            return false;
        }
    }

</script>

</body>
</html>