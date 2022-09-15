<?php
class UserModel extends Model{
	protected $_validate = array(
		array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('bumen_id','require','请选择部门！'), //默认情况下用正则进行验证
			array('truename','require','请填写真实姓名！'),
			array('password','require','请输入密码！'),
			
	);
}