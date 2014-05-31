<?php
namespace Home\Model;
use Think\Model\RelationModel;
class OrderModel extends RelationModel{
    protected $_link = array(
'Computer' => array(
    'mapping_type'  => self::BELONGS_TO,
    'class_name'    => 'Computer',
    'foreign_key'   => 'computer_id',
    'mapping_name'  => 'computer',
   'mapping_fields'=>'brand,model,buy_time',
   'as_fields'=>'brand,model,buy_time',
),
'Orderextend' => array(
    'mapping_type'  => self::BELONGS_TO,
    'class_name'    => 'Orderextend',
    'foreign_key'   => 'orderextend_id',
    'mapping_name'  => 'orderextend',
   'mapping_fields'=>'description',
   'as_fields'=>'description',
),
'Staff' => array(
    'mapping_type'  => self::BELONGS_TO,
    'class_name'    => 'Staff',
    'foreign_key'   => 'staff_id',
    'mapping_name'  => 'staff',
   'mapping_fields'=>'email',
   'as_fields'=>'email',
),
);




}


?>