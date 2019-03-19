<?php
namespace app\index\controller;
use think\Controller;
class Ajax extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function GetAppKey($packagename, $aa)
    {
        echo md5($packagename);
    }

}

