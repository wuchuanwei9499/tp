<?php
	namespace app\index\controller;
	use think\Db;
	use think\Controller;
	use think\Request;
	use think\Model;
	class Photo extends controller
	{
		 public function index(){
			$this->assign('title','添加图片');
			$this->assign('url','123');
			return $this->fetch();
		}
		public function uploads(Request $request)
		{
			$files=$request->file('photo');
			
			//dump($files);
			$arr=''; 
			$arr = $_POST;
			$count = '';
			foreach($files as $k=>$file){
				$temp = './upload/';
				if($info=$file->move($temp)){
				//	dump($info);
					$count = $k+1;
					$imgtest = $info->getInfo();
					//echo $info->getSaveName().'<br>';
					$temp.=$info->getSaveName();
					$image =\think\Image::open($temp);
					$width = $image->width();
					$height = $image->height();
					//dump($imgtest);
					//echo $imgtest['name'];
					$arr['p_photo'.($k+1).'_name']=$imgtest['name'];
					$arr['p_type'.($k+1)]=$imgtest['type'];
					$arr['p_width'.($k+1)]=$width;
					$arr['p_height'.($k+1)]=$height;
					$mill1=round(($imgtest['size']/1024),2);
					$arr['p_size'.($k+1)]=$imgtest['size'];
					$arr['p_size'.($k+1).'_mill']=$imgtest['size'];
					$arr['p_savepath'.($k+1)]=$temp;
					$arr['p_photo'.($k+1).'_savename']=$info->getSaveName();
				}
				else
				{
					dump($info->getError());
				}
			}
			$arr['p_count']=$count;
			$arr['p_admin']='admin';
			//print_R($arr);
			dump($arr);
			$photo = new\app\index\model\Photo;
			$photo->data($arr);
			$flag = $photo->save();
		}
		public function showimg(){
			$photo = new \app\index\model\Photo;
			$row = $photo->order('p_id','desc')
				  ->limit(1)
				  ->find();
			//dump($row);
			//echo $row['p_savepath1'];
			echo "<img src='".trim($row['p_savepath1'],'.')."'>";
			echo trim($row['p_savepath1'],'.');
			//echo "<img src='/upload/20180907/28cea063f47fe033ec3a64c486b26109.jpg' >";
			$this->assign('url',$row['p_savepath1']);
			$this->assign('title',123);
			return $this->fetch('index');
		}
	}
?>