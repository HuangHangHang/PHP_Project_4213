<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
       // $this->display();
        $this->redirect('HighLevel/lists');
    }

    public function changePassword(){
        if(IS_POST){
           $old_password = I('old_password','','md5');
           $new_password = I('new_password','','');
           $map['id'] = session('admin_id');
           $admin = M('admin')->where($map)->find();
           //error_log($old_password,'3','errors.log');
           //error_log(md5($admin['password']),'3','errors.log');

           if($old_password === md5($admin['password'])){
               $admin = M('admin')->where($map)->setField('password',$new_password);
               if($admin !== null){
                   $res['status'] = 1;
                   $res['message'] = '更改成功';
                   $this->ajaxReturn($res);
               }else{
                   $res['status'] = 0;
                   $res['message'] = '更改失败';
                   $this->ajaxReturn($res);
               }
           }else{
               $res['status'] = 0;
               $res['message'] = '更新失败，旧密码不正确！';
               $this->ajaxReturn($res);
           }
        }else{
            $this->display();
        }

    }
}