<?php
namespace Admin\Controller;
use Think\Controller;

class DatalistController extends BaseController {
    /**
     * 列表
     */
    public function lists(){
        $keyword = I('keyword','','trim');      //过滤开头结尾空格
        if($keyword){
            $map['title'] = array('like',"%$keyword%");//模糊查询
            $this->assign('keyword',$keyword);  //输出数据
        }
        $low_level = M('datalist');
        $count  = $low_level->where($map)->count();
        $row    = 10;
        $Page   = new \Think\Page($count,$row);
        $show   = $Page->show();
        $datalists = $low_level->where($map)->order('sort desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign('page',$show);
        $title  = '数据管理';
        $this->assign('title',$title);
        $this->assign('datalists',$datalists);
        $this->assign("count",$count);
        $this->display();
    }

    /**
     * 新增
     */
    public function add(){
        $datalist = M('datalist');
        if(IS_POST){
            $data = I('post.');
            $res  = $datalist->add($data);
            if($res){
                $this->success('操作成功',U('lists'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $map['id']  = I('id',0,'int');
            $datalist   = $datalist->where($map)->find();
            $high_level = M('high_level')->select();
            $this->assign('data',$datalist);
            $this->assign('high_level',$high_level);
            $this->display();
        }
    }

    /***
     * 编辑
     */
    public function edit(){
        if(IS_POST){
            $map['id'] = I('id',0,'int');
            $data = I('post.');
            $res  = M('datalist')->where($map)->save($data);
            if($res !== false){
                $this->success('编辑成功',U('lists'));
            }else{
                $this->error('编辑失败');
            }
        }else{
            $map['id'] = I('id',0,'int');
            $datalist  = M('datalist')->where($map)->find();
            $high_level   = M('high_level')->select();
            $middle_level = M('middle_level')->where(array('high_id'=>$datalist['high_id']))->select();
            $elementary_level = M('elementary_level')->where(array('middle_id'=>$datalist['middle_id']))->select();
            $this->assign('data',$datalist);
            $this->assign('high_level',$high_level);
            $this->assign('middle_level',$middle_level);
            $this->assign('elementary_level',$elementary_level);
            $this->display();
        }
    }


    /**
     * 单选删除
     */
    public function delete(){
        $map['id']    = $high_id = I('id',0,'int');
        $middel_level = M('middle_level')->where(array('high_id'=>$high_id))->select();
        if($middel_level){
            $message = '请先删除该高级分类下的中级分类';
            $this->ajaxReturn($message);
        }
        $res = M('high_level')->where($map)->delete();
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
        //判断该高级分类下是否有中级分类
        $where['high_id'] = array('in',$ids);
        $middel_level     = M('middle_level')->where($where)->select();
        if($middel_level){
            $message = '请先删除该高级分类下的中级分类';
            $this->ajaxReturn($message);
        }
        //删除所有选中高级分类
        $map['id']  = array('in',$ids);
        if(M('high_level')->where($map)->delete()){
            $message   = '删除成功';
        }else {
            $message   = '删除失败';
        }
        $this->ajaxReturn($message);
    }

    /**
     * 获取中级分类信息
     */
    public function get_middle_info(){
        $map['high_id'] = I('high_id',0,'int');
        $middle = M('middle_level')->where($map)->field('id,middle_name')->select();
        $option = '';
        foreach($middle as $vo){
            $option.='<option value='.$vo['id'].'>'.$vo['middle_name'].'</option>';
        }
        echo $option;
    }

    /**
     * 获取初级分类信息
     */
    public function get_elementary_info(){
        $map['middle_id'] = I('middle_id',0,'int');
        $middle = M('elementary_level')->where($map)->field('id,elementary_name')->select();
        $option = '';
        foreach($middle as $vo){
            $option.='<option value='.$vo['id'].'>'.$vo['elementary_name'].'</option>';
        }
        echo $option;
    }


}