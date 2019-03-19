<?php

namespace app\index\model;

use think\Model;

class think_student extends Model
{
    //使用数组链接
	protected $connection=[
				'type'           => 'mysql',
				'hostname'       => '127.0.0.1',
				'database'       => 'test_php',
				'username'       => 'root',
				'password'       => 'root',
				'hostport'       => '3306'
			];
}
