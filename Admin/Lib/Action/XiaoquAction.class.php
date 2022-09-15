<?php
 class XiaoquAction extends CommonAction{
 	public function index(){
 		$this->assign("lanmu_id",I('get.lanmu_id'));
 		$xiaoqu = M('xiaoqu');
 		$res = $xiaoqu->join("jhzs_qu as q on jhzs_xiaoqu.quyu = q.qu_id")->field("jhzs_xiaoqu.*,q.name as quyuname")->order('jhzs_xiaoqu.paixu desc')->select();
 		$this->assign("xiaoqu",$res);
 		$this->display();
 	}
 	public function add(){
 		//区
 		$qu = M('qu');
 		$res = $qu->select();
 		$this->assign("qu",$res);
 		$this->assign("lanmu_id",I('get.lanmu_id'));
 		$this->display();
 	}
 	public function addok(){
 		$data = $_POST;
 		$xiaoqu = M('xiaoqu');
 		
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

 		$data['image']= $info[0]['savename'];
 		$res = $xiaoqu->add($data);
 		if($res){
 			$this->success("小区添加成功");
 		}else{
 			$this->error("小区添加失败");
 		}
 	}
 	public function edit($id){
 		$xiaoqu = M('xiaoqu');
 		$sql = 'select x.*,q.name as quyuname from jhzs_xiaoqu as x left join jhzs_qu as q on x.quyu = q.qu_id  where x.xiaoqu_id = '.$id;
 		$res = $xiaoqu->query($sql);
 		$this->assign("xiaoqu",$res[0]);
 		
 		$sql2 = 'select * from jhzs_qu';
 		$res2 = M('qu')->query($sql2);
 		$this->assign("qu",$res2);
 		$this->display();	
 	}
 	public function editok(){
 		$xiaoqu = M('xiaoqu');
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
 			$data['image']= $info[0]['savename'];
 		}
 		$res = $xiaoqu->save($data);
 		if($res){
 			$this->success("编辑成功");
 		}else{
 			$this->error("编辑失败");
 		}
 		
 	}
 	public function del($id){
 		$res = M('xiaoqu')->delete($id);
 		if ($res){
 			$this->success("删除成功");
 		}else{
 			$this->error("删除失败");
 		}
 	}
 	
 	
 }