<?php
	function is_user($weixin_key,$field='weixin_key'){
		$a=M('user');
		$b=$a->where(array($field=>$weixin_key))->find();
		if(empty($b['user_id'])){
			return false;
		}else{
			//return $b['user_id'];
			return $b;
		
		}
	}

	function is_login(){
		if(session('user_id')){
			return ture;
		}else{
			return false;
		}
	}
	function sendmail($title,$content,$email){
		//todo
		return true;
	}
	function is_localhost(){

global $ip;
if (getenv("HTTP_CLIENT_IP"))
$ip = getenv("HTTP_CLIENT_IP");
else if(getenv("HTTP_X_FORWARDED_FOR"))
$ip = getenv("HTTP_X_FORWARDED_FOR");
else if(getenv("REMOTE_ADDR"))
$ip = getenv("REMOTE_ADDR");
else $ip = "Unknow";
if($ip=='127.0.0.1'){
return true;
}else{
	return false;
}

	}
	function is_admin_login(){
		if(session('user_id') && session('admin_id') && (session('type')==3)){
			return true;
		}else{
			return false;
		}
	}
	function not_login($from_url=''){
$not_login_with_weixin_key_url='http://localhost/repair/index.php/Home/Index/index/weixin_key/'.time();
			redirect($not_login_with_weixin_key_url);
		}
function not_admin_login($from_url=''){
$not_login_admin_with_weixin_key_url='http://localhost/repair/index.php/Home/Account/admin_login/';
			redirect($not_login_admin_with_weixin_key_url);
		}

	 function login($weixin_key){
		
			$a=is_user($weixin_key);
	
			if($a){
				$user_id=$a['user_id'];
				$type=$a['type'];
				session('user_id',$user_id);
				session('type',$type);

			
				if($_SESSION['type']==3){
                  $b=M('admin');
					$admin_map['user_id']=$user_id;
					$c=$b->where($admin_map)->find();
					session('admin_id',$c['admin_id']);
					redirect(U('/Home/Admin/index'));
				}elseif($_SESSION['type']==2){
					$b=M('staff');
					$staff_map['user_id']=$user_id;
					$c=$b->where($staff_map)->find();
					session('staff_id',$c['staff_id']);
					redirect(U('/Home/Index/staffnot'));
					
				}else{
					redirect(U('/Home/Index/index'));					
				}
			}else{
				redirect(U('/Home/Account/register?weixin_key='.$weixin_key));
			}
		}

?>