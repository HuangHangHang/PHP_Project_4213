<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>管理员登录页面</title>
  <link rel="stylesheet" href="../layui/css/layui.css" media="all">
</head>

<body>
   <center>
    <h2 style="margin-bottom: 20px; margin-top: 40px;">管理员登录页面</h2>  
    <form class="layui-form" action="" lay-filter="example" style="width: 640px; margin: auto;">
        <div class="layui-form-item" style="margin-left: 140px;">
          <label class="layui-form-label">用户名:</label>
          <div class="layui-input-block">
            <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input" style="width: 200px; float: left;">
          </div>
        </div>
        <div class="layui-form-item" style="margin-left: 140px;">
          <label class="layui-form-label">密&nbsp;&nbsp;&nbsp;码:</label>
          <div class="layui-input-block">
            <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input" style="width: 200px; float: left;">
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block" style="width: 200px; float: left; margin-left: 240px;">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
    </form>
   </center>   
</body>
</html>