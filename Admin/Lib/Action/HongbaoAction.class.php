<?php
Class HongbaoAction extends CommonAction{
	public function index(){
		$hongbao = M('hongbao');
		$res = $hongbao->join('jhzs_pinpai a on jhzs_hongbao.pinpai = a.pinpai_id')->field('jhzs_hongbao.*,a.pinpai_name')->select();
		$this->assign("hongbao",$res);		
		$this->display();	
	}
	public function add(){
		//1、得到所有品牌
		$pinpai = M('pinpai');
		$res = $pinpai->select();
		$this->assign("pinpai",$res);
		$this->display();
	}
	public function addok(){
		$hongbao = D('Hongbao');
		if (!$hongbao->create()){
			$this->error($hongbao->getError());
		}
		$data = $_POST;
		$res = $hongbao->add($data);
		if ($res){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
	}
	public function edit($id){
		//1、得到所有品牌
		$pinpai = M('pinpai');
		$res = $pinpai->select();
		$this->assign("pinpai",$res);
		
		//2、获取红包内容
		$hongbao = M('hongbao');
		$res = $hongbao->join("jhzs_pinpai a on jhzs_hongbao.pinpai = a.pinpai_id")->field("jhzs_hongbao.*,a.pinpai_name")->where("jhzs_hongbao.hongbao_id = ".$id)->select();
		$this->assign("hongbao",$res[0]);
		$this->display();
	}
	public function editok(){
		$hongbao = D('Hongbao');
		if (!$hongbao->create()){
			$this->error($hongbao->getError());
		}
		$data = $_POST;
		$res = $hongbao->save($data);
		if ($res){
			$this->success("修改成功");
		}else{
			$this->error("修改失败");
		}
	}
	public function del($id){
		$res = M('hongbao')->delete($id);
		if ($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	public function shezhi(){
		$mssz = M('msshezhi');
		$msszid = 2;
		$res = $mssz->select($msszid);
		$this->assign("mssz",$res[0]);
		$this->display();
	}
	public function shezhiok(){
		$mssz = M('msshezhi');
		$data = $_POST;
		$data['ms_start_time'] = strtotime($data['ms_start_time']);
		$data['ms_end_time'] = strtotime($data['ms_end_time']);
		$res = $mssz->save($data);
		if ($res){
			$this->success("保存成功");
		}else{
			$this->error("保存失败");
		}
	}
}