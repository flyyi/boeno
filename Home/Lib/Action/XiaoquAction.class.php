<?php
class XiaoquAction extends Action{
	public function index($id){
		$xiaoqu = M('xiaoqu');
		$where = "jhzs_xiaoqu.lanmu_id =".$id;
		if ($_GET[quyu]){
			$where.=' and jhzs_xiaoqu.quyu = '.$_GET[quyu];
		}
		$res = $xiaoqu->join("jhzs_qu as a on jhzs_xiaoqu.quyu = a.qu_id")->where($where)->field("jhzs_xiaoqu.*,a.name as quname")->order('jhzs_xiaoqu.paixu desc')->select();
		$this->assign("xiaoqu",$res);
		//获取所有区域
		$qu = M('qu');
		$qures = $qu->select();
		$this->assign("qu",$qures);
		
		//热销产品
		$rexiaoproduct = new ZhaowojiaAction();
		$rexiaoproduct->rexiaoproduct();
		
		//想要了解的装修知识
		$zxzs = new PublicAction();
		$zxzs->xljzxzs();
		
		$position = "<a href='/'>首页</a>&nbsp;>&nbsp;小区";
		$this->assign("position",$position);
		$this->display('./xiaoqu');
	}
}