<?php
class AdsAction extends CommonAction{
	public function index($id){
		$this->assign("lanmu_id",$id);
		$ads = M('ads');
		$res = $ads->join("jhzs_lanmu as b on jhzs_ads.lanmu_id = b.lanmu_id")->where('jhzs_ads.lanmu_id='.$id)->select();
		$this->assign("ads",$res);
		$this->display();
	}
	public function add($id){
		$this->assign("lanmu_id",$id);
		$this->display();
	}
	public function addok(){
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
			$data = I('post.');
			$data['image']=$info[0]['savename'];
			
			$ads = M('ads');
			$res = $ads->add($data);
			if ($res) {
				$this->success("添加成功");
			}else{
				$this->error("添加失败");
			}
	}
	public function edit($id){
		$ads = M('ads');
		$res = $ads->where('ad_id='.$id)->select();
		$this->assign("ads",$res[0]);
		$this->display();
	}
	public function editok(){
		import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './uploadfiles/';// 设置附件上传目录
			$data = I('post.');
			if ($_FILES['image']['name']){
				if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info =  $upload->getUploadFileInfo();
				}
				$data['image']=$info[0]['savename'];
			}
			
			$ads = M('ads');
			$res = $ads->save($data);
			if ($res){
				$this->success("编辑成功");
			}else{
				$this->error("编辑失败");
			}
	}
	public function del($id){
		$ads = M('ads');
		$res = $ads->delete($id);
		if ($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}