<?php
namespace Admin\Controller;
use Think\Controller;


class HotController extends BaseController {

    public function lists(){
        $keyword = I('keyword','','trim');      
        if($keyword){
            $map['title'] = array('like',"%$keyword%");
            $this->assign('keyword',$keyword);  
        }
        $map['type'] = I('type',0,'int');
        $row   = 10;
        $count = M('hot')->where($map)->count();
        $Page  = new \Think\Page($count,$row);
        $show  = $Page->show();
        $hot   = M('hot')->where($map)->order('sort desc')->limit($Page->firstRow,$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('hot',$hot);
        $this->assign("count",$count);

        $this->display();
    }

    public function add(){
        $hot = M('hot');
        if(IS_POST){
            $data = I('post.');
            $map['id'] = $id = I('id',0,'int');
            /**如果选择图片区，并且上传了新图片,才调用upload()**/
            if(I('type') == 2  ){
                if($_FILES['picture']['tmp_name']){
                    $info  = $this->upload();
                    $data['picture'] = $info['picture']['savepath'].$info['picture']['savename'];
                }
            }else{
                $data['picture'] = ''; //如果选择非图片区，则将picture字段设置为空
            }

            if($id){
                $res = M('hot')->where($map)->save($data);  //编辑
            }else{
                $res = M('hot')->add($data);                //新增
            }
            if($res !== false){
                $this->success('操作成功',U('lists',array('type'=>$data['type'])));
            }else{
                $this->error('操作失败');
            }
        }else{
            $map['id'] = I('id',0,'int');
            $data = $hot->where($map)->find();
            $this->assign('data',$data);
            $this->display();
        }
    }

    /**
     * 单选删除
     */
    public function delete(){
        $map['id']  = I('id',0,'int');
        $res = M('hot')->where($map)->delete();
        if($res){
            $message = '删除成功';
        }else{
            $message = '删除失败';
        }
        $this->ajaxReturn($message);
    }

    /**
     * 全选删除
     */
    public function delAll(){
        $ids        = I('ids',0);
        $map['id']  = array('in',$ids);
        if(M('hot')->where($map)->delete()){
            $message   = '删除成功';
        }else {
            $message   = '删除失败';
        }
        $this->ajaxReturn($message);
    }

    /**
     * 图片上传方法
     * @return array|bool
     */
    public function upload(){
        if(empty($_FILES)){
            $this->error("请选择上传文件！");
        }else{
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   = 3145728 ;// 设置附件上传大小
            $upload->exts      = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
            $upload->savePath  = ''; // 设置附件上传（子）目录
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                return $info;
            }
        }
    }


}
