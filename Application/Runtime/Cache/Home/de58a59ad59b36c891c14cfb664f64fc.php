<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="fyicon.ico"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>飞扬报修系统</title>
    <link href="/fy/Public/css/bootstrap.css" rel="stylesheet">
    <link href="/fy/Public/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="/fy/Public/js/jquery-1.9.1.min.js"></script>
</head>

<body>
 <div class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
       <div class="container">   
       	  <ul class="nav nav-pills">
            <li class="active"><a href="/fy/index.php/Home/Index/index">飞扬报修</a></li>
            <li><a href="/fy/index.php/Home/Index/order">查看订单</a></li>
            <li><a href="/fy/index.php/Home/Account/logout">退出</a></li>
          </ul>
       </div>
    </div>
    
<div class="container">
	<br><br>
    <form class="form-info">
      <p class="text-warning">修改信息</p>
      <input type="hidden" name="weixin_key" value="<?php echo ($_GET['weixin_key']); ?>" />
      <p>姓名：
        <input class="form-control" type="button" name="name" id="user_name" placeholder="<?php echo ($user['name']); ?>"/>
        <div id="error_name" class="text-danger"> ！请输入姓名</div>
      </p>
      <p>手机号码：
        <input class="form-control" type="button" name="phone" id="user_phone" placeholder="<?php echo ($user["phone"]); ?>"/>
        <div id="error_phone" class="text-danger"> ！请输入有效号码</div>
      </p>
      <p>
        <input class="btn btn-lg btn-primary btn-block" name="button" id="button" value="确定" />
      </p>
    </form>
</div> <!-- /container -->

<script type="text/javascript">
$(document).ready(function(){
	$("#error_name").hide();
	$("#error_phone").hide();
	$("#user_phone").on("blur",function(){
		if(!$("#user_phone").val().match(/^0?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/)){
			$("#error_phone").show();
		}
		else {$("#error_phone").hide();}
	});
	$("#button1").on("click",function(){
		var name_value=$("#user_name").val();
		var phone_value=$("#user_phone").val();
    alert(name_value);return;
		if(name_value==""){
			$("#error_name").show();
		}
		if(!phone_value.match(/^0?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/)){
			$("#error_phone").show();
		}
		if(name_value!="" && phone_value.match(/^0?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/)){
			//若均填写隐藏提示信息
			$("#error_name").hide();
			$("#error_phone").hide();
			$.post("/fy/index.php/Home/Index/set", {name:name_value,phone:phone_value},function(data){
				if(data.status==0){
					alert('提交失败,请稍后再试');
          document.location.reload("/fy/index.php/Home/Index/set");
				}else{
          alert('修改成功！');
          //window.location.href="/fy/index.php/Home/Index/index";
        }
			});
		}
	});
});
</script>
</body>
</html>