<?php
	namespace app\index\controller;
	use think\Controller;
	class Login extends controller
	{
		 public function index(){
			 //return "我是前台Login控制器中的index";
			 return view('index');
		 }
		 public function check(){
			//dump($_POST);
			$username = $_POST['username'];
			$password = $_POST['password'];
			if ($username=='admin' && $password =='123'){
				
				$this->success('登陆成功',url('index/index'));
			}
			else{
				$this->error('登陆失败',url('Login/index'));
			}
		 }
		 //重定向
		 public function cdx(){
			 $this->redirect('login/index');
		 }
		 public function _empty($abc){
			
		 }
	}