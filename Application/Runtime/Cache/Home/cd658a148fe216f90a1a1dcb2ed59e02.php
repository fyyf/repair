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
<script type="text/javascript" src="/fy/Public/js/bootstrap.min.js"></script>
<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body>
 <div class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
       <div class="container">   
       	  <ul class="nav nav-pills">
            <li class="active"><a href="/fy/index.php/Home/Index/staffnot">查看订单</a></li>
            <li><a href="/fy/index.php/Home/Account/logout">退出</a></li>
          </ul>
       </div>
    </div>
<div class="container1">
<br><center><h3>我的维修单</h3></center>
	<ul class="nav nav-tabs">
	  <li class="active"><a href="/fy/index.php/Home/Index/staffnot">未完成(<?php echo ($count_not); ?>)</a></li>
	  <li><a href="/fy/index.php/Home/Index/staffhas">已完成(<?php echo ($count_has); ?>)</a></li>
	</ul>
	<?php if(is_array($info)): foreach($info as $key=>$vo): ?><div class="jumbotron"><!--每一个订单-->
    	<p class="text-success">订单号：<?php echo ($vo["number"]); ?></p><!--订单号-->
    	<hr>
        <p>订单状态：<?php if($vo["status"] == 1): ?>待确认接单						
						<?php elseif($vo["status"] == 2): ?>
						用户已取消该订单
						<?php elseif($vo["status"] == 3): ?>
						待维修
						<?php elseif($vo["status"] == 4): ?>
						该订单已完成<?php endif; ?></p>
        <p>客户姓名：<?php echo ($vo["name"]); ?></p>
        <p>联系方式：<?php echo ($vo["phone"]); ?></p>
    	<p>电脑信息：<?php echo ($vo["brand"]); echo ($vo["model"]); ?>-<?php echo (date("Ym",$vo["buy_time"])); ?>年购买</p>
      	<p>故障信息：<?php echo ($vo["description"]); ?></p>

  		<hr><p><div align="right"> 
		<?php if($vo["status"] == 1): ?><span class="refuse_order" ajaxid="<?php echo ($vo["order_id"]); ?>">
		<button class="btn btn-sm btn-default" id="refuse_order_<?php echo ($vo["order_id"]); ?>" type="button">无法接单</button>
		</span>
		<span class="accept_order" ajaxid="<?php echo ($vo["order_id"]); ?>">
		<button class="btn btn-sm btn-success" id="accept_order_<?php echo ($vo["order_id"]); ?>" type="button">我要接单</button>
		</span><?php endif; ?>
    	</div></p>
	  </div>
    </br><?php endforeach; endif; ?>    
</div> 

<script type="text/javascript">

$(document).ready(function(){
	//接单
	$(".accept_order").on("click",function(){	
			var order_id=$(this).attr('ajaxid');
			$("#accept_order_"+order_id).text('处理中..');
			$.post("/fy/index.php/Home/Handle/accept", {order_id:order_id},//取消的订单号
				function(data){
					if(data.status==0){
						$("#accept_order_"+order_id).text('接单失败,请重试');
						//document.location.reload("/fy/index.php/Home/Handle/staffnot");
					}else{
						$("#accept_order_"+order_id).text('接单成功');
						window.location.reload("/fy/index.php/Home/Handle/staffnot");//重新加载网页
					}
			});
	});
	//不接单
	$(".refuse_order").on("click",function(){	
		var order_id=$(this).attr('ajaxid');
		var refuse_order_id=$(this).attr('ajaxid');
		$("#refuse_order_"+order_id).text('处理中...');
		$.post("/fy/index.php/Home/Handle/refuse",{order_id:order_id,refuse_order_id:refuse_order_id},
			function(data){
				if(data.status==0){
					$("#refuse_order_"+order_id).text('操作失败,请重试');
					//document.location.reload("/fy/index.php/Home/Handle/staffnot");
				}else{
					$("#refuse_order_"+order_id).text('操作成功');
					document.location.reload("/fy/index.php/Home/Handle/staffnot");
				}
			});
	});

});



</script>
</body>
</html>