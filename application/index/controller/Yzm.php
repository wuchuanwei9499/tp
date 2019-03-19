<?php
namespace app\index\controller;

use think\Controller;
use think\Image;

class Yzm extends Controller
{
    public function index()
    {
		echo "__PUBLIC__";
		return $this->fetch();
		
	}
	public function check()
	{
		$code = input('post.code');
		if(captcha_check($code))
		{
			echo "验证码正确";
		}
		else{
			$this->error();
		}
	}
	public function img()
	{
		$img = Image::open("./image/1.jpg");
		dump($img);
		//$img->water('./image/3.jpg',\think\Image::WATER_NORTHWEST)->save('water_image2.png');
		$img->text('十年磨一剑 - 为API开发设计的高性能框架','1.ttf',20,'#ffffff')->save('text_image.png');
	}
}
