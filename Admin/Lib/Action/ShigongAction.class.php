<?php
class ShigongAction extends CommonAction{
	public function index(){
		$shigong = M('Shigong');
		$res = $shigong->select();
		$this->assign("shigong",$res);
		
		
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function addok(){
		$data = $_POST;
		$shigong = M('Shigong');
		$res = $shigong->add($data);
		if ($res){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
	}
	public function edit($id){
		$shigong = M('Shigong');
		$res = $shigong->select($id);
		$this->assign("shigong",$res[0]);
		$this->display();
	}
	public function editok(){
		$data = $_POST;
		$shigong = M('Shigong');
		$res = $shigong->save($data);
		if ($res){
			$this->success("修改成功");
		}else{
			$this->error("修改失败");
		}
	}
}