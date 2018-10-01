<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta  http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">

<title>后台</title>

<link href="/tp02/Public/css/module.css" rel="stylesheet"/>
<link href="/tp02/Public/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
<link href="/tp02/Public/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
<link href="/tp02/Public/css/animate.css" rel="stylesheet">
<link href="/tp02/Public/css/admin-style.css?v=2.2.0" rel="stylesheet">

<!-- Mainly scripts -->
<script src="/tp02/Public/js/jquery-2.1.1.min.js"></script>
<script src="/tp02/Public/js/bootstrap.min.js?v=3.4.0"></script>

<!--Layer-->
<script src="/tp02/Public/static/layer/layer.js"></script>
<script type="text/javascript" src="/tp02/Public/js/admin.js"></script>
<script src="/tp02/Public/js/jquery.metisMenu.js"></script>


</head>
<body>
   <div id="wrapper">
       <script>
    $(function(){
        var controller_name = "<?php echo CONTROLLER_NAME;?>";
        var nav     = $('.nav-second-level a');
        nav.each(function(){
            var url = $(this).attr('href');
            console.log(url);
            if(url.indexOf('/'+controller_name) > 0){
                $(this).parent().addClass('active');
                return false;
            }
        });
    });
</script>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header" style="padding: 25px 20px;">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" height="60px" src="/tp02/Public/images/logos.jpg" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><span style="color: #1E9FFF; font-size: 12px;">当前用户：</span><?php echo (session('admin_username')); ?></strong>
                         </span>  <span class="text-muted text-xs block"><?php if(($_SESSION['admin_id']) == "1"): ?>超级管理员<?php else: ?>管理员<?php endif; ?> <b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo U('Index/changePassword');?>">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Public/logout');?>">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    MR
                </div>
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-edit" style="width: 18px"></i> <span class="nav-label">管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo U('HighLevel/lists');?>">高级分类</a></li>
                    <li><a href="<?php echo U('MiddleLevel/lists');?>">中级分类</a></li>
                    <li><a href="<?php echo U('ElementaryLevel/lists');?>">初级分类</a></li>
                    <li><a href="<?php echo U('Datalist/lists');?>">数据管理</a></li>
                    <li><a href="<?php echo U('Hot/lists');?>">热门管理</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>





       
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">
                    <a href="<?php echo U('Datalist/lists');?>" title="返回首页"><i class="fa fa-home"></i>欢迎使用零点科技后台管理系统</a>
                </span>
            </li>
            <li>
                <a href="<?php echo U('Public/logout');?>">
                    <i class="fa fa-sign-out"></i> 退出
                </a>
            </li>
        </ul>
    </nav>
</div>
 <!--顶部-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加热门网址</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t " method="post" action="<?php echo U('add');?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">名称：</label>
                            <div class="col-sm-3">
                                <input  type="text" id="title" class="form-control" name="title" value="<?php echo ($data["title"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">链接地址：</label><span style="color:indianred">（示例：http://www.baidu.com ）</span>
                            <div class="col-sm-3">
                                <input  type="text" id="href" class="form-control" name="href" value="<?php echo ($data["href"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">类型：</label>
                            <div class="col-sm-6">
                                <input type="radio" name="type" value="0" <?php if(($data["type"] == 0)): ?>checked<?php endif; ?> > 热门区
                                <input type="radio" name="type" value="1" <?php if(($data["type"] == 1)): ?>checked<?php endif; ?> > 广告区
                                <input type="radio" name="type" value="2" <?php if(($data["type"] == 2)): ?>checked<?php endif; ?> > 图片区
                                <span style="color:indianred">（不同类型，首页显示在不同的位置）</span>
                            </div>
                        </div>
                        <div class="form-group" id="picture" style="display: none">
                            <label class="col-sm-3 control-label">图片：</label>
                            <div class="col-sm-9">
                                <input type="file" name="picture"/>
                                <?php if(!empty($data["picture"])): ?><img width="80px" height="80px" src="<?php echo (get_cover_url($data["picture"])); ?>"><?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否推荐：</label>
                            <div class="col-sm-6">
                                <input type="radio" name="is_recommend" value="0" <?php if(($data["is_recommend"] != 1)): ?>checked<?php endif; ?> > 否
                                <input type="radio" name="is_recommend" value="1" <?php if(($data["is_recommend"] == 1)): ?>checked<?php endif; ?> > 是
                                <span style="color:indianred">（如果是推荐，则在首页颜色不同）</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">排序：</label>
                            <div class="col-sm-3">
                                <input  type="text" id="sort" class="form-control" name="sort" value="<?php echo ($data["sort"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <input type="hidden" name='id' value="<?php echo ($_GET['id']); ?>">
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    $(function () {
        var type = "<?php echo ($data["type"]); ?>";
        if(type == 2){
            $('#picture').show();
        }else{
            $('#picture').hide();
        }

        $('input[name=type]').each(function(){
            $(this).click(function () {
                if($(this).val() == 2){
                    $('#picture').show();
                }else{
                    $('#picture').hide();
                }
            });
        });
    });
</script>


   </div>
</body>
</html>