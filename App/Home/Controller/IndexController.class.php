<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller{
    public function index(){
        //左侧高级分类和中级分类
        $left_array  = $this->get_left_info();
        //右侧中级分类和数据信息
        $right_array = $this->get_right_info();
        //热门网站
        $hot_array = $this->get_hot_info();
        //广告信息
        $ad_array  = $this->get_hot_info($type = 1);
        //图片区
        $pic_array = $this->get_hot_info($type = 2);
        //底部高级分类和数据信息
        $bottom_array = $this->get_bottom_info();

        $this->assign('left_array' ,$left_array);
        $this->assign('right_array',$right_array);
        $this->assign('hot_array'  ,$hot_array);
        $this->assign('ad_array'   ,$ad_array);
        $this->assign('pic_array'   ,$pic_array);
        $this->assign('bottom_array',$bottom_array);
        $this->display();
    }

    /**
     * 根据中级分类id,更多数据信息
     */
    public function more(){
        $map['middle_id'] = I('middle_id',0,'int'); //接受中级分类id
        $elementary_level = M('elementary_level')->where($map)->select();   //查找初级分类
        foreach($elementary_level as $elementary){
            //初级分类数据
            $array = M('datalist')->where(array('elementary_id'=>$elementary['id']))->select();
            //初级分类下的数量
            $count = M('datalist')->where(array('elementary_id'=>$elementary['id']))->count();
            //组装成数组
            $key = $elementary['elementary_name'].'('.$count.')';
            $datalist[$key] = $array;
        }
        $more_info = $datalist;
        $this->assign('more_info',$more_info);
        $this->display();
    }

    /**
     * 获取左部信息
     * @return array:以中级分类为键值的数组
     */
    private function get_left_info(){
        $map['is_display'] = 1;         // 1显示，0关闭
        $map['layout']     = 'left';    //输出左侧数据
        $high_level = M('high_level')->where($map)->order('sort asc')->select();//获取高级分类
        /**获取高级分类下的初级分类**/
        foreach($high_level as $high){
            $array = M('middle_level')->where(array('high_id'=>$high['id']))->select();
            $middle_array[$high['high_name']] = $array;
        }
        return $middle_array;
    }

    /**
     * 获取右侧信息
     */
    private function get_right_info(){
        $middle_level = M('middle_level')->where(array('is_recommend'=>1))->select();
        foreach($middle_level as $middle){
            $array = M('datalist')->where(array('middle_id'=>$middle['id']))->select();
            $datalist[$middle['id']] = $array;
        }
        return $datalist;
    }

    /**
     * 获取热门网址 or 广告位 or 图片区
     * @param int $type 0：热门 1：广告 2：图片
     * @return array ： 数组信息
     */
    private function get_hot_info($type = 0){
        $map['type'] = $type;
        $hot = M('hot')->where($map)->order('sort')->select();
        return  $hot;
    }

    /***
     * 获取底部信息
     */
    private function get_bottom_info(){
        $map['is_display'] = 1;         // 1 显示； 0 不显示
        $map['layout']     = 'bottom';  // 底部
        $high_level = M('high_level')->where($map)->order('id asc')->select();//获取高级分类
        foreach($high_level as $high){
            $where['high_id']      = $high['id'];
            $where['is_recommend'] = 1; //推荐数据
            $array = M('datalist')->where($where)->select(); //获取满足条件的数据列表
            $bottom_array[$high['high_name']] = $array;      //以高级分类名称作为键值
        }
        return $bottom_array;
    }

}