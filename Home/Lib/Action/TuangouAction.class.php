<?php
class TuangouAction extends Action{
	public function index(){
		$tuangou = M('tuangou');
		$res = $tuangou->join('jhzs_product as p on p.product_id = jhzs_tuangou.product_id')->select();
		$this->assign('tuangou',$res);
		$this->display('./tuangou');		
	}
	public function info($id){
		//团购商品
		$tuangou = M('tuangou');
		$res = $tuangou->join("jhzs_product as p on p.product_id = jhzs_tuangou.product_id")->join('jhzs_pinpai as b on b.pinpai_id = p.pinpai_id')->where('jhzs_tuangou.tuangou_id='.$id)->select();
		$this->assign("product",$res[0]);
		
		//position
		$position = "<a href=".U('Tuangou/index').">团购</a>&nbsp;>&nbsp;";
		$this->assign("position",$position);
		
		
		//你可能喜欢
		$res2 = $tuangou->join("jhzs_product as p on p.product_id = jhzs_tuangou.product_id")->join('jhzs_pinpai as b on b.pinpai_id = p.pinpai_id')->where('p.price <'.$res[0]['price']*2)->limit(6)->order('p.price desc')->select();
		$this->assign("rementuangou",$res2);
		
		//想要了解的装修知识
		$zxzs = new PublicAction();
		$zxzs->xljzxzs();
		
		$this->display('/tuangou_info');		
	}
		
}