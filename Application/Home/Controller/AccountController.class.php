<?php
	namespace Home\Controller;
	use Think\Controller;

	class AccountController extends Controller{

		public function logout(){
			session(null);
			$this->success('退出成功！',U('Home/Index/index'));
		}
        public function admin_login(){
			if(IS_POST){

				$a=M('admin');
				$admin_map['email']=$_POST['email'];
				$admin_map['password']=md5($_POST['password']);
				$b=$a->where($admin_map)->find();
				
				if($b){
                $user_id=$b['user_id'];
                $c=M('user');
                $user_map['user_id']=$b['user_id'];
                $d=$c->where($user_map)->find();
				$type=$d['type'];
				session('user_id',$user_id);
				session('type',$type);
                session('admin_id',$b['admin_id']);
              
					redirect(U('/Home/Admin/index'));
				}else{

					$this->error('邮箱或密码错误');

				}

			}else{$this->display();
		}
		}
		public function register(){
			if(IS_POST){
				$a=M('user');
				$user_data['weixin_key']=$_POST['weixin_key'];
				$b=$a->add($user_data);
				if($b){
					$c=M('userextend');
					$user_extend_data['user_id']=$b;
					$user_extend_data['name']=$_POST['name'];
					$user_extend_data['phone']=$_POST['phone'];
					$user_extend_data['register_time']=time();
					$d=$c->add($user_extend_data);
					if($d){
						session('user_id',$b);
						session('type','0');
						$data['status']=1;
						$data['info']='add user info successed!';
						$this->ajaxReturn($data,'JSON');
					}else{
						//$data['in']=$_POST['name'];
						$data['status']=0;
						$data['info']='add user info failed!';
						$this->ajaxReturn($data,'JSON');
					}
		
				}else{
					$this->error('系统错误！');
				}
			}elseif(empty($_GET['weixin_key'])){
				$info='未从微信进入';
			}elseif(is_user($_GET['weixin_key'])){
	    		$info='您的微信号已经注册过飞扬报修系统了，接下来将会跳转至一键报修首页';
	    		//跳转程序
	    		//Todo
        		$this->assign('info',$info);
			}else{
			$this->display();	
			}
		}
		

	}
?>