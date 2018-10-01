<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/4
 * Time: 13:27
 */

function debug($data){
    if($data){
        echo "<pre>";
        print_r($data);
    }else{
        echo "数据不存在";
    }

}

    function get_cover_url($picture){
        if($picture){
            $url = __ROOT__.'/Uploads/'.$picture;
        }else{
            $url = __ROOT__.'/Uploads/photo.jpg';
        }
        return $url;
    }