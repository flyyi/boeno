<?php
class BaomingAction extends CommonAction{
	public function index($type){
		$baoming = M('baoming');
		$res = $baoming->where("type = ".$type)->select();
		$this->assign("baoming",$res);
		$this->display();
	}
	public function del($id){
		$baoming = M('baoming');
		$res = $baoming->delete($id);
		if ($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}