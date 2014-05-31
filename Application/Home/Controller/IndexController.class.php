<?php
	namespace Home\Controller;
	use Think\Controller;

	
	class IndexController extends BaseController {

    	public function index(){
           
           if(!BaseController::checkComputer($this->user_id)){
       
                redirect(U("/Home/Index/registerpc"));
           }
           if(BaseController::checkOrder($this->user_id)){
                //有订单尚未完成维修，接下来将跳转至【我的订单】';
                redirect(U("/Home/Index/order"));
           }

    		$a=M('userextend');
    		$map['user_id']=$this->user_id;
    		$userextend=$a->where($map)->find();
           $b=M('computer');
    		$this->assign('user',$userextend);
    		$computer=$b->where($map)->order('time desc')->select();
            $this->assign('computer_list',$computer);
            $c=M('user');
            $user=$c->where($map)->find();
            $this->assign('type',$user);
    		$this->display();
    	}



    	public function registerpc(){
			if(IS_POST){
    			$a=M('computer');
            	$data['user_id']=$this->user_id;
            	$data['brand']=$_POST['brand'];
            	$data['model']=$_POST['model'];
            	//$data['buy_time']= mktime(0, 0, 0, 0, 0, $_POST['buy_time']);//
                if(strlen($_POST['buy_time'])<6)$this->ajaxReturn(array('status'=>-1),'JSON');
                $data['buy_time'] = strtotime(substr($_POST['buy_time'].'11111111', 0,8));

                if($data['buy_time']<strtotime('20050101')||$data['buy_time']>time()){
                    $this->ajaxReturn(array('status'=>-2),'JSON');
                }
            	$data['time']=time();//用户增加电脑时间
            	$computer=$a->add($data);
            	if($computer){
            		$map['computer_id']=$computer;
            		$info=$a->where($map)->find();
            		$data['brand']=$info['brand'];
            		$data['model']=$info['model'];
            		$data['buy_time']=date('Y年m月',$info['buy_time']);
            		$data['status']=1;
            		$data['info']='add computer info success';
            		$data['computer_id']=$computer;
            		$this->ajaxReturn($data,'JSON');
                }else{
                	$data['status'] = 0;
                	$data['info'] = 'add computer info error';
                	$this->ajaxReturn($data,'JSON');
                }
            }else{
        	   $this->display();
            }  	
        }

	    public function handle(){
	    	if(IS_POST){
                $a=M('order');
                $data_order['number']=date('YmdHis');
                $data_order['user_id']=$this->user_id;
                $data_order['time']=time();
                $data_order['vip']=$this->type;
                $data_order['computer_id']=$_POST['computer_id'];
                $order=$a->add($data_order);
                if($order){
                    $b=M('orderextend');
                    $data_extend['order_id']=$order;
                    $data_extend['description']=$_POST['description'];
                    $orderextend=$b->add($data_extend);
                    if($orderextend){
                        $data['status']=1;
                        $this->ajaxReturn($data,'JSON');
                    }else{
                        $data['status']=0;
                        $this->ajaxReturn($data,'JSON');
                    }
                }
	    	}else{
	    	  redirect(U('/Home/Index/index'));
	    	}
    	}

         public function set(){
            /*修改个人信息*/
            $a=M('userextend');
            $map['user_id']=$this->user_id;
            $userinfo=$a->where($map)->find();
            if(IS_POST){           
                $updata['phone']=$_POST['phone'];
                $updata['name']=$_POST['name'];          
                $userextend=$a->where($map)->save($updata);
                if($userextend){
                    $data['status']=1;
                    $data['info']='修改成功!';
                    $this->ajaxReturn($data,'JSON');
                }else{
                    $data['status']=0;
                    $data['info']='修改失败!';
                    $this->ajaxReturn($data,'JSON');                   
                }
            }else{
                $this->assign('user',$userinfo);
                $this->display();
            }
        }

    	public function order(){
          
            $a=M('order');
            $map_order['user_id']=$this->user_id;
            $order=$a->where($map_order)->order('time desc')->select();
            $count=$a->where($map_order)->count('order_id');
            foreach ($order as $key => $value) {
                $b=M('staff');
                $map_staff['staff_id']=$value['staff_id'];
                $staff=$b->where($map_staff)->find();
                if($staff){
                    $c=M('userextend');
                    $map_userextend['user_id']=$staff['user_id'];
                    $userextend=$c->where($map_userextend)->find();
                    $d=M('computer');
                    $map_computer['computer_id']=$value['computer_id'];
                    $computer=$d->where($map_computer)->find();
                    //dump($computer);
                    $e=M('orderextend');
                    $map_orderextend['order_id']=$value['order_id'];
                    $orderextend=$e->where($map_orderextend)->find();
                    $info[$key]=array_merge($value,$userextend,$computer,$orderextend);
                }else{
                    $d=M('computer');
                    $map_computer['computer_id']=$value['computer_id'];
                    $computer=$d->where($map_computer)->find();
                    $e=M('orderextend');
                    $map_orderextend['order_id']=$value['order_id'];
                    $orderextend=$e->where($map_orderextend)->find();
                    $info[$key]=array_merge($value,$computer,$orderextend);
                }                      
            }
           $this->assign('info',$info);
            $this->assign('count',$count);
            $this->display();  
        }


        public function staffnot(){
            if(isset($_GET['p'])){
    $p=$_GET['p'];
}else{
    $p='1';
}
if(isset($_GET['pagecount'])){
    $pagecount=$_GET['pagecount'];
}else{
    $pagecount='20';
}
            $a=M('order');
            $map_order['staff_id']=$_SESSION['staff_id'];
            $map_order['status']=array('in','1,3');
            $order=$a->where($map_order)->page($p.','.$pagecount)->order('time desc')->select();
            $map_count_not['staff_id']=$_SESSION['staff_id'];
            $map_count_not['status']=array('in','1,3');
            $count_not=$a->where($map_count_not)->count('status');
            $this->assign('count_not',$count_not);
            $map_count_has['staff_id']=$_SESSION['staff_id'];
            $map_count_has['status']=4;
            $count_has=$a->where($map_count_has)->count('status');
            $this->assign('count_has',$count_has);
            foreach ($order as $key => $value) {
                $b=M('userextend');
                $map_userextend['user_id']=$value['user_id'];
                $userextend=$b->where($map_userextend)->find();
                $c=M('computer');
                $map_computer['computer_id']=$value['computer_id'];
                $computer=$c->where($map_computer)->find();
                $d=M('orderextend');
                $map_orderextend['order_id']=$value['order_id'];
                $orderextend=$d->where($map_orderextend)->find();
                $info[$key]=array_merge($value,$userextend,$computer,$orderextend);
            }

    $count      = $a->where($map_count_has)->count();// 查询满足要求的总记录数
    $Page       = new \Think\Page($count,$pagecount);// 实例化分页类 传入总记录数和每页显示的记录数
    $show       = $Page->show();// 分页显示输出
    $this->assign('page',$show);// 赋值分页输出       
            $this->assign('info',$info);
            $this->display();
        }

        public function staffhas(){
            $a=M('order');
            $map_order['staff_id']=$_SESSION['staff_id'];
            $map_order['status']=4;
            $order=$a->where($map_order)->order('time desc')->select();
            $map_count_has['staff_id']=$_SESSION['staff_id'];
            $map_count_has['status']=4;
            $count_has=$a->where($map_count_has)->count('status');
            $this->assign('count_has',$count_has);
            $map_count_not['staff_id']=$_SESSION['staff_id'];
            $map_count_not['status']=array('in','1,3');
            $count_not=$a->where($map_count_not)->count('status');
            $this->assign('count_not',$count_not);
            foreach ($order as $key => $value) {
                $b=M('userextend');
                $map_userextend['user_id']=$value['user_id'];
                $userextend=$b->where($map_userextend)->find();
                $c=M('computer');
                $map_computer['computer_id']=$value['computer_id'];
                $computer=$c->where($map_computer)->find();
                $d=M('orderextend');
                $map_orderextend['order_id']=$value['order_id'];
                $orderextend=$d->where($map_orderextend)->find();
                $info[$key]=array_merge($value,$userextend,$computer,$orderextend);
            }
            $this->assign('info',$info);
            $this->display();
        }
        

    }
?>