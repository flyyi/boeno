<?php
class DinggouAction extends CommonAction{
	public function index(){
		$dinggou = M('dinggou');
		$res = $dinggou->join("jhzs_product as p on p.product_id = jhzs_dinggou.product_id")->where('jhzs_dinggou.type='.$_GET['type'])->field('jhzs_dinggou.*,p.title,p.product_id,p.lanmu_id')->order('jhzs_dinggou.dinggou_time desc')->select();
		$this->assign("dinggou",$res);
		$this->assign("type",$_GET['type']);
		$this->display();
	}
	
	public function fenlei(){
		$dinggou = M('dinggou');
		$type=$_GET['zhuangtai'];
		switch ($type){
			case 0:			
			$res = $dinggou->where("jhzs_dinggou.zhuangtai = '未联系' and jhzs_dinggou.type=".$_GET['type'])->join("jhzs_product as p on p.product_id = jhzs_dinggou.product_id")->field('jhzs_dinggou.*,p.title,p.product_id,p.lanmu_id')->order('jhzs_dinggou.dinggou_time desc')->select();
			break;
			case 1:			
			$res = $dinggou->where("jhzs_dinggou.zhuangtai = '在跟进' and jhzs_dinggou.type=".$_GET['type'])->join("jhzs_product as p on p.product_id = jhzs_dinggou.product_id")->field('jhzs_dinggou.*,p.title,p.product_id,p.lanmu_id')->order('jhzs_dinggou.dinggou_time desc')->select();
			break;
			case 2:			
			$res = $dinggou->where("jhzs_dinggou.zhuangtai = '已成交' and jhzs_dinggou.type=".$_GET['type'])->join("jhzs_product as p on p.product_id = jhzs_dinggou.product_id")->field('jhzs_dinggou.*,p.title,p.product_id,p.lanmu_id')->order('jhzs_dinggou.dinggou_time desc')->select();
			break;
			case -1:			
			$res = $dinggou->where("jhzs_dinggou.zhuangtai = '已作废' and jhzs_dinggou.type=".$_GET['type'])->join("jhzs_product as p on p.product_id = jhzs_dinggou.product_id")->field('jhzs_dinggou.*,p.title,p.product_id,p.lanmu_id')->order('jhzs_dinggou.dinggou_time desc')->select();
			break;
			default:			
			$res = $dinggou->join("jhzs_product as p on p.product_id = jhzs_dinggou.product_id and jhzs_dinggou.type=".$_GET['type'])->field('jhzs_dinggou.*,p.title,p.product_id,p.lanmu_id')->order('jhzs_dinggou.dinggou_time desc')->select();
			break;
		}
		$this->assign("type",$_GET['type']);
		$this->assign("dinggou",$res);
		$this->display(index);
	}
	
	public function edit($id){
		$dinggou = M('dinggou');
		$res = $dinggou->join("jhzs_product as p on p.product_id = jhzs_dinggou.product_id")->field('jhzs_dinggou.*,p.title,p.product_id,p.lanmu_id')->select($id);
		$this->assign("dinggou",$res[0]);
		$this->display();
	}
	public function editok(){
		$dinggou = M('dinggou');
		$data = $_POST;
		$res = $dinggou->save($data);
		if ($res){
			$this->success("编辑成功");
		}else{
			$this->error("编辑失败");
		}
	}
	public function del($id){
		$dinggou = M('dinggou');
		$res = $dinggou->delete($id);
		if ($res) {
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}