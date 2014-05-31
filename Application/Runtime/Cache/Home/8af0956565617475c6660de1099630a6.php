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
  <br>
    <form class="form-info" method="post" action="/repair/index.php/Home/Account/register">
    <div id="add_computer">
          <p class="text-warning">请完善您的电脑信息，以便我们及时处理您的报修请求。</p>
            <p><input class="form-control"  type="text" name="brand" id="brand" placeholder="品牌">
                <div id="error_brand" class="text-danger"> ！请输入品牌</div></p>
            <p><input class="form-control"  type="text" name="model" id="model" placeholder="型号">
                <div id="error_model" class="text-danger"> ！请输入型号</div></p>
            <p><input class="form-control"  type="text" name="buy_time" id="buy_time" rel="popover" placeholder="购买时间例如'201401'">
                <div id="error_buy_time" class="text-danger"> ！请输入购买年月的正确格式如"201401"</div></p>
            <p><button class="btn btn-lg btn-primary btn-block" type="button" id="submit_new_computer">确 定</button></p>
      </div>            
    </form>
</div> <!-- /container -->

<script type="text/javascript">
$(document).ready(function(){
  $("#error_brand").hide();
  $("#error_model").hide();
  $("#error_buy_time").hide();


  //用户提交
  $("body").keydown(function() {
    if (event.keyCode == "13"){
      var brand=$("#brand").val();
      var model=$("#model").val();
      var buy_time=$("#buy_time").val();
      //判断用户是否内容都输入了
      if(brand==""){$("#error_brand").show();}else{$("#error_brand").hide();}
      if(model==""){$("#error_model").show();}else{$("#error_brand").hide();}
      if(!buy_time.match(/^\d{4}(1[0-2]|0?\d)$/)){$("#error_buy_time").show();}else{$("#error_brand").hide();}
      if(brand!="" && model!="" && buy_time.match(/^\d{4}(1[0-2]|0?\d)$/)){
        $("#error_brand").hide();
        $("#error_model").hide();
        $("#error_buy_time").hide();
        $("#submit_new_computer").text('提交中..');
        $.post("/repair/index.php/Home/Index/registerpc", {brand:brand,model:model,buy_time:buy_time},
          function(data){
        if(data.status==0){
          alert('提交失败，请稍后再试');
          $("#submit_new_computer").text('确定');
        }else if(data.status==-1){
          alert('时间格式错误,请重新输入如201401');
          $("#submit_new_computer").text('确定');
        }else if(data.status==-2){
          alert('时间范围错误。范围:200701至今');
          $("#submit_new_computer").text('确定');
        }else{
          $("#submit_new_computer").text('提交成功！跳转中..');
            window.location.href="/repair/index.php/Home/Index/index";//跳转到下一页面
        
        }
      });
      }
    }
  });

  $("#submit_new_computer").on("click",function(){
    var brand=$("#brand").val();
    var model=$("#model").val();
    var buy_time=$("#buy_time").val();
    //判断用户是否内容都输入了
    if(brand==""){$("#error_brand").show();}else{$("#error_brand").hide();}
    if(model==""){$("#error_model").show();}else{$("#error_brand").hide();}
    if(!buy_time.match(/^\d{4}(1[0-2]|0?\d)$/)){$("#error_buy_time").show();}else{$("#error_brand").hide();}
    if(brand!="" && model!="" && buy_time.match(/^\d{4}(1[0-2]|0?\d)$/)){
      $("#error_brand").hide();
      $("#error_model").hide();
      $("#error_buy_time").hide();
      $("#submit_new_computer").text('提交中..');
      $.post("/repair/index.php/Home/Index/registerpc", {brand:brand,model:model,buy_time:buy_time},
        function(data){
        if(data.status==0){
          alert('提交失败，请稍后再试');
          $("#submit_new_computer").text('确定');
        }else if(data.status==-1){
          alert('时间格式错误,请重新输入如201401');
          $("#submit_new_computer").text('确定');
        }else if(data.status==-2){
          alert('时间范围错误。范围:200501至今');
          $("#submit_new_computer").text('确定');
        }else{
          $("#submit_new_computer").text('提交成功！跳转中..');
            window.location.href="/repair/index.php/Home/Index/index";//跳转到下一页面
        
        }
      });
    }
  });
});
</script>
</body>
</html>