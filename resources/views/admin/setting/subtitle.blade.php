<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/lib/html5shiv.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>字幕设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> <span class="c-gray en">&gt;</span> <span
            class="c-gray en"></span> <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
                                         href="javascript:location.replace(location.href);" title="刷新"><i
                class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="pd-20">
        <div class="page-container">
            <form method="POST" action="{{ url('admin/subtitle') }}">
                {{ csrf_field() }}
                @foreach($subtitle_settings as $value)
                    <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                        字幕内容：
                    </label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea maxlength="200" class="textarea" name="subtitle_settings" style="width:100%; height:200px; resize:none">{{$value->subtitle_settings ?? ''}}</textarea>
                    </div>
                    {{--<label class="form-label col-xs-4 col-sm-2">--}}
                    {{--<span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                    {{--</span>--}}
                    {{--字幕时长：--}}
                    {{--</label>--}}
                    {{--<div class="formControls col-xs-8 col-sm-9">--}}
                    {{--<input type="text" name="duration" id="" placeholder=""--}}
                    {{--value="{{$value->duration ?? ''}}" class="input-text">--}}
                    {{--</div>--}}
                    {{--<label class="form-label col-xs-4 col-sm-2">--}}
                    {{--<span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                    {{--</span>--}}
                    {{--播放间隔：--}}
                    {{--</label>--}}
                    {{--<div class="formControls col-xs-8 col-sm-9">--}}
                    {{--<input type="text" name="cycle_interval" id="" placeholder=""--}}
                    {{--value="{{$value->cycle_interval ?? ''}}" class="input-text">--}}
                    {{--</div>--}}

                    <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                        颜色：
                    </label>
                    <div class="formControls col-xs-8 col-sm-9">
                        {{--<input maxlength="7" type="text" name="colour" id="" placeholder="请输入十六进制色码如:  #FFB6C1"--}}
                               {{--value="{{$value->colour ?? ''}}" class="input-text">--}}
                        <input maxlength="7" type="text" name="colour" id="input" placeholder="请输入十六进制色码如:  #FFB6C1" value="{{$value->colour ?? ''}}" class="input-text" />
                        {{--<input maxlength="7" minlength="7" type="text" name="colour" id="input" placeholder="请输入十六进制色码如:  #FFB6C1"--}}
                               {{--value="{{$value->colour ?? ''}}" class="input-text" onKeyUp="this.value=this.value.replace(/^#[0-9a-fA-F]{6}$/,'')" />--}}

                    </div>
                    {{--<label class="form-label col-xs-4 col-sm-2">--}}
                    {{--<span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                    {{--</span>--}}
                    {{--字体选择 ：--}}
                    {{--</label>--}}
                    {{--<div class="formControls col-xs-8 col-sm-9">--}}
                    {{--@if($value->font == 1)--}}
                    {{--微软雅黑 <input name="font" checked type="radio" value=1>--}}
                    {{--黑体  <input name="font" type="radio" value=2>--}}
                    {{--宋体 <input name="font" type="radio" value=3>--}}
                    {{--@elseif($value->font == 2)--}}
                    {{--微软雅黑 <input name="font"  type="radio" value=1>--}}
                    {{--黑体  <input name="font" checked type="radio" value=2>--}}
                    {{--宋体 <input name="font" type="radio" value=3>--}}
                    {{--@else($value->font == 3)--}}
                    {{--微软雅黑 <input name="font"  type="radio" value=1>--}}
                    {{--黑体  <input name="font" type="radio" value=2>--}}
                    {{--宋体 <input name="font" checked type="radio" value=3>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                        字幕位置：
                    </label>
                    <div class="formControls col-xs-8 col-sm-9">
                        {{--<input type="text" name="starting_position" id="" placeholder=""--}}
                        {{--value="{{$value->starting_position ?? ''}}" class="input-text">--}}
                    </div>

                    <div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="starting_position" class="select">
                            <option {{$value->starting_position =='1'?'selected':''}} value=1>上</option>
                            <option {{$value->starting_position =='2'?'selected':''}} value=2>中</option>
                            <option {{$value->starting_position =='3'?'selected':''}} value=3>下</option>
				</select>
				</span>
                    </div>
                    <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                        字体大小：
                    </label>
                    <div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
				<select name="font_size" class="select">
                             <option {{$value->font_size ==9 ? 'selected':''}} value=9>9</option>
                            <option {{$value->font_size ==10 ? 'selected':''}} value=10>10</option>
                            <option {{$value->font_size ==12 ? 'selected':''}} value=12>12</option>
                            <option {{$value->font_size ==15? 'selected':''}} value=15>15</option>
                            <option {{$value->font_size ==16 ? 'selected':''}} value=16>16</option>
                            <option {{$value->font_size ==32 ? 'selected':''}} value=32>32</option>
                            <option {{$value->font_size ==42 ? 'selected':''}} value=42>42</option>
                            <option {{$value->font_size ==52 ? 'selected':''}} value=52>52</option>
                            <option {{$value->font_size ==72 ? 'selected':''}} value=72>72</option>
				</select>
				</span>
                    </div>
                    <div class="formControls col-xs-8 col-sm-9">
                        {{--<input type="text" name="font_size" id="" placeholder=""--}}
                        {{--value="{{$value->font_size ?? ''}}" class="input-text">--}}
                    </div>


                    </label>
                    <div class="formControls col-xs-8 col-sm-9">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                        {{--@if($value->shadow != 0)--}}
                        {{--<input name="shadow" checked type="radio" value=1>是--}}
                        {{--否 <input name="shadow" type="radio" value=0>--}}
                        {{--@else--}}
                        {{--<input name="shadow" type="radio" value=1>是--}}
                        {{--否 <input name="shadow" checked type="radio" value=0>--}}
                        {{--@endif--}}

                        <div class="mt-20 text-c">
                            <input onclick="return  check()" name="system-base-save" id="system-base-save" class="btn btn-success radius"
                                   value="确定"
                                   type="submit"><i class="icon-ok"></i>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>

    </div>
</div>
    <link rel="stylesheet" type="text/css" href="/css/page.css"/>
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

         // $("input").blur(function(){
         //
         //     var reg = new RegExp("^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$");
         //     // var obj =$(" #input ").val();
         //     var obj = document.getElementById("input");
         //     if(!reg.test(obj.value)){
         //
         //         alert("请输入正确的颜色值");
         //     }else {
         //         $("input").css("background-color","#D6D6FF");
         //
         //         return false
         //     }
         //
         // });

         function check(){
             var reg = new RegExp("^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$");
             // var obj =$(" #input ").val();
             var obj = document.getElementById("input");
             if(!reg.test(obj.value)){
                 alert("请输入正确的颜色值");
                 return false;
             }
         }

     </script>

</body>
</html>