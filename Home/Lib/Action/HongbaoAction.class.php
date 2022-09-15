<?php
class HongbaoAction extends Action{
	public function index(){
		$hongbao = M('hongbao');
		$res = $hongbao->join("jhzs_pinpai a on jhzs_hongbao.pinpai = a.pinpai_id")->select();
    	$this->assign("hongbao",$res);
		
		$this->display('./hongbao');
	}
	public function yqhb(){
		$yqhb = D('Yqhb');
		if (!$yqhb->create()){
			$this->error($yqhb->getError());
		}else{
			$data = $_POST;
			$data['lqtime'] = time();
			$res = $yqhb->add($data);
			if ($res){
				$hongbao = M('hongbao');
				$hongbao->where('hongbao_id='.$data['hongbao_id'])->setInc('yiqianggou',1);
				$this->success("恭喜你，抢红包成功！");
			}else{
				$this->error("红包已发放完毕");
			}
		}
		
	}
}