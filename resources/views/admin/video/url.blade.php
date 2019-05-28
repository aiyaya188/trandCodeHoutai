<div id="video" style="width: 800px; height: 550px;"></div>
<script type="text/javascript" src="/ckplayer2/ckplayer.js"></script>
<input type="hidden" id="url" value="{{$url['url_']}}">
<script type="text/javascript">
    var url = document.getElementById("url");
     var value=url.value;
    var videoObject = {
        container: '#video', //容器的ID或className
        variable: 'player',
        debug:true,//开启调试模式
        flashplayer: true, //是否需要强制使用flashplayer
        video: value,

    };
    var player = new ckplayer(videoObject);
</script>

