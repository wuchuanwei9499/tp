<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
class Students extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询数据.
		$student = Db::name('student')->paginate(8);
		//dump($student);
		//echo 6&5;
		//给页面分配数据
		$this->assign('date',$student);
		return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
		return view();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    
    //save 处理增加数据
    public function save(Request $request)
    {
        //接受数据
        $data = input("post.");
        dump($data);
       //执行数据库插入
       $code=Db::execute("insert into think_student values(null,:e_name,:e_result,:e_profess,:e_address)",$data);
       if($code){
        //跳转
        $this->success('添加成功','/students');
       }
       else {
        $this->error('添加失败');
       }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
       $data = DB::name('student')->where('e_id='.$id)->select();
      $this->assign('date',$data[0]);
      return view();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dump(input());
        $date = Request::instance()->except('_method');
        //dump($date);
        $code = DB::execute('update think_student set e_name=:e_name,e_profess=:e_profess,e_result=:e_result,e_address=:e_address where e_id = :id',$date);
        echo DB::getLastSql();
         if($code){
        //跳转
        $this->success('修改成功','/students');
       }
       else {
        $this->error('修改失败');
       }

    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        $code = DB::execute('delete from think_student where e_id = '.$id);
         if($code){
        //跳转
        $this->success('删除成功','/students');
       }
       else {
        $this->error('删除失败'); 
       }
    }
    //ajax删除数据
    public function ajax_del(){

        $id = input("post.e_id/d");
          $code = DB::execute('delete from think_student where e_id = '.$id);
         if($code){
        $data=[
                'statu'=>'200',
                'info'=>'删除成功'
                ];
       }
       else {
         $data=[
                'statu'=>'400',
                'info'=>'删除失败'
                ];
       }
       return $data;
    }
    //事务机制
    public function shiwu(){
        echo 'asddsad';
       //自动控制事物
      /* DB::tranaction(function()
       {
        Db::table('think_student')->delete(109);
        Db::table('think_student')->deltes();
       });*/
       //出错不会删除
       //手动事务
       Db::startTrans();
      /* try{
            $a = DB::table('think_student')->delete(110);
            if (!$a){
                throw  new\Exception('删除id190没有成功');
            }$b = DB::table('think_student')->delete(160);
            if (!$b){
                throw  new\Exception('删除id160没有成功');
            }
            Db::commit();
            echo "AAAA";

       }catch(\Exception $e){
        echo "BBBB";
        Db::rollback();
        dump($e->getMessage());
       }*/
       $a = DB::table('think_student')->delete(110);
        $b = DB::table('think_student')->delete(160);
                if ($a && $b){
        Db::commit();
                }$b = DB::table('think_student')->delete(160);
                if (!$b){
        Db::rollback();
            }
   }
}
