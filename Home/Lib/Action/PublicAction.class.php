<?php
class PublicAction extends Action{
	public function xljzxzs(){
		$zxzs = M('Article');
		$res = $zxzs->where("lanmu_id = 12 and zhuangtai = 1")->select();
		$this->assign("xljzxzs",$res);
	}
	Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,1,'png',90,32);
	}
}