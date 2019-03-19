<?php
	namespace app\index\controller;
	use think\Controller;
	use think\Db;
	use think\Session;
	use lib\myClass;
	class Student extends controller
	{
		public function index(){
			$this->assign('title',"成绩查询");
			return $this->fetch('index');
		}
		public function check(){
			if($_POST['act']!='登录')
			{
				$str = "<script>";
				$str.= "alert('您不是登录提交的请重新登录');";
				$str.= "location.href='".URL("Studen0905/index")."';";
				$str.= "</script>";
				echo $str;
			}
			else
			{
				$code = trim($_POST['code']);
				if(!captcha_check($code))
				{
						$str = "<script>";
						$str.= "alert('验证码错误');";
						$str.= "history.back(-1);";
						$str.= "</script>";
						echo $str;
				}
				else
				{
					echo "验证码合法<br>";
					$e_name = trim($_POST['e_name']);
					$res = Db::table('think_student')->where('e_name="'.$e_name.'"')->count();
					if ((int)$res<1)
					{
						$_SESSION['e_name'] = null; 
						$str = "<script>";
						$str.= "alert('非法的学生姓名');";
						$str.= "history.back(-1);";
						$str.= "</script>";
						echo $str;
					}
					else
					{
						$_SESSION['e_name'] = $e_name;
						Session::set('e_name',$e_name);
						$this->assign('e_name',$_SESSION['e_name']);
						return $this->fetch('check');
					}
				}
			}
		}
		private function common() //私有的方法
		{
			session_start();
			$this->checksession();
			$this->assign('e_name',$_SESSION['e_name']);
		}
		private function checksession()
		{
			header("Content-type:text/html;charset=utf-8");
			if(!(Session::has('e_name')))
			{
				$flag ="<script>";
				$flag.="window.alert('非法访问,您的ip已被记录在案,请立刻停止访问');";
				$flag.="window.alert('".$_SESSION['e_name']."');";
				$flag.="location.href='".URL("Student/index")."';";
				$flag.="</script>";
				echo $flag;
				exit();
			}
		}
		public function makeverify(){
			$verify =new\Think\Verify();
			$verify->useImgBg = false;
			$verify->useNoise = false;
			$verify->useCurve= false;
			$verify->fontSize= '15';
			$verify->length = 4;
			$str=$verify->entry();
		}
		public function varifycheck($code){
			$verify =  new \Think\Verify();
			return $verify->check($code);
		}
		public function quit(){
			Session::delete('name');
			$this->redirect("Student/index");
		}
		public function insert(){
			$this->common();
			$this->assign('title','添加记录');
			return $this->fetch();
		}
		public function update(){
			$this->common();
			$this->title='修改记录';
			return $this->fetch();
		}
		public function delete(){
			$this->common();
			$this->title='删除记录';
			return $this->fetch();
		}
		public function select(){
			$this->common();
			$this->title='查询记录';
			return $this->fetch();
		}
		public function getme(){
			$myfun=new myClass();
			echo $myfun->crand();
			//myClass::crand();
		}
	}