<?php
class ClassAction extends CommonAction{
	public function index($id){
		$class = M('class');
		$res = $class->order('paixu')->where('lanmu_id = '.$id)->select();
		$this->assign("classlist",$res);
		$this->assign("lanmu_id",$id);
		$this->display();
	}
	public function add($id){
		$this->assign("lanmu_id",$id);
		$this->display();
	}
	public function addok(){
		$class = M('class');
		$data = I('post.');
		$res = $class->add($data);
		if ($res) {
			$this->success("添加成功！");
		}else{
			$this->error("添加失败！");
		}
	}
	public function edit($id){
		$class = M('class');
		$res = $class->find($id);
		$this->assign("class",$res);
		$this->display();
	}
	public function editok(){
		$class = M('class');
		$data = I('post.');
		$res = $class->save($data);
		if ($res) {
			$this->success("编辑成功！");
		}else{
			$this->error("编辑失败！");
		}
	}
	public function del($id){
		$class = M('class');
		$res = $class->delete($id);
		if ($res) {
			$this->success("删除成功！");
		}else{
			$this->error("删除失败！");
		}
	}
}