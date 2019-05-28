<html>
<title>upload</title>
<head></head>
<body>
<script type="text/javascript" src="/plugin/jquery-1.11.2.min.js?{VERSH}"></script>
<script type="text/javascript" src="/plugin/spark-md5.js"></script>
<script type="text/javascript" src="/plugin/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="/plugin/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="/plugin/demo.css">
<script language="javascript">
    function Request(argname) {
        var url = document.location.href;
        var arrStr = url.substring(url.indexOf("?") + 1).split("&");
        for (var i = 0; i < arrStr.length; i++) {
            var loc = arrStr[i].indexOf(argname + "=");
            if (loc != -1) {
                return arrStr[i].replace(argname + "=", "").replace("?", "");
                break;
            }
        }
        return "";
    }
    ssss = Request("abc");
    var ServerUrl = ssss + "/uploads/";
    $(document).ready(function() {
        var hostname = window.location.hostname
        var port = window.location.port || '80';
        ServerUrl = ssss + "/uploads";
    })
</script>
<div class="row">
    <div id="chosevideo" class="webuploader-container col-xs-offset-5 text-center">
        <div style="opacity: 0;">
            <form>
                <div class="form-group">
                    <label for="exampleInputFile"></label>
                    <input type="file" id="file" style="width: 100%;height: 100%;">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12" style="height: 8px"></div>
</div>
<div class="webupload-info" style="display: none;">
    <div class="row">
        <div class="col-xs-8" style="padding :0 0 0 40px">
            档名：<span class="help-name small"></span>
        </div>
        <div class="col-xs-4 text-right">
            <button name="start" id="bnt-start" type="button" class="btn btn-success btn-sm" disabled>开始上传</button>
            <button name="cancel" id="bnt-cancel-init" type="button" class="btn btn-default btn-sm" style="display: none;" onclick="do_load();">取消上传</button>
            <button name="cancel" id="bnt-cancel" type="button" class="btn btn-default btn-sm" style="display: none;" onclick="stopSend();">取消上传</button>
            <span class="help-finish" style="display: none;color: #0033FF">上传成功</span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" style="height: 8px"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="progress progress-striped">
                <div class="progress-bar" style="width: 0%">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row small">
        <div class="col-xs-3" style="padding :0 0 0 40px">
            <span id="help-init" class="help-percentage text-danger">0.0M</span> / <span class="help-filesize"></span>
        </div>
        <div class="col-xs-3">
            上传速度：<span class="help-speed text-danger"></span>
        </div>
        <div class="col-xs-4">
            总用时间：<span class="help-time text-danger"></span>
        </div>
        <div class="col-xs-2">
            <span class="help-progress_subject">总迈度：<span class="help-progress text-danger"></span></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12" style="height: 8px"></div>
</div>
<div class="row">
    <div class="form-group">
        <label class="col-xs-3 control-label text-right">视频地址：</label>
        <div class="col-xs-6">
            <input type="text" class="form-control" id="odownpath1" placeholder="请先上传视频">
        </div>
        <div class="col-xs-3">
            {{--<button type="button" class="btn btn-primary btn-sm" onclick="do_inster();">插入</button>--}}
            <button type="button" id="bnt-reupload" class="btn btn-danger btn-sm" onclick="do_load();">重新上传</button>
            <button type="button" id="bnt-uploadnext" class="btn btn-success btn-sm" style="display:none;" onclick="selectNext();">继续上传 </button>
        </div>
    </div>
</div>
{{--<div class="row">--}}
    {{--<div class="col-xs-10 col-xs-offset-1" style="font-family: '微软雅黑'">--}}
        {{--<h3>视频上传操作流程 </h3>--}}
        {{--<small class="text-danger">1、点击上传视频按钮，选择本地您要上传的视频</small><br>--}}
        {{--<small class="text-danger">2、视频上传完成后，点击立即插入，视频链接即可自动添加到主题内</small><br>--}}
        {{--<small class="text-danger">3、完成主题相关内容填写后，点击发帖栏左下角发表帖子，即可完成发布</small><br>--}}
        {{--<small class="text-danger">4、插入视频时请勿勾选纯文本模式</small>--}}
    {{--</div>--}}
{{--</div>--}}
<input type="hidden" id="upload" value="{{env('UPLOAD_URL')}}">
<script type="text/javascript">
$(document).ready(function(){
          var upload = document.getElementById("upload").value;

        var file, fileMd5;
        var url           = upload;
        var blobSlice     = File.prototype.mozSlice || File.prototype.webkitSlice || File.prototype.slice;
        var time_start    = new Date();
        var clock_start   = time_start.getTime();

        $('#file').change(function() {
            var filemd5      = new SparkMD5.ArrayBuffer();
            var fileReader   = new FileReader();
            let files        = this.files;
            file             = files[0];
            var chunkSize    = Math.pow(1024, 2) * 10;
            var chunks       = Math.ceil(file.size / chunkSize);
            var currentChunk = 0;


            fileReader.onload = function(e) {
                var buffer = e.target.result;
                filemd5.append(buffer);
                currentChunk += 20;
                if (currentChunk < chunks) {
                    loadNext();
                } else {
                    fileMd5 = filemd5.end();
                    //  init button
                    $('#bnt-reupload').show();
                    $('#bnt-uploadnext').hide();
                    $('.webupload-info').show();
                    $('#bnt-start').show();
                    $('#bnt-cancel-init').hide();
                    $('#bnt-cancel').hide();
                    $('.help-finish').hide();
                    $('#help-init').text('0.0M');
                    $('.help-name').text(file.name);
                    $('.help-filesize').text(Math.round(file.size / 1024 / 1024 * 100) / 100 + 'M');
                    $('#bnt-start').prop('disabled', false);
                    // console.log(fileMd5);
                }
            };

            function loadNext() {
                let start = currentChunk * chunkSize,
                    end = start + chunkSize >= file.size ? file.size : start + chunkSize;
                fileReader.readAsArrayBuffer(blobSlice.call(file, start, end));
            }
            loadNext();
        });

        $('#bnt-start').click(function(){
            $('#bnt-start').hide();
            $('#bnt-cancel-init').hide();
            $('#bnt-cancel').show();
            $('#file').prop('disabled', true);
            $('.help-speed').text( "K/s");
            $('.help-time').text( "00分 :00秒");
            let fileType          = file.name.split('.');
            var SourceFilename    = encodeURIComponent(fileType[0]);
            var SourceFileSubname = fileType[1];
            var postData = "";
            var postTmpData = {
                'fileType' : SourceFileSubname,
                'fileMd5'  : fileMd5,
                'FileName' : SourceFilename,
                'tranType' : 'cmd',
                'offset'   : '0',
                'fileSize' : file.size.toString()
            };
            postData = JSON.stringify(postTmpData);
            // var obj = {};
            // obj.offset = '0';
            // obj.Blacksize = '204800';
            // obj.fileType = SourceFileSubname;
            // obj.fileMd5 = fileMd5;
            // obj.filename = SourceFilename;
            // obj.tranType = 'data';
            // obj.fileSize = file.size.toString();
            // startSend(obj);
            // return false;
            $.ajax({
                url        : url,
                type       : 'POST',
                headers    : {
                    'upParam' : postData
                },
                processData: false,
                contentType: false,
                success: function(data, status, xhr) {
                    var obj       = {};
                    obj.Errmsg    = data.errmsg;
                    obj.Retcode   = data.retcode;
                    obj.Blacksize = data.blockSize;
                    obj.Playurl   = (data.playUrl===null) ? '' : data.playUrl;
                    obj.offset    = (data.offset===null) ? 0 : data.offset;
                    obj.fileMd5   = fileMd5;
                    obj.filename  = SourceFilename;
                    obj.fileSize  = file.size;
                    obj.fileType  = SourceFileSubname;
                    // console.log(obj);
                    if(obj.Retcode==1){
                        $('#bnt-cancel').hide();
                        $('#bnt-reupload').hide();
                        $('.help-progress_subject').hide();
                        $('.help-finish').show();
                        $('#bnt-uploadnext').show();
                        $('#odownpath1').val(obj.Playurl);
                        $('.progress-bar').width('100%');
                        $('.help-percentage').text($('.help-filesize').text());
                        console.log('#101 傳輸結束');
                    }else if(obj.Retcode==2){
                        console.log('#201 连线失败，请通知管理人员');
                    }else if(obj.Retcode==3){
                        console.log('#301 系統錯誤！');
                        return false;
                    }else if(obj.Retcode==4){
                        alert('文件類型不支持！');
                        return false;
                    }else{ //Retcode==0 继续上传
                        obj.offset = (obj.offset > obj.fileSize) ? obj.fileSize: obj.offset; //確認offset位置
                        startSend(obj);
                    }
                },
                error: function(data) {
                    $('#bnt-cancel-init').show();
                    $('#bnt-cancel').hide();
                    alert('#401 连线失败，请通知管理人员');
                }
            });
        })

        function startSend(obj){
            var nextSize  = parseInt(obj.offset) + parseInt(obj.Blacksize);
            var tmpData   = file.slice(obj.offset, nextSize);
            // var tmpData   = blobSlice.call(file, obj.offset, nextSize);
            ot            = new Date().getTime();
            oloaded       = 0;//设置上传开始时，以上传的文件大小为0
            var postData = "";
            var postTmpData = {
                'fileType' : obj.fileType,
                'fileMd5'  : obj.fileMd5,
                'FileName' : obj.filename,
                'tranType' : 'data',
                'offset'   : obj.offset.toString(),    //起始點
                'fileSize' : obj.fileSize.toString()   //總長度
            };
            postData = JSON.stringify(postTmpData);
            xxhr = $.ajax({
                url        : url,
                type       : 'POST',
                dataType   : 'json',
                headers    : {
                    'upParam' : postData
                },
                data       : tmpData,
                processData: false,
                contentType: false,
                xhr: function xhr() {
                    //获取原生的xhr对象
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) {
                        //添加 progress 事件监听
                        xhr.upload.addEventListener('progress', progressFunction);
                    }
                    return xhr;
                },
                success: function(data, status, xhr) {
                    // console.log(obj);
                    // console.log(data);
                    $('.help-progress').text(Math.ceil((obj.offset / obj.fileSize) * 100) + '%');
                    $('.progress-bar').width(Math.ceil((obj.offset / obj.fileSize) * 100) + '%');
                    $('.help-percentage').text(Math.round(obj.offset / 1024 / 1024 * 100) / 100 + 'M');
                    obj.Errmsg    = data.errmsg;
                    obj.Type      = data.Type;
                    obj.Retcode   = data.retcode;
                    obj.Playurl   = (data.playUrl===null) ? '' : data.playUrl;
                    obj.offset    = (data.offset===null) ? 0 : data.offset;
                    if(obj.Retcode==1){
                        $('#bnt-cancel').hide();
                        $('#bnt-reupload').hide();
                        $('.help-progress_subject').hide();
                        $('.help-finish').show();
                        $('#bnt-uploadnext').show();
                        $('.progress-bar').width('100%');
                        $('.help-percentage').text($('.help-filesize').text());
                        $('#odownpath1').val(obj.Playurl);
                        console.log('#102 传输结束');
                    }else if(obj.Retcode==2){
                        console.log('#202 连线失败，请通知管理人员');
                    }else if(obj.Retcode==3){
                        console.log('#302 系統錯誤！');
                    }else if(obj.Retcode==4){
                        alert('文件類型不支持！');
                        return false;
                    }else{
                        obj.offset = (obj.offset > obj.fileSize) ? obj.fileSize: obj.offset;
                        startSend(obj);
                    }
                },
                error: function(data) {
                    $('#bnt-cancel-init').show();
                    $('#bnt-cancel').hide();
                    alert('#402 连线失败，请通知管理人员');
                }
            });

        }

        function get_time_spent (){
            var time_now = new Date();
            return((time_now.getTime() - clock_start)/1000);
        }

        function show_secs(){
            var i_total_secs = Math.round(get_time_spent());
            var i_secs_spent = i_total_secs % 60;
            var i_mins_spent = Math.round((i_total_secs-30)/60);
            var s_secs_spent = "" + ((i_secs_spent>9) ? i_secs_spent : "0" + i_secs_spent);
            var s_mins_spent = "" + ((i_mins_spent>9) ? i_mins_spent : "0" + i_mins_spent);
            $('.help-time').text(s_mins_spent + "分 :" + s_secs_spent + "秒");
        }

        function progressFunction(evt) {
            show_secs();
            var nt      = new Date().getTime();//获取当前时间
            var pertime = (nt-ot)/1000; //计算出上次调用该方法时到现在的时间差，单位为s
            ot          = new Date().getTime(); //重新赋值时间，用于下次计算
            var perload = evt.loaded - oloaded; //计算该分段上传的文件大小，单位b
            oloaded     = evt.loaded;//重新赋值已上传文件大小，用以下次计算
            //上传速度计算
            var speed   = perload/pertime;//单位b/s
            var bspeed  = speed;
            var units   = 'b/s';//单位名称
            if(speed/1024>1){
                speed = speed/1024;
                units = 'k/s';
            }
            if(speed/1024>1){
                speed = speed/1024;
                units = 'M/s';
            }
            speed = speed.toFixed(1);
            $('.help-speed').text(speed+units);
        }
    });

    function stopSend(){
        if(xxhr) {
            xxhr.abort();
            $('#bnt-start').show();
        }
    }

    function do_inster() {
        var viedoe = $('#odownpath1').val();
        viedoe = viedoe.replace('//', '///');
        viedoe = viedoe.replace(/\/\//g, '/'); //除去多的斜杠。。
        if (viedoe) {
            var editor = $('#e_iframe', parent.document.body);
            editor.contents().find("body").append('[ckplayer=' + viedoe + ']' + viedoe + '[/ckplayer]');
            $('#odownpath1').attr("value", "");
        } else {
            alert('请先上传视频');
        }
    }

    function do_load() {
        window.location.reload();
    }

    function selectNext(){
        $('#file').removeAttr("disabled");
        $('#file').val("");
        $('.webupload-info').hide();
        $('.progress-bar').width('0%');
        $('#odownpath1').val("")
        $('#file').click();
    }
</script>
</body>
</html>
