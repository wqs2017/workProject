/**
 * Created by wqs on 16/9/6.
 */
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
document.addEventListener("touchmove",function(e){
    if(vidoeoStep == true){
        e.preventDefault();
        e.stopPropagation();
    }
},false);

shareplay.onclick = function(){
    vidoeoStep = !vidoeoStep;
    if(vidoeoStep){
        shareplay.style.display = 'none';
        sharevideo.style.display = 'block';
        sharevideo.play();
        loading.style.background = 'url("http://ococuf45i.bkt.clouddn.com/loadingbg.png") left top no-repeat';
        loading.style.backgroundSize = '100% 100%';
        var videotimer = setTimeout(function () {
            videoCover.style.display = 'block';
            videoCover.style.opacity = '1';
        },1800);

        $('#video_loading').css('display','block');
        loading.style.display = 'block';
        loading.style.opacity = '1';
        $('#loading_text').css('display','block');
        $.ajax({
            url:'http://app.mumov.com/v1/html5/share',
            type:'POST',
            data:userData
        }).then(function (data) {
            $('.video_headName').html(data.data.live[0].nickname);
            $('#head_num').html(data.data.live[0].audience);
            $('#head_muId').html(data.data.live[0].user_id);
            $('.video_pic').attr('src',data.data.live[0].header);
            $('.share_video').attr('src',data.data.live[0].hls);
        })
    }else{
        sharevideo.pause();
    }
};

var Hei = $('body').css('height');
$('.all_pic').css('height',Hei);
window.onload = function () {

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
            loading.style.opacity = 0;
        },1200);
        var timerLoadingBg = setTimeout(function () {
            loading.style.background = 'url("http://ococuf45i.bkt.clouddn.com/gradualbg.png") left top no-repeat';
            loading.style.backgroundSize = '100% 100%';
            $('#video_loading').attr('src','http://ococuf45i.bkt.clouddn.com/whiteLogo.png');
        },2200);
        var timerBlock = setTimeout(function () {
            loading.style.display = 'none';
            $('.loading_logo').css('display','none');
        },2200)
    });
    setTimeout(function(){
        var Hei = $('body').css('height');
        $('.all_cover').css('height',Hei);
        $('.all_picBg').css('height',Hei);
        $('.all_picBg2').css('height',Hei);
    },500)
};

//     recommend play 热门推荐播放 --------------------------------------
$(document).on("click", ".share_play", function(){
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
    })
});
$(document).on("click", ".main_threeUl>li", function(){

    var $listIndex = $(this).index()-1;
    var userData = {
        user_id: $(this).attr('user_id')
    };
    $.ajax({
        url:'http://app.mumov.com/v1/html5/share',
        type:'POST',
        data:userData
    }).then(function (data) {
        var data = eval('('+data+')');
        $('.share_video').attr('src',data.data.rooms[$listIndex].hls);
        //                展示信息 ----------------------------------
        $('.video_headName').html(data.data.rooms[$listIndex].nickname);
        $('#head_num').html(data.data.rooms[$listIndex].audience);
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
            },1800);

            $('#video_loading').css('display','block');
            loading.style.background = 'url("http://ococuf45i.bkt.clouddn.com/loadingbg.png") left top no-repeat';
            loading.style.backgroundSize = '100% 100%';
            loading.style.display = 'block';
            loading.style.opacity = '1';
            $('#loading_text').css('display','block');
        }else{
            sharevideo.pause();
        }
    })
});

//  back body & stop playVideo 结束直播 ----------------------------------

$('#video_back').click(function () {

    vidoeoStep = !vidoeoStep;
    shareplay.style.display = 'block';
    $('#video_cover').css('display','none');// video display
    $('#video_loading').css('display','none');//loading logo display
    sharevideo.pause();
    loading.style.display = 'none';
    loading.style.opacity = '1';
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

$('body').click(function () {
    return
})