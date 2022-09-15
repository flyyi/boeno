<?php
class XiaoquAction extends Action{
	public function index(){
		$xiaoqu = M('xiaoqu')->select();
		$this->assign("xiaoqu",$xiaoqu);
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function addok(){
		$xiaoqu = M("xiaoqu");
		$res = $xiaoqu->add($_POST);
		if ($res){
			$this->success("小区添加成功！");
		}else{
			$this->error("小区添加失败！");
		}
	}
	public function edit($id){
		$xiaoqu = M('xiaoqu')->select($id);
		$this->assign("xiaoqu",$xiaoqu[0]);
		$this->display();
	}
	public function editok(){
		$xiaoqu = M('xiaoqu')->save($_POST);
		if ($xiaoqu){
			$this->success("编辑成功！");
		}else{
			$this->error("编辑失败！");
		}
	}
	public function del($id){
		$res = M('xiaoqu')->delete($id);
		if($res){
			$this->success("删除成功！");
		}else{
			$this->error("删除失败！");
		}
	}
}