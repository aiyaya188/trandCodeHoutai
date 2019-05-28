@extends('layouts.top')

<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="日志列表" data-href="welcome.html">日志列表</span>
                    <em></em></li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
    </div>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 操作日志  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
    <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 刷新</a></span>
    <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 清除</a></span>
        </div>
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="20">时间</th>
                <th width="400">内容</th>

            </tr>
            </thead>
            <tbody>
            @foreach($logs as $v)
            <tr class="text-c">
                <td>{{$v->created_at}}</td>
                <td>{{$v->content}}</td>

               </tr>
                @endforeach
            <!--分页 start-->
            <div id="pull_right">
                <div class="pull-right">
                    {!! $logs->links() !!}
                </div>
            </div>
            <!--分页 end-->

            </tbody>

        </table>
        <div id="pageNav" class="pageNav"></div>

</section>

<link rel="stylesheet" type="text/css" href="/css/page.css" />
<!--_footer 作为公共模版分离出去-->
@extends('layouts.js')
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/jquery.contextmenu/jquery.contextmenu.r2.js?1"></script>
</body>
</html>