<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        document.title = 'MU直播的分享';
        //     hash值得获取 调用数据 ------------------------------------------
        var hash=(!window.location.hash)?"#search":window.location.hash;
        window.location.hash=hash;
        var data = parseInt(hash.slice(1));
        var req =  new XMLHttpRequest();
        var userId = {
            user_id: data
        };
        if(req){
            req.open("POST", "http://app.mumov.com/v1/html5/share", true);
            req.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=gbk;");
            req.send('user_id='+data+'');
            req.onreadystatechange = function(){
                if(req.readyState == 4){
                    if(req.status == 200){
                        var data = req.responseText;
                        var data = eval('(' + data + ')');
                        document.title = data.data.live[0].nickname+' 的MU直播分享';
                    }else{
                        console.log("error");
                    }
                }
            }
        }
    </script>
    <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <meta name="Keywords" content="MU直播,MUMOV,mumov,直播,手机直播,美女直播,帅哥,最热,最新,现场,才艺,生活">
    <meta name="Description" content="MU MOV">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <style>
        /*-------------------- loading ---------------------------*/

        .loading_box{
            width: 100%;
            height: 3666px;
            position: fixed;
            z-index: 5;
            left: 0;
            top: 0;
            background: #fff;
            opacity: 1;
            /*transition: opacity 0.3s;*/
        }
        .loading_logo{
            width: 0.7rem;
            height: 0.7rem;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -0.35rem 0 0 -0.35rem;
            animation: bounce 1.2s 0s ease-in infinite alternate;
        }
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% {
                -webkit-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                -webkit-transform: translate3d(0,0,0);
                transform: translate3d(0,0,0);
            }

            40%, 43% {
                -webkit-transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
                transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
                -webkit-transform: translate3d(0, -30px, 0);
                transform: translate3d(0, -30px, 0);
            }

            70% {
                -webkit-transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
                transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
                -webkit-transform: translate3d(0, -15px, 0);
                transform: translate3d(0, -15px, 0);
            }

            90% {
                -webkit-transform: translate3d(0,-4px,0);
                transform: translate3d(0,-4px,0);
            }
        }
        /*---------------------- video loading -------------------------*/
        #video_loading{
            position: fixed;
            left: 50%;
            top: 50%;
            margin: -0.575rem 0 0 -0.35rem;
            z-index: 5;
            display: none;
        }
        #loading_text{
            color: #fff;
            font-size: 0.14rem;
            position: fixed;
            left: 50%;
            top: 50%;
            margin: 0 0 0 -0.35rem;
            z-index: 5;
            display: none;
            font-weight: bolder;
        }
    </style>
</head>
<body unselectable="none" style="-moz-user-select:none;-webkit-user-select:none;" onselectstart="return true;" id="body">

<!----------------------------- cover ------------------------------------>

<div class="loading_box">
    <img src="http://ococuf45i.bkt.clouddn.com/loading_logo.png" alt="" class="loading_logo">
</div>

{{--<img src="http://ococuf45i.bkt.clouddn.com/loading_logo.png" id="video_loading" alt="" class="loading_logo">--}}
<p id="loading_text">艺人准备中</p>

<!----------------------------- cover ------------------------------------>
<div class="all_picBg2" style="z-index: -2"></div>

<div class="all_picBg"></div>

<div class="all_cover"></div>

<!----------------------------- video ------------------------------------>

<div id="video_cover">

    <div class="video_headPic">

        <img src="http://ococuf45i.bkt.clouddn.com/logo.png" alt="" class="video_pic">
        <div class="video_NameDiv">

                <span class="video_headName">
                wqs
                </span>

            <span class="video_headNum" id="video_headNum">
                    <span id="head_num">977</span>
            </span>
        </div>

        <div class="video_attention">
            关注
        </div>
    </div>

    <div class="video_headId">
        MU账号: <span id="head_muId">977777</span>
    </div>

    <div id="video_back">
        <img src="http://ococuf45i.bkt.clouddn.com/MU_close.png" alt="">
    </div>

    <div class="tool-bar-open"><i class="hj-logo"></i><span>打开MU直播</span></div>

    <video class="share_video" src="http://ob22ldpz3.bkt.clouddn.com/WeChatSight11.mp4" webkit-playsinline="true" x-webkit-airplay="true" width="100%" preload="auto" poster="" style="height:100%;top:--0.33333333333337123;"></video>

</div>

<header id="head">

    <div class="share_play">
        <img src="http://ococuf45i.bkt.clouddn.com/pic-mengban.png" alt="" class="head_cover">
        <img src="http://ococuf45i.bkt.clouddn.com/bofang.png" alt="播放" class="head_playLogo">
    </div>

    <div class="stop_video">
        <p class="stop_firstText">直播结束</p>
        <p class="stop_secondText">观看人数 <br/><b id="watch_number">12</b></p>
        <p class="stop_threeText">直播时长<br/><b id="play_time">01 : 28</b></p>
    </div>

</header>
<!--------------------------- header over ------------------------------->
<section id="main">

    <div class="main_frist">
        <div class="frist_cover"></div>
        <p id="room_name">MU 直播间 (<b id="room_id"></b>)</p>
        <p id="room_type">创作型歌手</p>
        <p id="room_other">来支持我吧,我在MU直播等你哦。</p>
    </div>

    <div class="border_Y"></div>
    <div class="main_second">
        <a style="width: 100%;height: 100%;display: block;z-index:10;position: absolute;left: 0;top: 0;" href="https://itunes.apple.com/cn/app/id1145852089"> </a>
        <div class="second_cover"></div>
        <div class="main_secondLeft"></div>
        <div class="main_secondCenter">
            <p>MU MOV</p>
            <P class="install_text">安装MU直播,看更多精彩内容。</P>
        </div>
        <div class="main_secondRight">

        </div>
    </div>
    <div class="border_Y"></div>

    <div class="main_three">
        <div class="three_cover"></div>
        <div class="main_threeTitle">MU 热门</div>
        <ul class="main_threeUl">
            <li style="background: url(http://ococuf45i.bkt.clouddn.com/dog.jpeg) left top no-repeat;background-size: 100% 100%">
                <img src="http://ococuf45i.bkt.clouddn.com/pic-mengbanxiao.png" alt="" class="recommend_cover">
                <div class="recommend_number">
                    <span>1666</span>
                </div>
                <div class="recommend_text">
                    <p class="recommend_roomname">帅得烦躁</p>
                    <p class="recommend_type">偶像派歌手</p>
                </div>
            </li>
        </ul>
    </div>

    <div class="recommend_four">
        <div class="four_cover"></div>
        <div class="recommend_fourLogo">
            <img src="http://ococuf45i.bkt.clouddn.com/new_logo.png" alt="" class="white_logo">
            <p>MU MOV</p>
        </div>
        <div class="wechat_logo">
            <img src="http://ococuf45i.bkt.clouddn.com/wechatLogo.jpg" alt="" class="wechat_logoPic">
        </div>
        <p class="wechat_imgText">长按二维码关注 MU微信公众号</p>
        <p class="index_url">www.mumov.com</p>
    </div>

</section>

<!---------------------------- main over ---------------------------------->

<footer id="footer">
    <a style="width: 100%;height: 100%;display: block" href="https://itunes.apple.com/cn/app/id1145852089"> </a>
</footer>

<!---------------------------- footer over --------------------------------->

</body>

<link rel="stylesheet" href="http://odcgcj1qv.bkt.clouddn.com/share.css">
<script src="../../assets/js/jquery-1.12.1.min.js"></script>
<script>
    $('#footer').click(function () {
        window.location.href = 'http://mumov.com'
    });
    $('.main_second').click(function () {
        window.location.href = 'http://mumov.com'
    });
    !function(a){var b={},c={};c.attachEvent=function(b,c,d){return"addEventListener"in a?b.addEventListener(c,d,!1):void 0},c.fireFakeEvent=function(a,b){return document.createEvent?a.target.dispatchEvent(c.createEvent(b)):void 0},c.createEvent=function(b){if(document.createEvent){var c=a.document.createEvent("HTMLEvents");return c.initEvent(b,!0,!0),c.eventName=b,c}},c.getRealEvent=function(a){return a.originalEvent&&a.originalEvent.touches&&a.originalEvent.touches.length?a.originalEvent.touches[0]:a.touches&&a.touches.length?a.touches[0]:a};var d=[{test:("propertyIsEnumerable"in a||"hasOwnProperty"in document)&&(a.propertyIsEnumerable("ontouchstart")||document.hasOwnProperty("ontouchstart")||a.hasOwnProperty("ontouchstart")),events:{start:"touchstart",move:"touchmove",end:"touchend"}},{test:a.navigator.msPointerEnabled,events:{start:"MSPointerDown",move:"MSPointerMove",end:"MSPointerUp"}},{test:a.navigator.pointerEnabled,events:{start:"pointerdown",move:"pointermove",end:"pointerup"}}];b.options={eventName:"tap",fingerMaxOffset:11};var e,f,g,h,i={};e=function(a){return c.attachEvent(document.documentElement,h[a],g[a])},g={start:function(a){a=c.getRealEvent(a),i.start=[a.pageX,a.pageY],i.offset=[0,0]},move:function(a){return i.start||i.move?(a=c.getRealEvent(a),i.move=[a.pageX,a.pageY],void(i.offset=[Math.abs(i.move[0]-i.start[0]),Math.abs(i.move[1]-i.start[1])])):!1},end:function(d){if(d=c.getRealEvent(d),i.offset[0]<b.options.fingerMaxOffset&&i.offset[1]<b.options.fingerMaxOffset&&!c.fireFakeEvent(d,b.options.eventName)){if(a.navigator.msPointerEnabled||a.navigator.pointerEnabled){var e=function(a){a.preventDefault(),d.target.removeEventListener("click",e)};d.target.addEventListener("click",e,!1)}d.preventDefault()}i={}},click:function(a){return c.fireFakeEvent(a,b.options.eventName)?void 0:a.preventDefault()}},f=function(){for(var a=0;a<d.length;a++)if(d[a].test){h=d[a].events,e("start"),e("move"),e("end");break}return c.attachEvent(document.documentElement,"click",g.click)},c.attachEvent(a,"load",f),"function"==typeof define&&define.amd?define(function(){return f(),b}):a.Tap=b}(window);
    var screenWid = document.documentElement.offsetWidth||document.body.offsetWidth;
    var nowWid = (screenWid/370)*100;
    var oHtml = document.getElementsByTagName("html")[0];
    oHtml.style.fontSize = nowWid+"px";
    var o = document.getElementsByClassName('white_logo');
    var body = document.getElementsByTagName('body')[0];
    var allCover = document.getElementsByClassName('all_pic')[0];

    //  video play -----------------------------------------------------

    var vidoeoStep = false;
    var sharevideo = document.getElementsByClassName('share_video')[0];
    var shareplay = document.getElementsByClassName('share_play')[0];
    var videoCover = document.getElementById('video_cover');
    //  可视窗口高度 -----------------------------------------------------
    var client_hei = document.documentElement?document.documentElement.clientHeight:document.body.clientHeight;
    var loading = document.getElementsByClassName('loading_box')[0];
    loading.style.height = (client_hei+1)+'px';

    //  live play -------------------------------------------------------

    //                  阻止屏幕滑动
    //    document.addEventListener("touchmove",function(e){
    //        if(vidoeoStep == true){
    //            e.preventDefault();
    //            e.stopPropagation();
    //        }
    //    },false);

    shareplay.onclick = function(){
        videoCover.ontouchmove = function () {
            return false
        };
        loading.style.display = 'block';
//        loading.style.opacity = '1';
//        $('#video_loading').css('display','block');
        $('#loading_text').css('display','block');
//        $('#video_loading').css('animation','bounce 1.2s 0s ease-in infinite alternate');
        $.ajax({
            url:'http://app.mumov.com/v1/html5/share',
            type:'POST',
            data:userId
        }).then(function (data) {
            var data = eval('('+data+')');
            $('.video_headName').html(data.data.live[0].nickname);
            $('#head_num').html(data.data.live[0].audience);
            $('#head_muId').html(data.data.live[0].user_id);
            $('.video_pic').attr('src',data.data.live[0].header);
            $('.share_video').attr('src',data.data.live[0].hls);
            vidoeoStep = !vidoeoStep;
            if(vidoeoStep){
                sharevideo.play();
                shareplay.style.display = 'none';
                sharevideo.style.display = 'block';
                loading.style.background = 'url("http://ococuf45i.bkt.clouddn.com/loadingbg.png") left top no-repeat';
                loading.style.backgroundSize = '100% 100%';
                var videotimer = setTimeout(function () {
                    videoCover.style.display = 'block';
                    videoCover.style.opacity = '1';
                },1900);
                $('#video_loading').css('animation','bounce 1.2s ease-in infinite alternate');
                $('#video_loading').css('display','block');
                loading.style.display = 'block';
                loading.style.opacity = '1';
                $('#loading_text').css('display','block');
            }else{
                sharevideo.pause();
            }
        })
    };

    var Hei = $('body').css('height');
    $('.all_pic').css('height',Hei);

        $.ajax({
            url:'http://app.mumov.com/v1/html5/share',
            type:'POST',
            data:userId
        }).then(function (data) {
            var data = eval('('+data+')');

//        播放时的信息展示 --------------------------------------------

            $('.video_headName').html(data.data.live[0].nickname);
            $('#head_num').html(data.data.live[0].audience);
            $('#head_muId').html(data.data.live[0].user_id);
            $('.video_pic').attr('src',data.data.live[0].header);
            if(window.screen.width>=414){
                $('.all_picBg').css({
                    'background': 'url('+data.data.live[0].header+'?imageMogr2/blur/50x500) left top no-repeat',
                    'background-size': '100% 100%',
                    '-webkit-filter': 'blur(45px)',
                    '-moz-filter':'blur(45px)',
                    '-ms-filter':'blur(45px)',
                    'filter':'blur(45px)'
                });
            }else if(window.devicePixelRatio == 3){
                $('.all_picBg').css({
                    'background': 'url('+data.data.live[0].header+'?imageMogr2/blur/50x500) left top no-repeat',
                    'background-size': '100% 100%',
                    '-webkit-filter': 'blur(45px)',
                    '-moz-filter':'blur(45px)',
                    '-ms-filter':'blur(45px)',
                    'filter':'blur(45px)'
                });
            }else{
                $('.all_picBg').css({
//                    'background': 'url('+data.data.live[0].header+'?imageMogr2/blur/50x500) left top no-repeat',
                    'background': 'url('+data.data.live[0].header+'#977) left top no-repeat',
                    'background-size': '100% 100%',
                    '-webkit-filter': 'blur(55px)',
                    '-moz-filter':'blur(55px)',
                    '-ms-filter':'blur(55px)',
                    'filter':'blur(55px)'
                });
            }

            $('.all_picBg2').css({
                'background': 'url('+data.data.live[0].header+'#977) left top no-repeat',
                'background-size': '100% 100%',
                '-webkit-filter': 'blur(55px)',
                '-moz-filter':'blur(55px)',
                '-ms-filter':'blur(55px)',
                'filter':'blur(55px)'
            });

//        判断主播播放状态 --------------------------------------------

            if(data.data.live[0].is_live == 1){
//                房间名字及其他信息
                $('#room_name').html(data.data.live[0].nickname);
                $('#room_type').html(data.data.live[0].verify_info);
//            $('#room_other').html(data.data.live[0].title);
                $('#room_id').html(data.data.live[0].user_id);

                $('.share_play').css({
                    'background': 'url('+data.data.live[0].header+') left top no-repeat',
                    'background-size': '100% 100%'
                });

                $('.share_video').attr('src',data.data.live[0].hls);
//              播放时默认loading background

            }else{
                $('#watch_number').html(data.data.live[0].audience);
//                time 转换
                var all_s = data.data.live[0].time;
                var play_min = Math.floor(all_s/60);
                var play_s = all_s%60;
                if(play_min <= 9){
                    play_min = '0'+play_min;
                };
                if(play_s <= 9){
                    play_s = '0' + play_s;
                };
                $('#play_time').html(play_min+':'+play_s);

//                $('#play_time').html(data.data.live[0].)
//              主播未在播放时
                $('.head_playLogo').css('display','none');
                $('.head_cover').attr('src','http://ococuf45i.bkt.clouddn.com/tingzhipic-mengban.png');
                $('.stop_video').css('display','block');
                $('.share_play').css({
                    'background': 'url('+data.data.live[0].header+') left top no-repeat',
                    'background-size': '100% 100%'
                });

                $('#room_name').html(data.data.live[0].nickname);
                $('#room_type').html(data.data.live[0].verify_info);
//            $('#room_other').html(data.data.live[0].title);
                $('#room_id').html(data.data.live[0].user_id);

            };
            for(var i=0 ; i < data.data.rooms.length ; i++){
                $('.main_threeUl').append('<li user_id="'+data.data.rooms[i].user_id+'" style="background: url('+data.data.rooms[i].header+') left top no-repeat;background-size: 100% 100%;"><img src="http://ococuf45i.bkt.clouddn.com/pic-mengbanxiao.png" alt="" class="recommend_cover"> <div class="recommend_number"> <span>'+data.data.rooms[i].audience+'</span> </div> <div class="recommend_text"> <p class="recommend_roomname">'+data.data.rooms[i].nickname+'</p> <p class="recommend_type">'+data.data.rooms[i].verify_info+'</p> </div> </li>')
            }
//          loading 消失 -----------------------------------------------
            var timerOpacity = setTimeout(function () {
//                loading.style.opacity = 0;
            },1200);
            var timerLoadingBg = setTimeout(function () {
                loading.style.background = 'url("http://ococuf45i.bkt.clouddn.com/loadingbg.png") left top no-repeat';
                loading.style.backgroundSize = '100% 100%';

                $('.loading_logo').attr({
                    'src':'http://ococuf45i.bkt.clouddn.com/whiteLogo.png'
                });
                $('.loading_logo').css({
                    'left':'50%',
                    'top':'50%',
                    'margin':'-0.575rem 0 0 -0.35rem'
                });
                loading.style.display = 'none';
            },800);
        });
        setTimeout(function(){
            var Hei = $('body').css('height');
            $('.all_cover').css('height',Hei);
            $('.all_picBg').css('height',Hei);
            $('.all_picBg2').css('height',Hei);
        },500)

    //     recommend play 热门推荐播放 --------------------------------------

    $(document).on("tap",".main_threeUl>li", function(){

//        阻止滑动 -------------------------------
        videoCover.ontouchmove = function () {
            return false
        };
        loading.style.display = 'block';
//        loading.style.opacity = '1';
        $('#video_loading').css('display','block');
        $('#loading_text').css('display','block');
//        $('#video_loading').css('animation','bounce 1.2s 0s ease-in infinite alternate');
//        loading.style.background = 'url("http://ococuf45i.bkt.clouddn.com/loadingbg.png") left top no-repeat';
//        loading.style.backgroundSize = '100% 100%';


        var $listIndex = $(this).index()-1;
        if($listIndex == -1){
            $listIndex = 0;
        }
        var userData = {
            user_id: $(this).attr('user_id')
        };
        var timerajax = setTimeout(function () {
            $.ajax({
                url:'http://app.mumov.com/v1/html5/share',
                type:'POST',
                data:userData
            }).then(function (data) {
                var data = eval('('+data+')');
                $('.share_video').attr('src',data.data.rooms[$listIndex].hls);
                //                展示信息 ----------------------------------
                $('.video_headName').html(data.data.rooms[$listIndex].nickname);
                $('#head_num').html(data.data.rooms[$listIndex].audience+'人');
                $('#head_muId').html(data.data.rooms[$listIndex].user_id);
                $('.video_pic').attr('src',data.data.rooms[$listIndex].header);

                vidoeoStep = !vidoeoStep;
                if(vidoeoStep){
//              list点击播放
                    shareplay.style.display = 'none';
                    sharevideo.style.display = 'block';
                    sharevideo.play();
//              sharevideo.webkitRequestFullScreen();

                    var videotimer = setTimeout(function () {
                        videoCover.style.display = 'block';
                        videoCover.style.opacity = '1';
                    },2000);
//
                }else{
                    sharevideo.pause();
                }
            })
        },100)
        });



    //  back body & stop playVideo 结束直播 ----------------------------------

    $('#video_back').click(function () {

        vidoeoStep = !vidoeoStep;
        shareplay.style.display = 'block';
        $('#video_cover').css('display','none');// video display
        $('#video_loading').css('display','none');//loading logo display
        sharevideo.pause();
        loading.style.display = 'none';
//        loading.style.opacity = '0';
        $('#loading_text').css('display','none');
    });
    //  wechat Pic 二维码 ----------------------------------------------------
    var wechatlogo = document.getElementsByClassName('.wechat_logo')[0];

    //  href mumov 跳转mu -----------------------------------------------------
    $('.index_url').click(function () {
        window.location.href ='http://www.mumov.com';
    });


    $('.video_attention').click(function () {
        alert('前往www.mumov.com.com下载APP');
    });
</script>
</html>