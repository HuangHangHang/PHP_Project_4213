<?php

    /**
     * ��ȡ�ϼ���������
     * @param elementary_id:����id
     * @param middle_id_id:�м�id
     * @return string : �ַ���ʾ�����������-->����-->��װ
     */
    function get_parent_names($id){
        /** ����datalist������ **/
        $data = M('datalist')->where(array('id'=>$id))->find();
        /** ����������м����࣬��ֻ��ʾ�߼����� **/
        if($data['middle_id']){
            /**��ȡ�м��͸߼�������Ϣ**/
            $parent     = get_parent_by_middle_id($data['middle_id']);
            /** ��ȡ����������Ϣ **/
            $elementary = M('elementary_level')->where(array('id'=>$data['elementary_id']))->getField('elementary_name');
            /** ƴ���ַ��� **/
            if($elementary){
                $string = $parent.'-->'.$elementary;
            }else{
                $string = $parent;
            }
        }else{
            /** ��ȡ�߼�������Ϣ **/
            $string  = M('high_level')->where(array('id'=>$data['high_id']))->getField('high_name');
        }
        return $string;
    }

    /**
     * �����м�id��ȡ�м��͸߼�����
     */
    function get_parent_by_middle_id($middle_id){
        /** ��ȡ�м�������Ϣ **/
        $middle = M('middle_level')->where(array('id'=>$middle_id))->field('id,high_id,middle_name')->find();
        /** ��ȡ�߼�������Ϣ **/
        $high   = M('high_level')->where(array('id'=>$middle['high_id']))->getField('high_name');
        $middle_name = $middle['middle_name'];
        /**ƴ���ַ���**/
        if($middle_name){
            $string = $high.'-->'.$middle_name;
        }else{
            $string = $high;
        }
        return $string;
    }

?>