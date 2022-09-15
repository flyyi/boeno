<?php
class LinkAction extends CommonAction{
	public function index(){
		$link = M('link');
		$res = $link->select();
		$this->assign("link",$res);
		$this->display();
	}
	
	public function add(){
		
		$this->display();
	}
	public function addok(){
		$link = M('link');
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './uploadfiles/';// 设置附件上传目录
		if ($_FILES['logo']['name']){
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
		}
		$data = $_POST;
		$data['logo'] = $info[0]['savename'];
		$res = $link->add($data);
		if ($res){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
	}
	public function edit($id){
		$link = M('link');
		$res = $link->select($id);
		$this->assign("link",$res[0]);
		$this->display();
	}
	public function editok(){
		$link = M('link');
	
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './uploadfiles/';// 设置附件上传目录
		if ($_FILES['logo']['name']){
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
		}
		$data = $_POST;
		$data['logo'] = $info[0]['savename'];
		$res = $link->save($data);
		if ($res){
			$this->success("修改成功");
		}else{
			$this->error("修改失败");
		}
	}
	public function del($id){
		$link = M('link');
		$res = $link->delete($id);
		if($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}