<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="zh-CN"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>订单管理</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="/repair/Public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="/repair/Public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="/repair/Public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="/repair/Public/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="/repair/Public/media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="/repair/Public/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="/repair/Public/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="/repair/Public/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link rel="stylesheet" type="text/css" href="/repair/Public/media/css/select2_metro.css" />

	<link rel="stylesheet" href="/repair/Public/media/css/DT_bootstrap.css" />

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="/repair/Public/media/image/favicon.ico" />
	<style type="text/css">
	.tabhide{
		background: #eee;
	}
	</style>

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<!-- BEGIN HEADER -->

	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="index.html">
				<img src="/repair/Public/media/image/logo.png" alt="logo" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="/repair/Public/media/image/menu-toggler.png" alt="" />
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->            
				<!-- BEGIN TOP NAVIGATION MENU -->              
				<ul class="nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="/repair/Public/media/image/avatar1_small.jpg" />
						<span class="username">账户</span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							
							<li><a href="/repair/index.php/Home/Account/logout"><i class="icon-key"></i> 退出</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU --> 
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>

	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->

	<div class="page-container row-fluid">

		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li class=" start ">
					<a href="index.html">
					<i class="icon-home"></i> 
					<span class="title">HOME</span>
					</a>
				</li>
				<li class="">
					<a href="/repair/index.php/Home/Admin/user">
					<i class="icon-cogs"></i> 
					<span class="title">用户管理</span>
					</a>
				</li>
				<li >
					<a href="/repair/index.php/Home/Admin/staff">
					<i class="icon-table"></i> 
					<span class="title">技术员管理</span>
					</a>
				</li>
				<li class="active">
					<a href="/repair/index.php/Home/Admin/order">
					<i class="icon-bookmark-empty"></i> 
					<span class="title">订单管理</span>
					</a>
				</li>
				<li class="last">
					<a href="/repair/index.php/Home/Admin/set">
					<i class="icon-user"></i> 
					<span class="title">设置</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN PAGE CONTAINER-->        

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->

						<h3 class="page-title">

							订单管理

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.html">Home</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="#">订单管理</a>

								<i class="icon-angle-right"></i>

							</li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span9">

						<!-- BEGIN EXAMPLE TABLE PORTLET-->

						<div class="portlet box green">

							<div class="portlet-title">

								<div class="caption"><i class="icon-globe"></i>订单管理</div>

								<div class="tools">

									<a href="javascript:;" class="reload"></a>

								</div>

							</div>

							<div class="portlet-body">
								<table width="100%">	
									<tbody>
										<tr>
											<td>
												<table width="100%" class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
													<tr>
													    <th width="10%">详 情</th>
														<th width="20%">订单号</th>

														<th width="20%">技术员</th>

														<th width="20%">客户名</th>

														<th width="30%">订单状态</th>

													
													</tr>
												</table>
												<?php if(is_array($order_list)): foreach($order_list as $key=>$vo): ?><!--一个订单的信息开始-->
												<table width="100%" class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
													<tr>
													<td width="10"><button orderid="<?php echo ($vo["order_id"]); ?>" class="btnhide">+</button></td>
													<td width="20%"><?php echo ($vo["number"]); ?></td>
													<td width="20%"><?php echo ($vo["staff_name"]); ?></td>
													<td width="20%"><?php echo ($vo["user_name"]); ?></td>
													<td width="30%"><?php echo ($vo["status"]); ?></td>
													
													</tr>
												</table>
											    <table id="order<?php echo ($vo["order_id"]); ?>" class="tabhide" width="100%">
													<tbody>
										            <tr><td width="15%">客户信息</td><td width="20%">&nbsp;</td><td width="15%">技术员信息</td><td width="15%">&nbsp;</td><td width="15%">订单动态</td></tr>
										            <tr><td>姓名：</td><td><?php echo ($vo["user_name"]); ?></td><td>姓名：</td><td><?php echo ($vo["staff_name"]); ?></td><td>报修时间：</td><td><?php echo (date('Y-m-d H:i',$vo["time"])); ?></td></tr>
										            <tr><td>手机：</td><td><?php echo ($vo["user_phone"]); ?></td><td>手机：</td><td><?php echo ($vo["staff_phone"]); ?></td><td>分配技术员时间：</td><td><?php echo (date('Y-m-d H:i',$vo["distribute_time"])); ?></td></tr>
										            <tr><td>电脑信息：</td><td><?php echo ($vo["brand"]); echo ($vo["model"]); echo (date('Y年m月',$vo["buy_time"])); ?>购买</td><td>邮箱：</td><td><?php echo ($vo["staff_email"]); ?></td><td>维修完成时间：</td><td><?php echo (date('Y-m-d H:i',$vo["user_confirm_time"])); ?></td></tr>
										            <tr><td>故障信息：</td><td colspan="4">
<?php echo ($vo["description"]); ?></td></tr>
										            </tbody>
									            </table><?php endforeach; endif; ?>
									            <!--一个订单的结束-->
									            <div>	<?php echo ($page); ?></div>
											</td>
										</tr>
									</tbody>

								</table>

							</div>

						</div>

						<!-- END EXAMPLE TABLE PORTLET-->

					</div>

					<div class="span3">

						<div class="portlet box grey">

							<div class="portlet-title">

								<div class="caption"><i class="icon-comments"></i></div>

							</div>

							<div class="portlet-body fuelux">
<form method="get" action="/repair/index.php/Home/Admin/order_search">
								<label>

									<input type="text" name="key" class="m-wrap small">
									<button class="btn grey"><i class="icon-search"></i></button>
								</label>
</form>
								<table class="table table-striped table-bordered table-hover table-full-width dataTable" align="center">
									
									<tr><td><a href="/repair/index.php/Home/Admin/order">所有订单</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/order/status/doing">活动订单</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/order/status/done">非活动订单</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/order/status/submitted">待分配订单</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/order/status/distributed">待技术员确认订单</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/order/status/confirmed">技术员已确认订单</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/order/status/completed">已完成订单</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/order/status/canceled">已取消订单</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/order/status/rejected">待重新分配订单</a></td></tr>
								</table>

							</div>

						</div>

					</div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER-->

		</div>

		<!-- END PAGE -->

	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">

		</div>

		<div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

		</div>

	</div>

	<!-- END FOOTER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="/repair/Public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="/repair/Public/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="/repair/Public/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="/repair/Public/media/js/bootstrap.min.js" type="text/javascript"></script>



	<script src="/repair/Public/media/js/app.js"></script>

	<script>

		jQuery(document).ready(function() {       

		   App.init();

		   TableAdvanced.init();

		});

	</script>



<script type="text/javascript">
	$(".tabhide").hide();
	$(".btnhide").click(function(){
		var order_id=$(this).attr('orderid');
		$("#order"+order_id).toggle();
		//$(".tabhide").toggle();
	});
</script>

</body>

<!-- END BODY -->

</html>