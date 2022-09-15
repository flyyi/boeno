<?php
class BumenAction extends CommonAction{
	public function index(){
		$bumen = M('Bumen');
		$res = $bumen->select();
		$this->assign("bumen",$res);
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function addok(){
		$data = $_POST;
		if(!$data['bumen_name']){
			$this->error("请填写部门名称！");
		}
		$bumen = M('Bumen');
		$res = $bumen->add($data);
		if ($res){
			$this->success("部门添加成功");
		}else{
			$this->error("部门添加失败");
		}
	}
	public function edit($id){
		$res = M('bumen')->select($id);
		$this->assign("bumen",$res[0]);
		$this->display();
	}
	public function editok(){
		$res = M('bumen')->save($_POST);
		if ($res){
			$this->success("修改成功！");
		}else{
			$this->error("修改失败！");
		}
		
	}
	public function del($id){
		$res = M('bumen')->delete($id);
		if ($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}