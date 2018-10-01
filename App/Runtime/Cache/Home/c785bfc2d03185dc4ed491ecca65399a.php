<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户注册</title>
</head>
<body>
  <form action="" method="POST">
  	用户名：<input type="text" name="username"><br/>
  	密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd"><br/>
  	性别：<input type="radio" name="xib" value="男">男</input>&nbsp;
  	      <input type="radio" name="xib" value="女">女</input><br/>
  	班级：<select name="sele">
  		   <option value="软件1601">软件1601</option>
  		   <option value="软件1602">软件1602</option>
  		   <option value="软件1603">软件1603</option>
  	</select><br/>
  	<input type="submit" value="提交"><br/>

  </form>
</body>
</html>