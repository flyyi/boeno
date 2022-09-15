<?php
class PinpaiAction extends CommonAction{
	public function index(){
		$pinpai = M('pinpai');
		$res = $pinpai->join("jhzs_lanmu as b on jhzs_pinpai.lanmu_id = b.lanmu_id ")->field("b.lanmu_name,jhzs_pinpai.*")->select();
		$this->assign("pinpai",$res);
		$this->display();
	}
	public function add(){
		$lanmu = M('lanmu');
		$res = $lanmu->where("lanmutype = 0")->select();
		$this->assign("lanmu",$res);
		$this->display();
	}
	public function addok(){
		$pinpai = M('pinpai');
		$data = I("post.");
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './uploadfiles/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		
		$data['pinpai_logo']=$info[0]['savename'];
		$res = $pinpai->add($data);
		if($res){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
	}
	public function edit($id){
		$pinpai = M('pinpai');
		$res = $pinpai->where("pinpai_id = ".$id)->select();
		$this->assign("pinpai",$res[0]);
		
		$lanmu = M('lanmu');
		$res = $lanmu->where("lanmutype = 0")->select();
		$this->assign("lanmu",$res);
		$this->display();
	}
	public function editok(){
		$pinpai = M('pinpai');
		$data = I("post.");
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './uploadfiles/';// 设置附件上传目录
		if ($_FILES['pinpai_logo']['name']){
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
			$data['pinpai_logo']=$info[0]['savename'];
		}
		$res = $pinpai->save($data);
		if($res){
			$this->success("编辑成功");
		}else{
			$this->error("编辑失败");
		}
	}
	public function del($id){
		$pinpai = M('pinpai');
		$res = $pinpai->delete($id);
		if ($res) {
			$this->success("删除成功");
		}else {
			$this->error("删除失败");
		}
	}
}