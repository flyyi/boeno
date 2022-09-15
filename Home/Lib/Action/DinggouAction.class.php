<?php
class DinggouAction extends Action{
	public function index(){
		$data = $_POST;
		$data['dinggou_time']=time();
		$data['zhuangtai']="未联系";
		if ($data['telphone']=="" || $data['truename']==''){
			$this->error("请填写正确的电话和姓名");
		}
		//已秒
		$miaosha = M('miaosha');
		$resym = $miaosha->where("product_id =".$data['product_id'])->field("yimiao,xiangou")-> select();
		//库存
		$product = M('product');
		$reskc = $product->where("product_id =".$data['product_id'])->field("kucun")->select();
		if ($data['type']==2 && $resym[0]['xiangou']>=$resym[0]['yimiao']+$data['dinggou_num']){
			$dinggou = M('dinggou');
			$res = $dinggou->add($data);
			$tuangou = M('tuangou');
			$tuangou->where("product_id = ".$data['product_id'])->setInc("tuangourenshu",1);
		}else if ($data['type']==1&&$reskc[0]['kucun']>$data['dinggou_num']){
			$dinggou = M('dinggou');
			$res = $dinggou->add($data);
			$product->where("product_id = ".$data['product_id'])->setInc("xiaoliang",$data['dinggou_num']);
			$product->where("product_id = ".$data['product_id'])->setDec("kucun",$data['dinggou_num']);
		}else if ($data['type']==3){
			$dinggou = M('dinggou');
			$res = $dinggou->add($data);
			$miaosha = M('miaosha');
			$miaosha->where("product_id = ".$data['product_id'])->setInc("yimiao",$data['dinggou_num']);
		}
		else{
			$res = false;
		}
		
		if ($res){
			$this->success("订购成功，工作人员将于24小时内与您取得联系！");
		}else{
			$this->error("sorry，你来晚啦，商品已被抢光！");
		}
	}
}