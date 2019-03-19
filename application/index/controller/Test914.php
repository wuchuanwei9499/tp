<?php 
	namespace app\index\controller;
	use think\Controller;
	use think\db;
	class Test914 extends Controller
	{
		
		public function index(){
			
			$redis = new \app\index\model\Redis;
			/*
			while($row = mysql_fetch_assoc($res)){
				$name ='913student'.$row['e_id'];
				$redis->del($name);
				$redis->rPush($name,$row['e_id'],$row['e_name'],$row['e_profess'],$row['e_result'],$row['e_address']);
			}*/
			$arr2 = $redis->lRange('913student1',0,-1);
			var_dump($arr2);
		//	$this->row = $row;
		}
		public function redis(){
			
		}
		public function update(){
		}
	}