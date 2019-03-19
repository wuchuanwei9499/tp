<?php
	namespace app\index\controller;
	use think\Db;
	use think\Controller;
	class UserInfo
	{
		 public function index(){
			 return "我是前台UserInfo控制器中的index";
		 }
		 public function select(){
			$data = Db::table('tb_user')->select();
			print_R($data);
		}
	}
?>