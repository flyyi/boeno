<?php
class CommonAction extends Action{
	public function __construct(){
		parent::__construct();
		if(!session('username')){
			$this->error("请登录!","/");
		}
	}
}