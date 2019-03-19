<?php
namespace app\admin\Controller;

class Adindex
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
		return "asd";
	}
}
