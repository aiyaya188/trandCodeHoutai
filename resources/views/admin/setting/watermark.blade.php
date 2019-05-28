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
    <title>水印设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>  <span class="c-gray en"></span>  <span class="c-gray en"></span>  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="pd-20">

        <form method="POST" action="{{ url('admin/watermark') }}">
            {{ csrf_field() }}
            @foreach($transcoding as $value)
                <div class="tabCon1">

                    <div class="row cl">

                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            </label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <span style="color:#FF0000;">
                            请按 10:10|20:20表明水印位置，不选的位置设置为0.否则会按默认位置处理
                         </span>
                        </div>

                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            左上水印：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" style="ime-mode:disabled" maxlength="20" name="left_upper_watermark" id="" placeholder="参考格式 10:10 | 20:20" value="{{$value->left_upper_watermark ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            右上水印：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="20" name="right_upper_watermark" id="" placeholder="10:10 | 20:20" value="{{$value->right_upper_watermark ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            左下水印：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="20" name="left_lower_watermark" id="" placeholder="10:10 | 20:20" value="{{$value->left_lower_watermark ?? ''}}" class="input-text">
                        </div>
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                            右下水印：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" maxlength="20" name="right_lower_watermark" id="" placeholder="10:10 | 20:20" value="{{$value->right_lower_watermark ?? ''}}" class="input-text">
                        </div>
                        {{--<label class="form-label col-xs-4 col-sm-2">--}}
                        {{--<span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        {{--</span>--}}
                        {{--分片时长：</label>--}}
                        {{--<div class="formControls col-xs-8 col-sm-9">--}}
                        {{--<input type="text" name="fragmentation_duration" id="" placeholder="" value="{{$value->fragmentation_duration ?? ''}}" class="input-text">--}}
                        {{--</div>--}}
                        {{--<label class="form-label col-xs-4 col-sm-2">--}}
                        {{--<span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        {{--</span>--}}
                        {{--水印图片位置：</label>--}}
                        {{--<div class="formControls col-xs-8 col-sm-9">--}}
                        {{--<input type="text" name="watermark_location" id="" placeholder="" value="{{$value->watermark_location ?? '' }}" class="input-text">--}}
                        {{--</div>--}}
                        <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                        </label>
                        <div class="formControls col-xs-8 col-sm-911">
                            <input  name="system-base-save" id="system-base-save2" class="btn btn-success radius"
                                    type="submit" value="保存"><i class="icon-ok"></i>
                        </div>


                    </div>
                </div>
            @endforeach
        </form>

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


</body>
</html>