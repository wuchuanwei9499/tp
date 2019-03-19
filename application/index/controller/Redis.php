<?php namespace app\index\controller;
	use think\Controller;
	use think\db;
	class redis extends Controller
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
			$obj =M('student');
			$row = $obj->order('rand()')->find();
		//	$this->row = $row;
		}
		public function redis(){
			
		}
		public function update(){
			$arr = I('post.');
			$redis= new \Redis();
			$flag = $redis->connect('127.0.0.1',6379,30);
			$res=$redis->hset('student','e_name','张三');
			$res2 = $redis->hSetNx('student','e_name','张三');
			$res = $redis->hget('student','e_name');
			dump($res);
			dump($res2);
		}
	}