<?php
class YqhbAction extends CommonAction{
	
	public function index(){
		$yqhb = M('yqhb');
		$res = $yqhb->join("jhzs_hongbao a on jhzs_yqhb.hongbao_id = a.hongbao_id")->join("jhzs_pinpai b on a.pinpai = b.pinpai_id")->select();
		$this->assign("yqhb",$res);
		$this->display();	
	}
	
	public function shiyong($id){
		$yqhb = M('yqhb');
		$res = $yqhb->save(array('yqhb_id'=>$id,'zhuangtai'=>1,'sytime'=>time()));
		if ($res){
			$this->success("红包已使用！");
		}else {
			$this->error("抱歉，请稍后重试！");
		}
	}
	
}