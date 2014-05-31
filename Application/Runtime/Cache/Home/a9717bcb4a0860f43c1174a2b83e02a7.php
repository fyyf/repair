<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="zh-CN"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>用户管理</title>

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
	#add_technician{
		max-width: 300px;
		margin: 0 auto;
	}
	#add_technician p{
		font-size: 16px;
	}
	#error_email{
		font-size: 16px;
		color: red;
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
				<li >
					<a href="index.html">
					<i class="icon-home"></i> 
					<span class="title">HOME</span>
					</a>
				</li>
				<li class="active start ">
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

		<!-- Modal技术员 -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ></button>
                <h3 class="modal-title" id="myModalLabel">添加技术员</h3>
              </div>
              <div class="modal-body">
                <div id="add_technician">
                <p id="staff_name"></p>
                <p id="staff_phone"></p>
                <input type="hidden" id="user_id" value="">
                <p>邮箱：<input class="form-control"  type="email" name="email" id="email" required="required">
                <div id="error_email">!邮箱不能为空</div></p>
                <p><button class="btn red" type="button" id="submit_technician">添  加</button></p>
                </div>            
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Modal管理员 -->
        <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ></button>
                <h3 class="modal-title" id="myModalLabel">添加管理员</h3>
              </div>
              <div class="modal-body">
                <div id="add_technician">
                <p id="admin_name"></p>
                <p id="admin_phone"></p>
                <input type="hidden" id="user_id_admin" value="">
                <p>邮箱：<input class="form-control"  type="email" name="email" id="email_admin" required="required">
                <div id="error_email2">!邮箱不能为空</div></p>
                <p>密码：<input class="form-control"  type="password" name="password" id="password" required="required">
                <div id="error_password">!密码不能为空</div></p>
                <p><button class="btn red" type="button" id="submit_admin">添  加</button></p>
                </div>            
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN PAGE CONTAINER-->        
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							用户管理 
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.html">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="#">用户管理</a>
								<i class="icon-angle-right"></i>
							</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->          
				<div class="row-fluid">
				<p align="center" id="errormsg" class="alert alert-success" style="display:none; font-size:16px; font-weight:bold;"></p>
					<div class="span9">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box red">

							<div class="portlet-title">

								<div class="caption"><i class="icon-cogs"></i>用户管理</div>
								<div class="tools">
									<a href="javascript:;" class="reload"></a>
								</div>

							</div>

							<div class="portlet-body">


								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">

									<thead>

										<tr>
											<tr>
											<th width="30%">姓名</th>
											<th width="30%">手机号码</th>
											<th>组别</th>
										</tr>

										</tr>

									</thead>

									<tbody>
                             <?php if(is_array($user_list)): foreach($user_list as $key=>$vo): ?><tr>											
											<td><?php echo ($vo["name"]); ?></td>
											<td><?php echo ($vo["phone"]); ?></td>
											<td>
											<div>
												<select userid="<?php echo ($vo["user_id"]); ?>" username="<?php echo ($vo["name"]); ?>" userphone="<?php echo ($vo["phone"]); ?>" cs="user_group" class="select2-container m-wrap small" >
													<option <?php if($vo['type']==0){echo selected;} ?> value="0">普通用户</option>
													<option <?php if($vo['type']==1){echo selected;} ?> value="1">会员用户</option>
													<option <?php if($vo['type']==2){echo selected;} ?> value="2">技术员</option>
													<option <?php if($vo['type']==3){echo selected;} ?> value="3">管理员</option>
												</select>
											</div>
											</td>
										</tr><?php endforeach; endif; ?>
									</tbody>

								</table>

							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>
					<div class="span3">

						<div class="portlet box grey">

							<div class="portlet-title">

								<div class="caption"><i class="icon-comments"></i></div>

							</div>

							<div class="portlet-body fuelux">

								<label>
								<form method="get" action="/repair/index.php/Home/Admin/user_search">
									<input type="text" name="key" class="m-wrap small">
									<button type="submit" class="btn grey"><i class="icon-search"></i></button>
									</form>
								</label>

								<table class="table table-striped table-bordered table-hover table-full-width dataTable" align="center">
									
									<tr><td><a href="/repair/index.php/Home/Admin/user/">全部</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/user/type/user">普通用户</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/user/type/vip">会员用户</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/user/type/staff">技术员</a></td></tr>
									<tr><td><a href="/repair/index.php/Home/Admin/user/type/admin">管理员</a></td></tr>
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

		 //  TableEditable.init();

		});

	</script>




<script type="text/javascript">

$(document).ready(function() { 

	
	
	$("[cs='user_group']").change(function(){
		
		var new_value=$(this).find("option:selected").val();
		var user_id=$(this).attr('userid');
		var user_name=$(this).attr('username');
		var user_phone=$(this).attr('userphone');
		
		//管理员
		if(new_value==3){	
		$("#admin_name").text('姓名:'+user_name); 
		$("#admin_phone").text('手机:'+user_phone);
		$("#user_id_admin").val(user_id); 
			$("#adminModal").modal();
			$(this).find("option:first").attr("selected",true);//用户如果取消新增则显示之前的选项被选中，而不是新增被选中
	    }
		//技术员
		if(new_value==2){	
		$("#staff_name").text('姓名:'+user_name); 
		$("#staff_phone").text('手机:'+user_phone);
		$("#user_id").val(user_id); 
			$("#myModal").modal();
			$(this).find("option:first").attr("selected",true);//用户如果取消新增则显示之前的find("option:first")选项被选中，而不是新增被选中
	    }
	    //会员
	    if(new_value==1){
	    	$.post("/repair/index.php/Home/Admin/vip_add",{user_id:user_id },function(data){
   				if(data.status==1){
   					$("p#errormsg").html("修改成功!").show(500).delay(2000).hide(500); 

   		//todo
					$("[userid="+user_id+"]").find("option[value=1]").attr("selected",true);

   				}else{
   		  			 alert(data.info);
   		  		$("[userid="+user_id+"]").find("option:first").attr("selected",true);
   					}
   			});
	    }
	        //普通
	    if(new_value==0){
	    	$.post("/repair/index.php/Home/Admin/user_add",{user_id:user_id },function(data){
   				if(data.status==1){
   		//todo
   			$("p#errormsg").html("修改成功!").show(500).delay(2000).hide(500); 

					$("[userid="+user_id+"]").find("option[value=0]").attr("selected",true);

   				}else{
   		  			 alert(data.info);
	$("[userid="+user_id+"]").find("option:first").attr("selected",true);
   					}
   			});
	    }
    });

	$("#error_email").hide();
	$("#error_email2").hide();
    $("#submit_technician").click(function(){
    	var email=$("#email").val();
    	var user_id=$("#user_id").val();
    	if(email==""){$("#error_email").show();}
    	else{
	    	$("#submit_technician").text("添加中...");
	    	$.post("/repair/index.php/Home/Admin/staff_add",{email:email,user_id:user_id },function(data){
   				if(data.status==1){
   					$("#email").val('');
					$("#submit_technician").text("添加成功");
					$("#myModal").modal('hide');
					$("[userid="+user_id+"]").find("option[value=2]").attr("selected",true);
					$("#submit_technician").text("添 加");
   				}else{
   		   			alert(data.info);
   		   			$("#submit_technician").text("添 加");
   				}
  			});
    	}
    });


	$("#error_password").hide();
    $("#submit_admin").click(function(){
    	var password=$("#password").val();
    	var user_id=$("#user_id_admin").val();
    	var email=$("#email_admin").val();
    	if(password==""){$("#error_password").show();}
    	if(email_admin==""){
$("#error_email2").show();
    	}
if(password!="" && email_admin!=""){
	    	$("#submit_admin").text("添加中...");
	    	$.post("/repair/index.php/Home/Admin/admin_add",{email:email,password:password,user_id:user_id },function(data){
   				if(data.status==1){
   					$("#password").val('');
   					$("email_admin").val('');
					$("#submit_admin").text("添加成功");
					$("#adminModal").modal('hide');
					$("[userid="+user_id+"]").find("option[value=3]").attr("selected",true);
					$("#submit_admin").text("添 加");
   				}else{
   		   			alert(data.info);
   		   			$("#submit_admin").text("添 加");
   				}
  			});
    	}
    });
});
	
</script>
	
</body>
<!-- END BODY -->

</html>