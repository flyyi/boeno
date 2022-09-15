<?php
class YqhbModel extends Model{
	protected $_validate = array(
		array('name','require','请正确填写姓名'),
		array('telphone','number','请正确填写电话号码'),
		array('qq','number','请正确填写QQ'),
	);
}