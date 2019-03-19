<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
//use \app\index\controller\User;
//use \app\admin\controller\Adindex;

class Index extends Controller
{
    public function index()
    {
		$data = Db::table('tb_user')->select();
		var_dump($data);
		$this->assign('data',$data);
		//return view();
		//return '<style type="text/css">*{ padding: 0;margin:0;}.think_default_text';
    }
	public function test(){
		return "asd";
	}
	public function course()
	{
		echo input("id");
	}
	public function shijian(){
		echo input('year').'月'.input('month');
	}
	public function dongtai(){
		echo input('a')."".input('b');
	}
	public function test1(){
		echo "我是测试方法tets1";
	}
	public function test2()
	{
		dump(input());
		echo "我是测试方法test2";
	}
	public function type()
	{
		dump(input());
		echo "我是要测试请求类型";
		return view();
	}
	public function diaoyong(){
		//调用前台indexUser控制器
		$model = new \app\index\controller\User;
		echo $model->index();
		echo "<hr>";
		$model = new User;
		echo $model->index();
		echo "<hr>";
		$model = controller('User');
		echo $model->index();
	}
	public function diaoyongs(){
		//调用后台indexUser控制器

		$model = new Adindex;
		echo $model->index();
		echo "<hr>";
		$model = new \app\admin\controller\Adindex;
		echo $model->index();
		echo "<hr>";
		$model = controller('admin/Adindex');
		echo $model->index();
	}
	public function fangfa()
	{
		echo $this->test();
		echo "<hr>";
		echo self::test();
		echo "<hr>";
		echo index::test();
		echo "<br>";
		echo action("test");
	}
	public function fangfas()
	{
		$model= new \app\index\controller\User;
		echo $model->index();
		echo "<hr>";
		echo action('User/select');
	}
	public function fangfa2()
	{
		$model= new \app\admin\controller\Index;
		echo $model->index();
		echo "<hr>";
		echo action('admin/index/index');
	}
	public function getConfig()
	{
		//提取thinkphp/convention.php的命名的东西
		//系统函数
		echo config('name');
		echo "<br>";
		echo config('age');
		echo "<br>";
		echo config('kouhao');
		echo "<br>";
		//系统类提取
		echo \think\Config::get('name');
		dump(config('student.name1'));
	}
}
