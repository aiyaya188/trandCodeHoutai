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
    <title>视频管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en"></span>  <span class="c-gray en"></span>  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="pd-20">

        <div class="cl pd-5 bg-1 bk-gray mt-20">
            {{--<span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>--}}
            </span>
            <div class="text-c"> 累计：
                -<span style="color:blue">成功：{{$success ?? 0}}</span>,
                -<span style="color:red">失败：{{$failure ?? 0}}</span>
                <form method="POST" action="{{ url('admin/video') }}" >
                    {{ csrf_field() }}
                    <input type="text" class="input-text" style="width:250px" placeholder="请输入文件名或id" id="" name="sousuo"/>

                    <span class="select-box inline">
		      <select class="select" id="" name="name">
                <option value="0">视频id搜索</option>
                <option value="1">文件名搜索</option>
		     </select>
		   </span>
                    <span class="select-box inline">
                        <select class="select" id="" name="status">
                <option value="0">全部</option>
                <option value="1">等待转码</option>
                <option value="2">正在转码</option>
                <option value="3">转码成功</option>
                <option value="4">转存成功</option>
                <option value="5">转码失败</option>
                <option value="6">转存失败</option>
  		     </select>
                    </span>

                    <input type="submit" value="查询" class="btn btn-success" ><i class="icon-search">
                </form>
            </div>
        </div>
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                {{--<th width="25"><input type="checkbox" name="" value=""></th>--}}
                <th width="80">编号</th>
                <th width="100">文件名</th>
                <th width="40">大小</th>
                <th width="90">时长</th>
                <th width="150">启动时间</th>
                <th width="70">状态</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($videos as $video)
                <tr class="text-c">
                    {{--<td><input type="checkbox" value="{{$video->id}}" name="id"></td>--}}
                    <td>{{$video->id}}</td>
                    <td>{{urldecode($video->file_name)}}</td>
                    <td>{{$video->file_size}}</td>
                    <td>{{$video->play_time}}</td>
                    <td>{{$video->created_at}}</td>
                    <td>

                        @if($video->status==1)
                            等待转码
                        @elseif($video->status==2)
                            正在转码
                        @elseif($video->status==3)
                            转码成功
                        @elseif($video->status==4)
                            转存成功
                        @elseif($video->status== 5)
                            转码失败
                        @elseif($video->status== 6)
                            转存失败
                        @else

                        @endif
                    </td>
                    <td class="user-status">
                        @if( Auth::user()->email == env('ADMIN_EMAIL'))
                            <a onclick="javascript:return del()" href="{{url("admin/video/delete/{$video->id}")}}">删除</a>
                        @else

                        @endif
                        @if($video->status==4)
                        <a href="{{url("admin/video_url?url = $url/$video->dest_path")}}" target="_blank">地址</a>
                            @else
                        @endif


                    </td>
                </tr>
            @endforeach
            <!--分页 start-->
            <div id="pull_right">
                <div class="pull-right">
                    {!! $videos->links() !!}
                </div>
            </div>
            <!--分页 end-->

            </tbody>

        </table>
        <div id="pageNav" class="pageNav"></div>

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
{{--<script type="text/javascript">--}}
{{--$('.table-sort').dataTable({--}}
{{--"aaSorting": [[ 2, "desc" ]],//默认第几个排序--}}
{{--"bStateSave": true,//状态保存--}}
{{--"pading":false,--}}
{{--"aoColumnDefs": [--}}
{{--//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示--}}
{{--{"orderable":false,"aTargets":[0,2]}// 不参与排序的列--}}
{{--]--}}
{{--});--}}

{{--</script>--}}
<script type="text/javascript">
    function del() {
        var msg = "您真的确定要删除吗？\n\n删除后将无法恢复！";
        if (confirm(msg) == true) {
            return true;
        } else {
            return false;
        }
    }
    function del2() {
        var msg = "你不是超级管理员？\n\n没有该操作权限！";
        if (confirm(msg) == true) {
            return true;
        } else {
            return false;
        }
    }

</script>

</body>
</html>