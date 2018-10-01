<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class MiddleLevelModel extends RelationModel {
    protected $_link = array(
        'high_level' => array(
            'mapping_type' => self::BELONGS_TO, //关联类型
            'foreign_key' => 'high_id',  //外键字段
            'as_fields' => 'high_name',
        ),
    );

}