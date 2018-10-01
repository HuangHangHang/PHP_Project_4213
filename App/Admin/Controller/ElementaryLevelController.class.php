<?php
namespace Admin\Controller;
use Think\Controller;
class ElementaryLevelController extends BaseController {
    public function lists(){
        $keyword = I('keyword','','trim');
        if($keyword){
            $map['elementary_name'] = array('like',"%$keyword%");
            $this->assign('keyword',$keyword);
        }
        $elementary_level = M('elementary_level');
        $count  = $elementary_level->where($map)->count();
        $row    = 10;
        $Page   = new \Think\Page($count,$row);
        $show   = $Page->show();
        $datalists = $elementary_level->where($map)->order('sort desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign('page',$show);
        $title  = '初级分类管理';
        $this->assign('title',$title);
        $this->assign('datalists',$datalists);
        $this->assign("count",$count);
        $this->display();
    }

    public function add(){
        $elementary_level = M('elementary_level');
        if(IS_POST){
            $data = I('post.');
            $res  = $elementary_level->add($data);
            if($res){
                $this->success('操作成功',U('lists'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $map['id']  = I('id',0,'int');
            $elementary_level = $elementary_level->where($map)->find();
            $high_level = M('high_level')->select();
            $this->assign('data'      ,$elementary_level);
            $this->assign('high_level',$high_level);
            $this->display();
        }
    }

    public function edit(){
        if(IS_POST){
            $data = I('post.');
            $res = M('elementary_level')->where(array('id' => $data['id']))->save($data);
            if($res !== false){
                $this->success('操作成功',U('lists'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $map['id'] = I('id',0,'int');
            $data = M('elementary_level')->where($map)->find();
            $high_level = M('high_level')->select();
            //获取高级类别id
            $high_id = M('middle_level')->where(array('id'=>$data['middle_id']))->getField('high_id');
            //获取中级类别
            $middle_level = M('middle_level')->where(array('high_id'=>$high_id))->select();
            $this->assign('data'        ,$data);
            $this->assign('high_level'  ,$high_level);
            $this->assign('high_id'     ,$high_id);
            $this->assign('middle_level',$middle_level);
            $this->display();
        }
    }

    public function delete(){
        $map['id'] = $elementary_id = I('id',0,'int');
        $datalist = M('datalist')->where(array('elementary_id'=>$elementary_id))->select();
        if($datalist){
            $message = '请先删除该初级分类下的数据';
            $this->ajaxReturn($message);
        }
        $res = M('elementary_level')->where($map)->delete();
        if($res){
            $message = '删除成功';
        }else{
            $message = '删除失败';
        }
        $this->ajaxReturn($message);
    }

    public function delAll(){
        $ids = I('ids',0);
        $where['elementary_id'] = array('in',$ids);
        $datalist = M('datalist')->where($where)->select();
        if($datalist){
            $message = '请先删除该初级分类下的数据';
            $this->ajaxReturn($message);
        }

        $map['id'] = array('in',$ids);
        if(M('elementary_level')->where($map)->delete()){
            $message = '删除成功';
        }else {
            $message = '删除失败';
        }
        $this->ajaxReturn($message);
    }

    public function get_middle_info(){
        $map['high_id'] = I('high_id',0,'int');
        $middle = M('middle_level')->where($map)->field('id,middle_name')->select();
        $option = '';
        foreach($middle as $vo){
            $option.='<option value='.$vo['id'].'>'.$vo['middle_name'].'</option>';
        }
        echo $option;
    }
}