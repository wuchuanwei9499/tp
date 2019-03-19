<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/

use think\Route;
//静态路由
//路由的基本形式
/*Route::rule('test','index/index/test');
Route::rule('/','index/index/index');

//带参数路由
Route::rule('course/:id','index/index/course');
//Route::rule('time/:year/:month','index/index/shijian');
Route::rule('time/:year/[:month]','index/index/shijian');
//全动态路由,不建议使用
//Route::rule(':a/:b','index/index/dongtai');
Route::rule('test1$','Index/index/test1');
//带额外的参数
Route::rule('test2','Index/index/test2?id=10&name="张三"','get');
//设置路由的请求方式
	//默认支持所有请求方式
//Route::rule('type','Index/index/type','get');
Route::get('type','Index/index/type');
//支持post请求方式
//Route::rule('type','Index/index/type','post');
//Route::post('type','Index/index/type');
//同时支持get和post
//Route::rule('type','Index/index/type','get|post');
//支持所有:
	//Route::rule('type','Index/index/type','*');
	//Route::any('type','Index/index/type');
//支持put
	//Route::rule('type','Index/index/type','put');
	Route::put('type','Index/index/type');
	//支持delete
	Route::rule('type','Index/index/type','delete');
	Route::delete('type','Index/index/type');*/
	
//动态批量注册路由
	/*Route::rule([
		"test"=>'index/index/test',
		"course/:id"=>"index/index/course"
		],'','get');*/
	/*Route::get([
		"test"=>'index/index/test',
		"course/:id"=>"index/index/course"
	]);*/
//使用配置文件批量注册
	/*return ["test"=>'index/index/test',
		"course/:id"=>"index/index/course"];*/
//变量规则
//Route::rule("course/:id",'index/index/course','get',[],['id'=>'\d{1,3}','name'=>'\w+']);

//路由参数
//Route::rule("course/:id",'index/index/course','get',['method'=>'get','ext'=>'html'],['id'=>'\d{1,3}','name'=>'\w+']);
//请求方式必须是get
//路由参数ext,设置路由的后缀.html
//	Route::resource('blog','index/Blog/index');

// 声明快捷路由:
//Route::controller('blog','Index/Blog/a');
Route::resource('students','index/students');
	

	
	




