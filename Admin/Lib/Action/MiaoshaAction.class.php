<?php
class MiaoshaAction extends CommonAction{
	public function index(){
		$miaosha = M('miaosha');
		$res = $miaosha ->join("jhzs_product a on jhzs_miaosha.product_id = a.product_id")->select();
		//dump($res);
		$this->assign("miaosha",$res);
		
		$mssz = M('msshezhi');
		$msszid = 1;
		$res = $mssz->select($msszid);
		$this->assign("mssz",$res[0]);
		
		$this->display();
	}
	public function shezhi(){
		$mssz = M('msshezhi');
		$msszid = 1;
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
	public function add(){
		$this->display();
	}
	public function addok(){
		$miaosha=M('miaosha');
		$data = $_POST;
		$res = $miaosha->add($data);
		if ($res){
			$this->success("添加成功！");
		}else{
			$this->error("添加失败！");
		}
	}
	public function edit($id){
		$miaosha = M('miaosha');
		$res = $miaosha->select($id);
		$this->assign("miaosha",$res[0]);
		$this->display();
	}
	public function editok(){
		$data = $_POST;
		$miaosha = M('miaosha');
		$res = $miaosha -> save($data);
		if ($res){
			$this->success("修改成功");
		}else{
			$this->error("修改失败");
		}
		
	}
	public function del($id){
		$res = M('miaosha')->delete($id);
		if($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}