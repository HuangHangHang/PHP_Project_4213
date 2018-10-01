<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base target="_blank" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="/tp02/Public/css/flexslider.css" rel="stylesheet" type="text/css"  />
    <link href="/tp02/Public/css/reset-common927.css" rel="stylesheet" />
    <link href="/tp02/Public/css/sug.css" rel="stylesheet" />
    <link href="/tp02/Public/css/text_common-content_mouseoverout0927.css" rel="stylesheet" />
    <link href="/tp02/Public/css/extra.css" rel="stylesheet" />
    <link href="/tp02/Public/css/index.css" rel="stylesheet">

    <script type="text/javascript" src="/tp02/Public/js/jquery-2.1.1.min.js"></script>
    <title>4213网址之家</title>
</head>

<head>
    <style>
        input::-webkit-input-placeholder{
            color: #26d7d9;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="box-userbar">
    <div class="box">
        <div class="ft-l box-date">
            <span id="localtime"></span>
            <script>
                function showLocale(objD)
                {
                    var str,colorhead,colorfoot;
                    var yy = objD.getYear();
                    if(yy<1900) yy = yy+1900;
                    var MM = objD.getMonth()+1;
                    if(MM<10) MM = '0' + MM;
                    var dd = objD.getDate();
                    if(dd<10) dd = '0' + dd;
                    var hh = objD.getHours();
                    if(hh<10) hh = '0' + hh;
                    var mm = objD.getMinutes();
                    if(mm<10) mm = '0' + mm;
                    var ss = objD.getSeconds();
                    if(ss<10) ss = '0' + ss;
                    var ww = objD.getDay();
                    if  ( ww==0 )  colorhead="<font color=\"#FF0000\">";
                    if  ( ww > 0 && ww < 6 )  colorhead="<font color=\"#666\">";
                    if  ( ww==6 )  colorhead="<font color=\"#008000\">";
                    if  (ww==0)  ww="星期日";
                    if  (ww==1)  ww="星期一";
                    if  (ww==2)  ww="星期二";
                    if  (ww==3)  ww="星期三";
                    if  (ww==4)  ww="星期四";
                    if  (ww==5)  ww="星期五";
                    if  (ww==6)  ww="星期六";
                    colorfoot="</font>";
                    str = colorhead + yy + "年-" + MM + "月-" + dd + "日 " + ww + "  "+ hh + ":" + mm + ":" + ss;
                    return(str);
                }
                function tick()
                {
                    var today;
                    today = new Date();
                    document.getElementById("localtime").innerHTML = showLocale(today);
                    window.setTimeout("tick()", 1000);
                }
                tick();
            </script>
        </div>
        <div class="ft-r span-rows box-userbar_link">
            <span><a href="http://study.mingrisoft.com">联系我们</a></span>
            <b class="space"></b>
            <span><a href="http://study.mingrisoft.com">意见建议</a></span>
        </div>
    </div>
</div>
<div class="box l-header" monkey="header" style="padding-bottom: 20px">
    <div class="ft-l l-header_l">
        <span class="box-logo"><a id="indexLogo" href="<?php echo U('Index/index');?>" title="点击进入首页"><img src="/tp02/Public/images/iilogo.png" width="210" height="91"></a></span>
    </div>
    <div class="l-header_m">
        <div class="ft-l box-weather">
            <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2" width="770" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
        </div>
    </div>
</div>
<div class="box box-search clearfix">
    <div class="box-search_bg"></div>
    <div class="box-search_l">
        <a href="http://www.sogou.com/index.php?pid=sogou-netb-987797582-20141020" title="首页">
            <img id="searchGroupLogo" src="/tp02/Public/images/search_logo/web.png" width="97" height="32" alt="首页" />
        </a>
    </div>

    <div class="box-search_r">
        <div class="box-search_notice">
            <span></span>
        </div>
        <div class="box-hotword">
            <a href="javascript:;" target='_blank'></a>
        </div>
    </div>

    <dl class="box-search_c">
        <dt id="searchGroupTabs" class="box-search_tabs clearfix" monkey="search">
            <a class="cur"     href="javascript:;">网页</a>
            <a data-t="zixun"    href="javascript:;" >资讯</a>
            <a data-t="video"  href="javascript:;" >视频</a>
            <a data-t="image"  href="javascript:;" >图片</a>
            <a data-t="tieba"  href="javascript:;" >贴吧</a>
            <a data-t="wengda" href="javascript:;" >问答</a>
            <a data-t="news"   href="javascript:;" >新闻</a>
            <a data-t="map"    href="javascript:;" >地图</a>
        </dt>
        <dd>
            <form id="searchGroupForm" action="http://www.sogou.com/sogou">
                <div class="box-search_input">
                    <input id="searchGroupInput" name="query" maxlength="100" type="text" autocomplete="off"  style="padding: 0px; margin: 0px; height: 30px; " placeholder="请输入搜索关键字"/>
                </div>
                <span class="corner box-search_btn clearfix"><b class="r"></b><b class="l"></b>
                    <button id="searchGroupBtn" class="m" hidefocus="true" type="submit">搜索一下</button>
                </span>
            </form>
        </dd>
    </dl>
</div>
<div  id="doc">
    <div  id="bd">
        <?php if(empty($more_info)): ?><div class="mod-content clearfix">
                <div class="content-con content-con-first">
                暂无数据
                </div>
            </div>
        <?php else: ?>
            <?php if(is_array($more_info)): foreach($more_info as $key=>$vo): ?><div class="mod-content clearfix">
                    <div class="content-con content-con-first">
                        <h2 class="content-title"><?php echo ($key); ?></h2>
                        <ul class="content-link">
                            <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$more): $mod = ($i % 2 );++$i;?><li>
                                    <h3><div><a href="<?php echo ($more["href"]); ?>" target="_blank" class="text-con"><?php echo ($more["title"]); ?></a></div></h3>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div><?php endforeach; endif; endif; ?>
    </div>
</div>
<div class="box l-footer">
    <p class="span-rows box-about">
        <span class="box-about_first"><a href="javascript:;">关于零点科技</a></span>
        <b class="space"></b>
        <span><a href="javascript:;">IT中文社区</a></span>
        <b class="space"></b>
        <span><a href="javascript:;">零点技术分享</a></span>
        <b class="space"></b>
        <span><a href="javascript:;">零点技术社区</a></span>
    </p>
    <p class="span-rows box-copyright"><span style="margin:0 4px">网址之家</span>
        <span><a href="javascript:;">版权所有：@零点科技 <i class="i-papers"></i></a></span>
    </p>
</div>
</body>
</html>