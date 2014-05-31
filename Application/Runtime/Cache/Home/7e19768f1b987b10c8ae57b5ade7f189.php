<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="zh-CN"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>设置</title>

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

	<link href="/repair/Public/media/css/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />

	<link href="/repair/Public/media/css/chosen.css" rel="stylesheet" type="text/css" />

	<link href="/repair/Public/media/css/profile.css" rel="stylesheet" type="text/css" />

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="/repair/Public/media/image/favicon.ico" />

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
				<li class="start ">
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
				<li class="active last">
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

							设置 

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.html">Home</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="#">设置</a>

								<i class="icon-angle-right"></i>

							</li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid profile">

					<div class="span12">

						<div class="row-fluid">
							<!--<div class="span3">
								<ul class="ver-inline-menu tabbable margin-bottom-10">
									<li class="active">
										<a data-toggle="tab" href="#tab_1-1">
											<i class="icon-cog"></i>个人信息
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#tab_2-2">
											<i class="icon-lock"></i>修改密码
										</a>
									</li>
								</ul>
							</div>-->

							<div class="span12">

								<!--<div id="tab_1-1" class="tab-pane active">-->

									<div style="width:400px; margin:0 auto;" class="accordion collapse">

										<form action="/repair/index.php/Home/Admin/set" method="post">

											<label class="control-label">姓名</label>

											<input type="text" class="m-wrap span8" name="username" value="<?php echo ($userextend["name"]); ?>" />

											<label class="control-label">手机</label>

											<input type="text" class="m-wrap span8" name="userphone" value="<?php echo ($userextend["phone"]); ?>" />

											<label class="control-label">邮箱</label>

											<input type="text" name="email" class="m-wrap span8" value="<?php echo ($admininfo["email"]); ?>" />
											<label class="control-label">原密码[如不修改，请不要填写]</label>

											<input type="password" name="old_password" class="m-wrap span8"/>
											<label class="control-label">新密码[如不修改，请不要填写]</label>

											<input type="password" name="password" class="m-wrap span8"/>

											<div class="submit-btn">

												<button type="submit" class="btn green">确定</button>

												<button href="#" class="btn">取消</button>

											</div>

										</form>

									</div>

								<!--</div>-->

								<!--<div id="tab_2-2" class="tab-pane">

									<div style="width:400px; margin:0 auto;" class="accordion collapse">

										<form action="#">

											<label class="control-label">密码</label>

											<input type="password" class="m-wrap span8" />

											<label class="control-label">新密码</label>

											<input type="password" class="m-wrap span8" />

											<label class="control-label">再输一遍</label>

											<input type="password" class="m-wrap span8" />

											<div class="submit-btn">

												<button href="#" class="btn green">确定</button>

												<button href="#" class="btn">取消</button>

											</div>

										</form>

									</div>

								</div>-->

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


	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="/repair/Public/media/js/app.js"></script>      

	<!-- END PAGE LEVEL SCRIPTS -->

	<script>

		jQuery(document).ready(function() {       

		   // initiate layout and plugins

		   App.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>