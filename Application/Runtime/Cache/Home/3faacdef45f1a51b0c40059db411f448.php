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
<script type="text/javascript" src="/repair/Public/js/bootstrap.min.js"></script>
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
            <li ><a href="/repair/index.php/Home/Index/index">飞扬报修</a></li>
            <li class="active"><a href="/repair/index.php/Home/Index/order">查看订单</a></li>
            <li><a href="/repair/index.php/Home/Account/logout">退出</a></li>
          </ul>
       </div>
    </div>
<div class="container1">
	<br><center><h3>我的订单</h3></center>
	
<?php if($count > 0): if(is_array($info)): foreach($info as $key=>$vo): ?><div class="jumbotron">
      <!--显示所有订单-->
    	<p class="text-success">订单号：<?php echo ($vo["number"]); ?></p><!--订单号-->
    	<hr>
    	   <p>订单状态：<?php if(($vo["status"] == 0) OR ($vo["status"] == 1) OR ($vo["status"] == 5) ): ?>待系统分配技术员
						<?php elseif($vo["status"] == 2): ?>
						该订单已取消
						<?php elseif($vo["status"] == 3): ?>
						待技术员维修
						<?php else: ?>
						该订单已完成<?php endif; ?></p><!--订单状态-->
    	<p>电脑信息：<?php echo ($vo["brand"]); echo ($vo["model"]); ?>-<?php echo (date("Y年m月",$vo["buy_time"])); ?>购买</p>
      	<p>报修原因：<?php echo ($vo["description"]); ?></p><!--订单信息-->

<?php if(($vo["status"] == 3) OR ($vo["status"] == 4)): ?><p>技术员姓名：<?php echo ($vo["name"]); ?></p>
<p>技术员联系方式：<?php echo ($vo["phone"]); ?></p><?php endif; ?>
    	
  		<hr><div align="right"><p> 
			<?php if(($vo["status"] == 0) OR ($vo["status"] == 1) OR ($vo["status"] == 5) ): ?><span class="cancel_order"  ajaxid="<?php echo ($vo["order_id"]); ?>">
			<button class="btn btn-sm btn-default" id="cancel_order_<?php echo ($vo["order_id"]); ?>" type="button">取消订单</button>
			</span>		
			<?php elseif($vo["status"] == 3): ?>
			<span class="cancel_order" ajaxid="<?php echo ($vo["order_id"]); ?>">
			<button class="btn btn-sm btn-default" id="cancel_order_<?php echo ($vo["order_id"]); ?>" type="button">取消订单</button>
			</span>
			<span class="complete_order"  ajaxid="<?php echo ($vo["order_id"]); ?>">
			<button class="btn btn-sm btn-success" id="complete_order_<?php echo ($vo["order_id"]); ?>" type="button">确认已完成</button>
			</span><?php endif; ?>
    	</div>
<br/></div></p><?php endforeach; endif; ?>
</p>
<?php else: ?>
<h1>当前无订单</h1><?php endif; ?>
</div> 

<script type="text/javascript">
$(document).ready(function(){
	//用户取消订单
	$(".cancel_order").on("click",function(){	
		if(confirm("确认要取消该订单吗?")){			
			var order_id=$(this).attr('ajaxid');
			$("#cancel_order_"+order_id).text('处理中..');
			//alert(order_id);return;
			$.post("/repair/index.php/Home/Handle/cancel", {order_id:order_id},//取消的订单号
				function(data){
					if(data.status==0){
						$("#cancel_order_"+order_id).text('取消失败,请重试');
						//document.location.reload("/repair/index.php/Home/Index/order");
					}else{
						document.location.reload("/repair/index.php/Home/Index/order");//重新加载网页
					}
			});
		}
	});
	//用户点击确认完成订单
	$(".complete_order").on("click",function(){
		
		var order_id=$(this).attr('ajaxid');
		$("#complete_order_"+order_id).text('处理中..');
		//alert(order_id);return;
		$.post("/repair/index.php/Home/Handle/complete",{order_id:order_id},
			function(data){
				if(data.status==0){
					$("#coplete_order_"+order_id).text('确认失败,请重试');
					//document.location.reload("/repair/index.php/Home/Index/order");
				}else{
					document.location.reload("/repair/index.php/Home/Index/order");
				}
			}
		);//完成的订单号		
	});
});
</script>
</body>
</html>