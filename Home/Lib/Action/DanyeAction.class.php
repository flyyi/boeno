<?php
 class DanyeAction extends Action{
 	
 	public function index(){
 		$danye = M('danye');
 		$res = $danye->join("jhzs_lanmu a on jhzs_danye.lanmu_id = a.lanmu_id")->where("jhzs_danye.lanmu_id = ".I('get.lanmu_id'))->field("jhzs_danye.*,a.lanmu_name")->select();
 		$this->assign("danye",$res[0]);
 		if (I('get.lanmu_id')==15){
 			$this->display('./jianli');
 		}else{
 			$this->display('./danye');
 		}
 	}
 }