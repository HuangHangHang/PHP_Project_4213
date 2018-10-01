<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function login(){
        if(IS_POST){
            $code   = I('code');
            $verify = $this->check_verify($code);
            if(!$verify){
                $res['status']  = 0;
                $res['message'] = '验证码错误!';
                $this->ajaxReturn($res);
            }
            //检测用户名和密码是否正确
            $username = I("username",'','trim');
            $password = I("password",'','md5');
            $admin    = M("admin")->where(array("username"=>$username))->find();
            if(!$admin || md5($admin['password']) != $password){
                $res['status']  = 0;
                $res['message'] = '用户名或者密码错误!';
                $this->ajaxReturn($res);
            }else{
                $data = array(
                    "loginip"  =>get_client_ip(),
                    "logintime"=>date("Y-m-d H:i:s"),
                );
                M("admin")->save($data);
                session('admin_id',$admin["id"]);
                session('admin_username',$admin["username"]);
                $res['status']  = 1;
                $res['message'] = '登录成功!';
                $this->ajaxReturn($res);
            }
        }else{
            //判断session是否存在，session存在不需登录，直接跳转
            if(session('admin_id') || session('admin_username')){
                $this->redirect("Admin/Datalist/lists");
            }else{
                $this->display();
            }
        }
    }

    public function verify(){
        $config =    array(
            'fontSize' => 15,
            'length'   => 4,
            'useNoise' => false, // 关闭验证码杂点
            'imageW'   => 108,
            'imageH'   => 42,
            'codeSet'  => '0123456789',//随机产生0-9中的数字
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function checkLogin(){
        $code     = I('code');               	//接收验证码
        $verify   = $this->checkCode($code);	//调用checkCode方法
        if(!$verify){
            $res['status']  = 0;
            $res['message'] = '验证码错误!';
            $this->ajaxReturn($res);
        }
        $data = I("POST.");
        $username=trim($data["username"]);  //接收用户名，并且使用trim函数去除首尾空格
        $password =md5($data["password"]);  //接收密码，并且使用md5函数加密 md5($data["password"]),无法使用
        $return   = $this->checkPassword($username,$password);
        if(!$return){
            $res['status']  = 0;
            $res['message'] = '用户名或者密码错误!';
            $this->ajaxReturn($res);
        }else{
            $data = array(
                "loginip"  =>get_client_ip(),      //获取ip地址 --->localhost  0.0.0.0   ---127.0.0.1
                "logintime"=>date("Y-m-d H:i:s"),  //记录登录日期
            );
            M("admin")->where(array('id' => 1))->save($data);                 //更新数据库字段
            session('admin_id', $return["id"]);     //将admin_id存入session
            session('admin_username', $return["username"]); //将admin_username存入session
            $res['status']  = 1;
            $res['message'] = '登录成功!';
            $this->ajaxReturn($res);
       }
    }

    public function checkCode($code){  //生成并检验验证码
        $verify = new \Think\Verify();
        return $verify->check($code);
    }

    public function checkPassword($username,$password){  //验证用户名和密码
        $map['username'] = $username;
        $admin = M('admin')->where($map)->find();
        if(md5($admin['password']) === $password){
            return $admin;
        }else{
            return false;
        }
    }

    public function logout(){  //退出系统，清除session
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_username']);
        $this->redirect("login");
    }

}