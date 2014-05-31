<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="fyicon.ico"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>飞扬报修系统</title>
    <link href="/repair/Public/css/bootstrap.css" rel="stylesheet">
    <link href="/repair/Public/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="/repair/Public/js/jquery-1.9.1.min.js"></script>
</head>

<body>
 <div class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
       <div class="container">   
       	  <ul class="nav nav-pills">
            <li class="active"><a href="/repair/index.php/Home/Index/index">飞扬报修</a></li>
            <li><a href="/repair/index.php/Home/Index/order">查看订单</a></li>
            <li><a href="/repair/index.php/Home/Account/logout">退出</a></li>
          </ul>
       </div>
    </div>
    
<div class="container">
	<br><br>
    <form class="form-info">
      <p class="text-warning">请完善您的信息，以便我们及时处理您的报修请求。</p>
      <input type="hidden" id="weixin_key" value="<?php echo ($_GET['weixin_key']); ?>" />
      <p>姓名：
        <input class="form-control" type="text" name="name" id="user_name"/>
        <div id="error_name" class="text-danger"> ！请输入姓名</div>
      </p>
      <p>手机号码：
        <input class="form-control" type="tel" name="phone" id="user_phone"/>
        <div id="error_phone" class="text-danger"> ！请输入正确号码</div>
      </p>
      <p>
        <button class="btn btn-lg btn-primary btn-block" name="button"type="button"  id="next" />下一步
        </button>
      </p>
    </form>
</div> <!-- /container -->

<script type="text/javascript">
$(document).ready(function(){
  $("#error_name").hide();
  $("#error_phone").hide();
  //按下回车
  $("body").keydown(function() {
    if (event.keyCode == "13"){
      var name_value=$("#user_name").val();
      var phone_value=$("#user_phone").val();
      var weixin_key=$("#weixin_key").val();
      if(name_value==""){
        $("#error_name").show();
      }
      else{ $("#error_name").hide();}
      
      if(phone_value==""){
        $("#error_phone").show();
      }
      else{ $("#error_phone").hide();}
      
      if(!phone_value.match(/^0?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/)){
        $("#error_phone").show();
      }
      else {$("#error_phone").hide();}

      if(name_value!="" && phone_value.match(/^0?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/) && phone_value!=""){
        //若均填写隐藏提示信息
        $("#error_name").hide();
        $("#error_phone").hide();
        $("#next").text('处理中..');
        $.post("/repair/index.php/Home/Account/register", {name:name_value,phone:phone_value,weixin_key:weixin_key},function(data){
          if(data.status==0){
            alert(data.in);
             $("#next").text('下一步');
          }else{ 
             $("#next").text('成功！跳转中..');
             window.location.href="/repair/index.php/Home/Index/registerpc";//跳转到下一页面
            }
        });
      }
    }
  });
  $("#next").on("click",function(){
    var name_value=$("#user_name").val();
    var phone_value=$("#user_phone").val();
      var weixin_key=$("#weixin_key").val();
    if(name_value==""){
      $("#error_name").show();
    }
    else{ $("#error_name").hide();}
    
    if(phone_value==""){
      $("#error_phone").show();
    }
    else{ $("#error_phone").hide();}
    
    if(!phone_value.match(/^0?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/)){
      $("#error_phone").show();
    }
    else {$("#error_phone").hide();}

    if(name_value!="" && phone_value.match(/^0?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/) && phone_value!=""){
      //若均填写隐藏提示信息
      $("#error_name").hide();
      $("#error_phone").hide();
      $("#next").text('处理中..');
    // alert(weixin_key);
      $.post("/repair/index.php/Home/Account/register", {name:name_value,phone:phone_value,weixin_key:weixin_key},function(data){
        if(data.status==0){
          alert(data.in);
           $("#next").text('下一步');
        }else{ 
           $("#next").text('成功！跳转中..');
           window.location.href="/repair/index.php/Home/Index/registerpc";//跳转到下一页面
          }
      });
    }
  });
});
</script>
</body>
</html>