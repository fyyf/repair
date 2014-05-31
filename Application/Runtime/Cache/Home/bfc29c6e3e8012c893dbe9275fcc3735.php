<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!-- 

Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 2.3.1

Version: 1.3

Author: KeenThemes

Website: http://www.keenthemes.com/preview/?theme=metronic

Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469

-->

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!--> <html lang="zh-CN" class="no-js"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>飞扬报修系统</title>

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

	<link rel="shortcut icon" href="/repair/Public/media/image/favicon.ico" />
	<style>
	.dashboard-stat{
		min-height: 150px;
	}
	.dashboard-stat .more{
		font-size: 16px;
		padding: 10px 10px 10px 10px;
	}
	.dashboard-stat .visual {
		padding-top: 30px;
		padding-left: 30px;
		padding-bottom: 10px;
	}
	.dashboard-stat .details {
		padding-top: 20px;
		padding-right: 30px;
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

	<div class="page-container">

		<!-- BEGIN SIDEBAR -->

	<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li class="active start ">
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
				<li class="">
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

							首页

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.html">Home</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

							<a href="#">首页</a>
							
							<i class="icon-angle-right"></i>
							
							</li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<div id="dashboard">

					<!-- BEGIN DASHBOARD STATS -->

					<div class="row-fluid">

						<div class="span4 responsive" data-tablet="span6" data-desktop="span4">

							<div class="dashboard-stat blue">

								<div class="visual">

									<i class="icon-bookmark-empty"></i>

								</div>

								<div class="details">

									<div class="number">

										<?php echo ($count["all"]); ?>

									</div>

									<div class="desc">                           

										全部订单

									</div>

								</div>

								<a class="more" href="/repair/index.php/Home/Admin/order/">

								查看 <i class="m-icon-swapright m-icon-white"></i>

								</a>                 

							</div>

						</div>

						<div class="span4 responsive" data-tablet="span6" data-desktop="span4">

							<div class="dashboard-stat green">

								<div class="visual">

									<i class="icon-ok-sign"></i>

								</div>

								<div class="details">

									<div class="number"><?php echo ($count["completed"]); ?></div>

									<div class="desc">已完成</div>

								</div>

								<a class="more" href="/repair/index.php/Home/Admin/order/status/completed">

								查看 <i class="m-icon-swapright m-icon-white"></i>

								</a>                 

							</div>

						</div>

						<div class="span4 responsive" data-tablet="span6  fix-offset" data-desktop="span4">

							<div class="dashboard-stat purple">

								<div class="visual">

									<i class="icon-cog"></i>

								</div>

								<div class="details">

									<div class="number"><?php echo ($count["confirmed"]); ?></div>

									<div class="desc">维修中</div>

								</div>

								<a class="more" href="/repair/index.php/Home/Admin/order/status/confirmed">

								查看 <i class="m-icon-swapright m-icon-white"></i>

								</a>                 

							</div>

						</div>

					</div>

					<div class="row-fluid">

						<div class="span4 responsive" data-tablet="span6" data-desktop="span4">

							<div class="dashboard-stat yellow">

								<div class="visual">

									<i class="icon-trash"></i>

								</div>

								<div class="details">

									<div class="number"><?php echo ($count["canceled"]); ?></div>

									<div class="desc">已取消</div>

								</div>

								<a class="more" href="/repair/index.php/Home/Admin/order/status/canceled">

								查看 <i class="m-icon-swapright m-icon-white"></i>

								</a>                 

							</div>

						</div>

						<div class="span4 responsive" data-tablet="span6" data-desktop="span4">

							<div class="dashboard-stat red">

								<div class="visual">

									<i class="icon-user"></i>

								</div>

								<div class="details">

									<div class="number"><?php echo ($count["submitted"]); ?></div>

									<div class="desc">待系统分配技术员</div>

								</div>

								<a class="more" href="/repair/index.php/Home/Admin/order/status/submitted">

								查看 <i class="m-icon-swapright m-icon-white"></i>

								</a>                 

							</div>

						</div>
						<div class="span4 responsive" data-tablet="span6" data-desktop="span4">

							<div class="dashboard-stat blue">

								<div class="visual">

									<i class="icon-globe"></i>

								</div>

								<div class="details">

									<div class="number"><?php echo ($count["distributed"]); ?></div>

									<div class="desc">正在通知技术员</div>

								</div>

								<a class="more" href="/repair/index.php/Home/Admin/order/status/distributed">

								查看 <i class="m-icon-swapright m-icon-white"></i>

								</a>                 

							</div>

						</div>

					</div>

					<!-- END DASHBOARD STATS -->
				</div>

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

	</div>

	<!-- END FOOTER -->

	<script src="/repair/Public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>  

	<script src="/repair/Public/media/js/bootstrap.min.js" type="text/javascript"></script>

</body>
<!-- END BODY -->

</html>