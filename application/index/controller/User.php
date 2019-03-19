<?php
	namespace app\index\controller;
	use think\Db;
	use think\Controller;
	use think\Request;
	use think\Model;
	class User extends controller
	{
		 protected $connection = [
			// 数据库类型
			'type'        => 'mysql',
			// 服务器地址
			'hostname'    => '127.0.0.1',
			// 数据库名
			'database'    => 'thinkphp',
			// 数据库用户名
			'username'    => 'root',
			// 数据库密码
			'password'    => 'root',
			// 数据库编码默认采用utf8
			'charset'     => 'utf8',
			// 数据库表前缀
			'prefix'      => 'think_',
			// 数据库调试模式
			'debug'       => false,
			];
		 public function index(){
			// return "我是前台User控制器中的index";
			//查询数据
			$data=Db::table('think_student')->paginate(10);;
			//分配数据
			$this->assign('data',$data);
			
			return $this->fetch();
		 }
		 public function test(){
			
			 $user = new User('tudent');
			// 查询单个数据
			$user->where('name', 'thinkphp')
			->find();

		 }
		  

		 public function select(){
			//$data = Db::table('tb_user')->select();
			//print_R($data);
		}
		public function type(Request $request){
			dump($request->isGet());
			dump($request->isPost());
		}
		public function add(){
			return $this->fetch();
		}
		//文件上传的方法
		public function upload(Request $request){
			$file = $request->file('file');
			dump($file);
			//文件上传
			if($info=$file->move('./upload/')){
				//dump($info);
				dump($info->getsaveName());
			}
			else{
				dump($info->getError());
			}
		}
		//多文件上传
		public function adds(){
			return $this->fetch();
		}
		public function uploads(Request $request)
		{
			$files=$request->file('file');
			//dump($files);
			foreach($files as $file){
				if($info=$file->move('./upload/')){
					dump($info);
				}
				else
				{
					dump($info->getError());
				}
			}
		}
		public function model(){
			$student = new\app\index\model\Student;
			//dump($student::get(1));
			$arr = $student::get(1);
			print_R($arr);
		}
	}
?>