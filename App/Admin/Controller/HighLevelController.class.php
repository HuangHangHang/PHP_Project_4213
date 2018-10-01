<?php
namespace Admin\Controller;
use Think\Controller;
class HighLevelController extends BaseController {
    public function add(){
        $high_level = M('high_level');
        if(IS_POST){
            $data = I('POST.');
            if($data['id']){
                $res = $high_level->where(array('id' => $data['id']))->save($data);
            }else{
                $res = $high_level->add($data);
            }
            if($res !== false){
                $this->success('操作成功',U('lists'));
            }else{
                $this->error('添加失败');
            }

        }else{
            $map['id'] = $id =I('id',0,'int');
            if($id){
                $high_level = $high_level->where($map)->find();
                $this->assign('data',$high_level);
            }
            $this->display();
        }
    }

    public function lists(){
        $keyword = I('keyword','','trim');
        if($keyword){
            $map['high_name'] = array('like',"%$keyword%");
            $this->assign('keyword',$keyword);
        }
        $high_level = M('high_level');
        //error_log($high_level."\n",'3','errors.log');
        $count = $high_level->count();
        //error_log($count."\n",'3','errors.log');
        $row = 5;
        $Page = new \Think\Page($count,$row);
        $show = $Page->show();
        $datalists = $high_level->where($map)->order('sort desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //error_log($datalists."\n",'3','errors.log');
        $this->assign('page',$show);
        $title = '高级分类管理';
        $this->assign("title",$title);
        $this->assign("count",$count);
        $this->assign('datalists',$datalists);
        $this->display();
    }

    public function delete(){   //删除单条记录
        $map['id'] = $high_id = I('id',0,'int');
        //查找该高级分类下是否有中级分类
        $middel_level = M('middle_level')->where(array('high_id' => $high_id))->select();
        if($middel_level){
            $message = '请先删除该高级分类下的中级分类';
            $this->ajaxReturn($message);
        }
        $res = M('high_level')->where($map)->delete(); //根据id删除指定记录
        if($res){
            $message = '删除成功';
        }else{
            $message = '删除失败';
        }
        $this->ajaxReturn($message);
    }

    public function delAll(){
        $ids = I('ids',0);
        $where['high_id'] = array('in',$ids);
        $middel_level = M('middle_level')->where($where)->select();
        if($middel_level){
            $message = '请先删除该高级分类下的中级分类';
            $this->ajaxReturn($message);
        }

        $map['id'] = array('in',$ids);
        if(M('high_level')->where($map)->delete()){
            $message = '删除成功';
        }else{
            $message = '删除失败';
        }
        $this->ajaxReturn($message);
    }


}