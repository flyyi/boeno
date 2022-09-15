<?php
class HongbaoModel extends Model{
	protected $_validate = array(
			array('pinpai','require','请选择红包品牌'), 
			array('jine','require','请填写红包面额'), 
			array('price','require','请填写红包售价'), 
	);
}