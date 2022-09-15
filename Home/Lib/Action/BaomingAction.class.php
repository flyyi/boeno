<?php
class BaomingAction extends Action{
	public function add(){
		$baoming = M('Baoming');
		$data = $_POST;
		$res = $baoming->add($data);
		if($res){
			$this->success("报名成功");
		}else{
			$this->error("报名失败");
		}
	}
	
}