<?php
	namespace Home\Controller;
	use Think\Controller;

	class 	HandleController extends BaseController {

		public function accept(){
			/*技术员接单*/
			if(IS_POST){	
				$a=M('order');
				$map_order['order_id']=$_POST['order_id'];
				$updata_order['status']=3;
				$updata_order['staff_confirm_time']=time();
				$order=$a->where($map_order)->save($updata_order);
				if($order){
					$data['status']=1;			
					$this->ajaxReturn($data,'JSON');
				}else{
					$data['status']=0;			
					$this->ajaxReturn($data,'JSON');
				}					
			}else{
				redirect('/Home/Index/index');
			}	
		}

		public function refuse(){
			/*技术员拒绝接单*/
			if(IS_POST){	
				$a=M('order');
				$map_order['order_id']=$_POST['order_id'];
				$updata_order['status']=5;
				$updata_order['staff_id']=0;
				$order=$a->where($map_order)->save($updata_order);
				if($order){
					$b=M('staff');
					$map_staff['user_id']=$this->user_id;
					$updata_staff['refuse_order_id']=$_POST['refuse_order_id'];
					$staff=$b->where($map_staff)->save($updata_staff);
					if($staff){
						$data['status']=1;			
						$this->ajaxReturn($data,'JSON');	
					}else{
						$data['status']=0;			
						$this->ajaxReturn($data,'JSON');
					}
				}else{					
					$data['status']=0;			
					$this->ajaxReturn($data,'JSON');
				}
			}else{
				redirect('/Home/Index/index');
			}	
		}
		
	

		public function cancel(){
			/*用户取消订单*/
	    	$order=M('order');
            $map['order_id']=$_POST['order_id'];
            $updata['status']=2;//用户取消订单,status=2
            $a=$order->where($map)->save($updata);
            if($a){
                $data['status']=1;
                $data['info']='取消订单成功!';
                $this->ajaxReturn($data,'JSON');
            }else{
                $data['status']=0;
                $data['info']='取消订单失败!';
                $this->ajaxReturn($data,'JSON');                   
            }            

	    }

        public function complete(){
        	/*用户确认完成订单*/
            $order=M('order');
            $map['order_id']=$_POST['order_id'];
            $updata['status']=4; //用户确认订单已完成,status=4
            $updata['user_confirm_time']=time();
            $a=$order->where($map)->save($updata);
            if($a){
                $data['status']=1;
                $data['info']='确认订单成功!';
                $this->ajaxReturn($data,'JSON');
            }else{
                $data['status']=0;
                $data['info']='确认订单失败!';
                $this->ajaxReturn($data,'JSON');                   
            }
        }


       

	}

?>