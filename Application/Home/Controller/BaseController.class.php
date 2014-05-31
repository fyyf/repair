<?php
	namespace Home\Controller;
	use Think\Controller;

	class BaseController extends Controller{
		public $user_id;
		public $type;
		public $not_login_with_weixin_key_url='http://baidu.com';

		public function _initialize(){
			
	if(is_login()){
				$this->user_id=session('user_id');
				$this->type=session('type');			
			}elseif(empty($_GET['weixin_key'])){
				not_login();
			}else{
				login($_GET['weixin_key']);
			}
		}



        public static function checkOrder($user_id){
        	$a=M('order');
        	$order=$a->where(array('user_id'=>$user_id))->order('time desc')->find();
        	//$order=$a->where(array('user_id'=>$user_id))->select();
        	if( (!empty($order)) && ($order['status']==0 || $order['status']==1 || $order['status']==3 ||$order['status']==5)){
        		return true;//用户有订单，尚未完成维修
        	}else{
        		return false;
        	}
        }



		public function login($weixin_key){

			$a=is_user($weixin_key);
			if($a){
				$user_id=$a['user_id'];
				$type=$a['type'];
				session('user_id',$user_id);
				session('type',$type);
			
				if($_SESSION['type']==3){
					redirect(U('/Home/Index/admin'));
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

		
        public static function checkComputer($user_id){
            $a=M('computer');
            $computer=$a->where(array('user_id'=>$user_id))->find();
            if(!!$computer){
                return true;
            }else{
                return false;
            }
        }

		public function not_login($from_url=''){
			redirect($this->not_login_with_weixin_key_url);
		}

		public function login_url(){
			//Todo
		
			//$url='';
			//return $url;
		}
	}
?>