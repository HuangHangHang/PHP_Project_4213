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
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo ($title); ?></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-button">
                                        <a href="<?php echo U('add');?>">
                                            <button class="btn btn-primary add" type="button"><i class="fa fa-plus"></i>&nbsp;新增</button>
                                        </a>
                                        <button class="btn btn-warning delete-all" type="button" url="<?php echo U('delAll');?>"><i class="fa fa-minus "></i>&nbsp;删除</button>
                                    </div>
                                </div>
                                <!--搜索开始-->
                                <form method="post" action="/tp02/index.php/Admin/MiddleLevel/lists.html" >
                                    <div class="col-sm-3">
                                        <div class="input-group" style="width:300px;">
                                            <input type="text" placeholder="请输入分类名称" class="input-sm form-control" name="keyword" value=<?php echo ($keyword); ?>>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-primary"> 搜索</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <!--搜索结束-->
                            </div>
                            <!--表格开始    -->
                            <form action="/tp02/index.php/Admin/MiddleLevel/lists.html" method="post" name="updateSort" id="updateSort" >
                                <div class="table-responsive">
                                    <table class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th style="width: 35px;">
                                                <input type="checkbox" id="checkAll" class="check-all">
                                                <label for="checkAll"></label>
                                            </th>
                                            <th>ID</th>
                                            <th>名称</th>
                                            <th>所属类别</th>
                                            <th>是否推荐</th>
                                            <th>排序</th>
                                            <th style="width: 100px">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($datalists)): foreach($datalists as $key=>$vo): ?><tr>
                                                <td>
                                                    <input class="ids regular-checkbox" type="checkbox" value="<?php echo ($vo["id"]); ?>" name="ids[]" id="check_<?php echo ($vo["entity_id"]); ?>">
                                                    <label for="check_<?php echo ($vo["entity_id"]); ?>"></label>
                                                </td>
                                                <td> <?php echo ($vo["id"]); ?></td>
                                                <td> <?php echo ($vo["middle_name"]); ?></td>
                                                <td> <?php echo ($vo["high_name"]); ?></td>
                                                <td> <?php if(($vo["is_recommend"]) == "1"): ?>是
                                                    <?php else: ?>
                                                    否<?php endif; ?>
                                                <td> <?php echo ($vo["sort"]); ?></td>
                                                <td>
                                                    <a href="<?php echo U('add',array('id'=>$vo['id']));?>">编辑</a>
                                                    <a class="confirm" href="<?php echo U('delete',array('id'=>$vo['id']));?>">删除</a>
                                                </td>
                                            </tr><?php endforeach; endif; ?>
                                        </tbody>
                                    </table>
                                    <label style="font-size: 14px;">共有&nbsp;<span style="color: #1E9FFF; font-size: 16px;"><?php echo ($count); ?></span>&nbsp;条记录</label>
                                    <!--分页开始-->
                                    <div style="padding-top:15px;float: right; ">
                                        <div class="page"><?php echo ($page); ?></div>
                                    </div>
                                    <!--分页结束-->
                                </div>
                            </form>
                            <!--表格结束-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--尾部-->
        
    </div>

   </div>
</body>
</html>