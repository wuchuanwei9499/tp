<?php
	namespace app\index\controller;
	use think\Db;
	use think\Controller;
	class Datebase extends Controller{
		 public function index(){
			
		}
		public function select(){
			//使用系统类
			//$data= Db::query("select * from think_student");
			//带参数的系统类
			$data = Db::query("select * from think_student  where e_id >=? and e_id<= ?",[5,8]);
			dump($data);
			//获取执行的sql语句
			$sql =Db::getLastSql();
			dump($sql);
		}
		public function insert(){
			
		}
		//使用配置文件链接数据库
		public function data(){
			//实例化数据库类
			//$DB = new Db;
			//$date=$DB::table("think_student")->select(); 
			//dump($date);
			/*$Db = Db::connect([
				'type'           => 'mysql',
				'hostname'       => '127.0.0.1',
				'database'       => 'test_php',
				'username'       => 'root',
				'password'       => 'root',
				'hostport'       => '3306',
			]);
			$date=$Db->table("think_student")->select(); 
			dump($date);*/
			$Db=Db::connect("mysql://root:root@127.0.0.1:3306/test_php#utf8");
			$date=$Db->table("think_student")->select();
			dump($date);
		}
		public function data2(){
			//使用模型链接
			//$student = new \app\index\model\think_student;
			//dump($student);
			//dump ($student::all());
			$DB = new Db;
			$student=$DB::name("student")->select();
			/*if ($student->isEmpty()){
			echo "数据集为空";
			}*/
			dump($student);
		}
	}