<?php
	namespace Home\Controller;
	use Think\Controller;

	class AutoController extends Controller{
		public function _initialize(){
	
		if(is_localhost()){
           
		}else{
			dump('不是本机访问');
			exit;
		}
		}



	
//设置技术员的每日最大接机数;
		//参数:max,数字类型,get类型,为每日最大接机数;
	
		public function set_staff_max(){

			if(isset($_GET['max'])){
            $staff_max_data['max']=$_GET['max'];
			}else{
            $staff_max_data['max']=2;
			}
			$a=M('staff');
			$staff_map['status']=0;
			$b=$a->where($staff_map)->select();
			foreach ($b as $k => $v) {
				if($v['max']!=$staff_max_data['max']){
					$staff_set['staff_id']=$v['staff_id'];
				$c=$a->where($staff_set)->save($staff_max_data);
				dump($c);
				if(!$c){
                sendmail('staff_max set error.'.date("Y-m-d H:i"),'error','164773165@qq.com');
                return false;
                exit;
				}	
				}
			
			}
			echo 'success';
			return true;

		}
	}
?>