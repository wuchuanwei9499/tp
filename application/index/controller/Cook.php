<?php
namespace app\index\controller;

use think\Controller;
use think\Cookie;
class Cook extends Controller
{
    public function setCookie()
    {
		Cookie::set('name','允之盟');
		Cookie::set('info','zxc',50);
		cookie('time','2018');
		cookie('age','5',50);
	}
	public function getCookie(){
		dump(Cookie::get('name'));
		dump(cookie('time'));
	}
}