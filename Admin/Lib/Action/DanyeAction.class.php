<?php
class DanyeAction extends CommonAction{
	
	public function index($id){
		$lanmu_id = $id;
		$danye = M('danye');
		$res = $danye->where('lanmu_id = '.$lanmu_id)->select();
		$this->assign("danye",$res[0]);
		$this->assign("lanmu_id",$lanmu_id);
		$this->display();
	}
	public function save(){
		
		$data = $_POST;
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './uploadfiles/';// 设置附件上传目录
		if ($_FILES['image']['name']){
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
			$data['image']=$info[0]['savename'];
		}
		
		$danye = M('danye');
		$a = $danye->where('lanmu_id = '.$data['lanmu_id'])->select();
		$res = false;
		if ($a){
			$res = $danye->save($data);
		}else{
			$res = $danye->add($data);
		}
		if ($res){
			$this->success("保存成功");
		}else{
			$this->success("保存失败");
		}
	}
}