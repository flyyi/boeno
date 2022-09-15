<?php
class SgcontentAction extends CommonAction{
	public function index($id){
		$sgcontent = M('sgcontent');
		$res = $sgcontent->join("jhzs_shigong a on jhzs_sgcontent.shigong_id = a.shigong_id")->where("jhzs_sgcontent.shigong_id = ".$id)->select();
		$this->assign("sgcontent",$res);
		$this->assign("id",$id);
		
		$this->display();
	}
	public function add($id){
		$shigong = M('shigong');
		$res = $shigong->select($id);
		$this->assign("shigong",$res[0]);
		$this->display();
	}
	public function addok(){
		$sgcontent = M('sgcontent');
		$res = $sgcontent->add($_POST);
		if($res){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
		
	}
	public function edit($id){
		$sgcontent = M('sgcontent');
		$res = $sgcontent->join("jhzs_shigong a on jhzs_sgcontent.shigong_id = a.shigong_id")->where("jhzs_sgcontent.sg_content_id = ".$id)->select();
		$this->assign("shigong",$res[0]);
		$this->display();
	}
	public function editok(){
		$sgcontent = M('sgcontent');
		$res = $sgcontent->save($_POST);
		if($res){
			$this->success("修改成功");
		}else{
			$this->error("修改失败");
		}
	
	}
	public function del($id){
		$sgcontent = M('sgcontent');
		$res = $sgcontent->delete($id);
		if($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
		
	}
}