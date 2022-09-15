<?php
class HuxingModel extends Model{
	protected $_validate = array(
			array('xiaoqu_id','require','请选择小区'), 
			array('jushi','require','请选择居室'), 
			array('fengge','require','请选择风格'), 
	);
}