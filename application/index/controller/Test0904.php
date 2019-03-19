<?php
	
	namespace app\index\controller;
	use think\Controller;
	class Test0904 extends Controller
	{
		public function index()
		{
			session_start();
			$this->assign('title','后台管理员登录');
			$this->display('index');
			return view();
		}
		public function domain(){
			$domain='Rinuo.com';
			$cha = 'http://panda.www.net.cn/cgi-bin/check.cgi?area_domain='.$domain;
			$fp=file_get_contents($cha,'rb');
			
			$xml=$implemxl_load_string($fp);
			$data=json_decode(json_encode($xml),TRUE);
			$this->assign('name','<h1>^_^</h1>Rinuo');
			
		}
		public function makeVerify()
		{
			$verify =new\Think\Verify();
			$verify->useImgBg = false;
			$verify->useNoise = false;
			$verify->useCurve= false;
			$verify->fontSize= '15';
			$verify->length = 4;
			$str=$verify->entry();
		}
		public function logincheck()
		{
			session_start();
			$code =trim($_POST['u_code']);
			$u_name = trim($_POST['u_name']);
			$u_pass_a = trim($_POST['u_pass_a']);
			$u_pass_b = trim($_POST['u_pass_b']);
			if(!$this->checkCode($code))
			{
				//echo ('验证码--'.$code.'---输入错误!<br>');
				$this->error('验证码--'.$code.'---输入错误!','index',5);
			}
			else
			{
				$obj=M("admin");
				$row = $obj->where("a_name = '".$u_name."'")
						->find();
				$this->u_name = $row['u_name'];
				if(count($row)<1)
				{
					echo "<script>";
					echo "alert('".$u_name."用户名不存在');";
					echo "history.back(-1);";
					echo "</script>";
				}
				else
				{
					if($row['a_pass']!=$u_pass_a)
					{
						echo "<script>";
						echo "alert('密码错误,请重新输入');";
						echo "history.back(-1);";
						echo "</script>";
					}
					else
					{
						$_SESSION['u_name']=$u_name;
						//$this->title = '用户页面';
						//$this->act  ="login";
						echo "<script>";
						echo "location.href='http://127.0.0.1//login.php';";
						echo "</script>";
					}
				}
			}
		}
		public function checkCode($code)
		{
			$verify =  new \Think\Verify();
			return $verify->check($code);
		}
	}