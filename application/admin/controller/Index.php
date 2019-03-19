<?php
	namespace app\admin\Controller;

	use think\Db;
	use think\Controller;
	class Index extends Controller
	{
		public function index()
		{
			echo "我是后台控制器";
		}
		public function select()
		{
			$obj= M("tb_user");
			$row=$obj->select();
			print_R($row);
		}
		public function test(){
			return "我是后台控制器中test";
		}
	}
