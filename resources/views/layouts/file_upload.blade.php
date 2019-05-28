<style type="text/css">
    body { font-family: "微软雅黑"; font-size: 16px; }
    a:link, a:visited { color: #666666; text-decoration: none; outline: none; }
    a:hover { color: #0E4470; }
    .clear { clear: both; }
    .hyright { width: 830px; min-height: 520px; padding: 18px; background: #fff; border: 1px solid #dee2e5; margin: 0 auto; }
    .shipin_tit h2 { font-size: 30px; font-weight: normal; }
    .shipin_tit h2 ul li.selected { color: #FF804F; border-bottom: 1px solid #FF801D; }
    .shipin_tit h2 ul li { float: left; color: #C2C1C1; padding: 5px 10px; cursor: pointer; }
    ul li, ul { list-style-type: none; padding: 0; margin: 0; }
    .webuploader-container { width: 286px; height: 170px; background: url(/pepsifile/css/sc.png) no-repeat; margin: 0 auto; cursor: pointer; position: relative; }
    .webuploader-element-invisible { position: absolute !important; clip: rect(1px 1px 1px 1px); /* IE6, IE7 */ clip: rect(1px,1px,1px,1px); }
    .webuploader-pick { position: relative; display: inline-block; cursor: pointer; width: 286px; height: 186px; color: #fff; text-align: center; border-radius: 3px; overflow: hidden; }
    #divFileProgressContainer { position: relative; }
    .webuploader-pick-disable { opacity: 0.6; pointer-events: none; }
    .progressName { font-size: 14px; margin: 10px 0px; }
    .progressName a { float: right; border: 1px solid #ff7a19; padding: 4px 10px; border-radius: 4px; font-size: 12px; }
    .cancle { position: absolute; right: 0; width: 70px; height: 26px; border: 1px solid #ff7a19; color: #ff7a19; border-radius: 5px; line-height: 26px; text-align: center; }
    .progressBarInProgress { height: 100%; display: block; background: #ff7a19; border-radius: 3px; }
    .jindu { height: 23px; padding: 3px; border: 1px solid #D3D3D3; border-radius: 4px; margin-top: 20px; margin-bottom: 8px; }
    .progressBarStatus ul li { float: left; width: 25%; text-align: center; }
    .progressBarStatus ul li.first { text-align: left; }
    .progressBarStatus ul li.last { text-align: right; }

    .progress {
        height: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        float: left;
        width: 0;
        height: 100%;
        font-size: 12px;
        line-height: 20px;
        color: #ffffff;
        text-align: center;
        background-color: #428bca;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        -webkit-transition: width 0.6s ease;
        transition: width 0.6s ease;
    }

    .progress-striped .progress-bar {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-size: 40px 40px;
    }

    .progress.active .progress-bar {
        -webkit-animation: progress-bar-stripes 2s linear infinite;
        animation: progress-bar-stripes 2s linear infinite;
    }

    .progress-bar-success {
        background-color: #5cb85c;
    }

    .progress-striped .progress-bar-success {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }

    .progress-bar-info {
        background-color: #5bc0de;
    }

    .progress-striped .progress-bar-info {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }

    .progress-bar-warning {
        background-color: #f0ad4e;
    }

    .progress-striped .progress-bar-warning {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }

    .progress-bar-danger {
        background-color: #d9534f;
    }

    .progress-striped .progress-bar-danger {
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparepent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }

</style>
<script src="/pepsifile/js/jquery-1.11.2.min.js?{VERSH}"></script>
<script type="text/javascript" src="/pepsifile/js/spark-md5.js"></script>
{{--<link type="text/css" href="/pepsifile/bootstrap.css" rel="stylesheet">--}}
{{--<script type="text/javascript" src="/pepsifile/bootstrap.min.js"></script>--}}
<script language="javascript">
    function Request(argname){
        var url = document.location.href;
        var arrStr = url.substring(url.indexOf("?")+1).split("&");
        //return arrStr;
        for(var i =0;i<arrStr.length;i++) {
            var loc = arrStr[i].indexOf(argname+"=");
            if(loc!=-1){
                return arrStr[i].replace(argname+"=","").replace("?","");
                break;
            }
        }
        return "";
    }

    ssss=Request("abc");

    var ServerUrl = ssss+"/uploads/";

    $(document).ready(function(){
        //$('[data-toggle="tooltip"]').tooltip()
        var hostname = window.location.hostname
        var port = window.location.port || '80';
        ServerUrl = ssss+"/uploads";
    })
</script>

<div class="gerenzhongxin mt10 yh">
    <div class="uploadmain">
        <div class="shangchuan_biaodan" id="chose0">
            <div id="chosevideo" class="webuploader-container">
                <div style="opacity: 0;">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputFile"></label>
                            <input type="file" id="file" style="width: 100%;height: 100%;">
                        </div>

                    </form>
                </div>
            </div>
            <div class="webupload-info" style="display: none;">
                <p><span class="help-name"></span>
                    <span style="float: right;">
                        <button name="start" type="button" class="btn btn-success" disabled>开始上传</button>
                        <button name="cancel" type="button" class="btn btn-default">取消上传</button>
                    </span>
                </p>
                <div class="progress progress-striped hide">
                    <div class="progress-bar" style="width: 0%">
                        <span class="sr-only"></span>
                    </div>
                </div>
                <p style="margin: 5px 0;"><span class="help-file"></span> <span class="help-percentage"></span></p>
            </div>


            <!--<button name="start" type="button" class="btn btn-success" disabled>开始上传</button>-->
            <!--<button name="pause" type="button" class="btn btn-default hide">暂停</button>-->
            <!--<div id="divFileProgressContainer"></div>-->


        </div>
    </div>
</div>
<div>
    <div style="font-weight: bold;"> <br>
        视频地址：<input type="text" size="52" value="" id="odownpath1" name="odownpath1" style="width: 384px;">
        &nbsp;<a href="javascript:;" onclick="do_inster();">插入</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="do_load();">重新上传</a></div>
</div>
<div style="line-height:8px;color: #bc1524;font-family: '微软雅黑', sans-serif;margin-top: 20px;">
<h3 style="font-size: 18px;">视频上传操作流程 </h3>
<p style="font-size: 14px;">1、点击上传视频按钮，选择本地您要上传的视频；</p>
<p style="font-size: 14px;">2、视频上传完成后，点击立即插入，视频链接即可自动添加到主题内；</p>
<p style="font-size: 14px;">3、完成主题相关内容填写后，点击发帖栏左下角发表帖子，即可完成发布；</p>
<p style="font-size: 14px;">4、插入视频时请勿勾选纯文本模式</p>
</div>
</div>
<script type="text/javascript">
    function do_inster(){
        var viedoe=$("#odownpath1").val();
        viedoe = viedoe.replace('//','///');
        viedoe = viedoe.replace(/\/\//g,'/');//除去多的斜杠。。

        if(viedoe){
            var editor=$("#e_iframe",parent.document.body);
            editor.contents().find("body").append('[ckplayer='+viedoe+']'+viedoe+'[/ckplayer]');
            $("#odownpath1").attr("value","");

        }else{
            alert('请先上传视频');
        }

    }

    function do_load(){
        window.location.reload();
    }
</script>
<script>
    ~function($){
        var file,fileMd5;
        // 每次上传文件的一段，单位：字节
        // 推荐使用文本文件进行演示
        var preUploadSize = 1024 * 10;
        // 文件的起始上传位置
        var start = 0;
        // 上传暂停
        var pause,cancel = false;



        $('#file').change(function() {
            let files = this.files;
            file = files[0];
            $('.webupload-info').css('display','block');
            $('.help-name').text(file.name);
            $('.help-file').text(Math.round(file.size/1024/1024*100)/100+'M');
            $('button[name=start]').prop('disabled', false);
            let fileReader = new FileReader();
            let blobSlice = File.prototype.mozSlice || File.prototype.webkitSlice || File.prototype.slice;
            var chunkSize = 1048576, chunks = Math.ceil(file.size / chunkSize), currentChunk = 0;
            var filemd5 = new SparkMD5();

            fileReader.onload = function(e) {
                // console.log("read chunk nr", currentChunk + 1, "of", chunks);
                filemd5.appendBinary(e.target.result);
                // append binary string
                currentChunk++;

                if (currentChunk < chunks) {
                    loadNext();
                } else {
                    console.log("finished loading");
                    // box.innerText = 'MD5 hash:' + filemd5.end();
                    fileMd5 = filemd5.end();
                    console.info("computed hash", filemd5.end());
                    // compute hash
                }
            };
            function loadNext() {
                let start = currentChunk * chunkSize, end = start + chunkSize >= file.size ? file.size : start + chunkSize;

                fileReader.readAsBinaryString(blobSlice.call(file, start, end));
            }

            loadNext();
        });

        // $(document).on('click', 'button[name=start]', function(){
        //     var url = '/source/plugin/pepsifile/filesize.php?/static=' + encodeURIComponent(file.name);
        //     $.get(url, function(json) {
        //         //console.log(data)
        //         start = json.data[file.name.replace(/\.\w+$/, '')]
        //         console.log(['start', start]);
        //
        //         if ( start < file.size ) {
        //             showprogress(start, file.size);
        //             upload(file);
        //         } else {
        //             console.log('上传结束')
        //             $('button[name=pause], .progress').addClass('hide');
        //         }
        //     }, 'json')
        //
        //     $('button[name=pause], .progress').removeClass('hide')
        // })
        $(document).on('click', 'button[name=start]', function(){
            let url = 'http://10.2.117.45:8989/upload';
            let fileType = file.name.split('.');


            $.ajax({
                url:url,
                type: 'post',
                crossDomain: true,
                dataType: 'json',
                headers: {'Access-Control-Allow-Origin':'*','ver':'1.0','fileType':fileType[1],'fileMd5':fileMd5,'tranType':'cmd','offset':0,'fileSize':file.size},
                // beforeSend:function(xhr){
                //     xhr.setRequestHeader('ver','1.0');
                //     xhr.setRequestHeader('fileType',fileType[1]);
                //     xhr.setRequestHeader('fileMd5',fileMd5);
                //     xhr.setRequestHeader('tranType','cmd');
                //     xhr.setRequestHeader('offset',0);
                //     xhr.setRequestHeader('fileSize',file.size);
                // },
                success:function (data) {
                    console.log('success',data);
                },
                error:function(data){
                    console.log('error',data);
                }
            });
            $.get(url, function(json) {
                //console.log(data)
                start = json.data[file.name.replace(/\.\w+$/, '')]
                console.log(['start', start]);

                if ( start < file.size ) {
                    showprogress(start, file.size);
                    upload(file);
                } else {
                    console.log('上传结束')
                    $('button[name=pause], .progress').addClass('hide');
                }
            }, 'json')

            $('button[name=pause], .progress').removeClass('hide')
        })
        $(document).on('click', 'button[name=pause]', function() {
            var o = $(this)
            if ( pause ) {
                o.text('暂停')
                upload(file)
            } else {
                o.text('继续')
            }
            pause = !pause
        })

        function upload(file) {
            var data = new FormData()
            data.append("name", encodeURIComponent(file.name))
            data.append("file", file.slice(start, start + preUploadSize))
            data.append("start", start);

            $.ajax({
                type: 'POST',
                url: '/source/plugin/pepsifile/upload.php',
                //  url: 'http://47.254.197.143:9507',
                data: data,

                // 设置 false 以使用文件上传的 Content-Type
                // 如 Content-Type:multipart/form-data; boundary=----WebKitFormBoundarykdtBZ0dnFQOWcXu3
                contentType: false,

                // 避开jQuery对 data 对象的默认处理
                processData: false,

                // 设置 xhr 对象，增加 onprogress 事件
                xhr: function() {
                    var xhr = $.ajaxSettings.xhr();
                    xhr.upload.onprogress = function(e) {
                        showprogress(start + e.loaded, file.size)
                    }
                    return xhr;
                }

            }).then(function() {
                start += preUploadSize;

                if (start < file.size) {
                    // 进行下一段上传
                    /*
                      if (!pause) {
                          // 为了演示，每次延时3秒钟
                          setTimeout(function(){upload(file)}, 3000)
                      }
                      */
                    upload(file)
                } else {
                    $('button[name=pause], .progress-bar').addClass('hide')
                    console.log('上传结束');
                }
            }, function() {
                console.log('上传错误');
            })
        }

        function showprogress(start, filesize) {
            $('.progress-bar').width(start/filesize * 100 + '%');
            $('.help-percentage').text(Math.round(start/filesize * 100) + '%');
        }
    }(jQuery)
</script>