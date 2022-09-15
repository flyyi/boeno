<?php
	class TuangouAction extends CommonAction{
		public function index(){
			$tuangou = M('tuangou');
			$res = $tuangou->join("jhzs_product as p on p.product_id = jhzs_tuangou.product_id")->select();
			$this->assign("tuangou",$res);
			$this->display();
		}
		public function add(){
			$this->display();			
		}
		public function addok(){
			$data = $_POST;
			$tuangou = M('tuangou');
			$res = $tuangou->add($data);
			if ($res){
				$this->success("添加团购成功");				
			}else{
				$this->error("添加团购失败");				
			}			
		}
		public function edit($id){
			$tuangou = M('tuangou');
			$res = $tuangou->join('jhzs_product as p on p.product_id = jhzs_tuangou.product_id')->where("jhzs_tuangou.tuangou_id = ".$id)->select();
			$this->assign("tuangou",$res[0]);
			$this->display();			
		}
		public function editok(){
			$tuangou = M('tuangou');
			$res = $tuangou->save($_POST);
			if ($res){
				$this->success("编辑成功");				
			}else{
				$this->error("编辑失败");				
			}
		}
		public function del($id){
			$tuangou = M('tuangou');
			$res = $tuangou->delete($id);
			if ($res){
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}			
		}
		
	}