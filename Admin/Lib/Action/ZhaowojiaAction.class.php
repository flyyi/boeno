<?php
class ZhaowojiaAction extends CommonAction{
	public function index($id){
		$huxing = M('huxing');
		$sql = 'select h.*,x.name xiaoquname,j.jushi_name,f.fengge_name from jhzs_huxing h left join jhzs_xiaoqu x on h.xiaoqu_id = x.xiaoqu_id left JOIN jhzs_jushi j on h.jushi = j.jushi_id LEFT JOIN jhzs_fengge f on h.fengge = f.fengge_id';
		$res = $huxing->query($sql);
		$this->assign("huxing",$res);
		$this->assign("lanmu_id",$id);
		$this->display();
	}
	public function add($id){
		
		//获取居室
		$jushi = M('jushi');
		$res1 = $jushi->select();
		$this->assign("jushi",$res1);
		//获取风格
		$fengge = M('fengge');
		$res2 = $fengge->select();
		$this->assign("fengge",$res2);
		//获取小区
		$xiaoqu = M('xiaoqu');
		$res3 = $xiaoqu->select();
		$this->assign("xiaoqu",$res3);
		
		$this->assign("lanmu_id",$id);
		$this->display();
	}
	public function addok(){
		$huxing = D('Huxing');
		if (!$huxing->create()){
			$this->error($huxing->getError());
		}
		$data = $_POST;
		
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
		if($data['description']==''){
			$data['description'] = substr(str_replace(array(' ','&nbsp;',PHP_EOL),"",strip_tags($data['content'])),0,400);
		}
		$data['image']= $info[0]['savename'];
		$res = $huxing->add($data);
		if ($res){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
	}
	public function edit($id){
		$huxing = M('huxing');
		$sql = 'select a.*,b.name as xiaoquname,c.jushi_name,d.fengge_name from jhzs_huxing a LEFT JOIN jhzs_xiaoqu b on a.xiaoqu_id = b.xiaoqu_id left JOIN jhzs_jushi c on a.jushi = c.jushi_id LEFT JOIN jhzs_fengge d on a.fengge = d.fengge_id where a.huxing_id ='.$id;
		$res = $huxing->query($sql);
		$this->assign("huxing",$res[0]);
		
		
		//获取居室
		$jushi = M('jushi');
		$res1 = $jushi->select();
		$this->assign("jushi",$res1);
		//获取风格
		$fengge = M('fengge');
		$res2 = $fengge->select();
		$this->assign("fengge",$res2);
		//获取小区
		$xiaoqu = M('xiaoqu');
		$res3 = $xiaoqu->select();
		$this->assign("xiaoqu",$res3);
		
		$this->display();
	}
	public function editok(){
		$data = $_POST;
		$huxing = D('Huxing');
		if (!$huxing->create()){
			$this->error($huxing->getError());
		}
		
		
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
		if($data['description']==''){
			$data['description'] = substr(str_replace(array(' ','&nbsp;',PHP_EOL),"",strip_tags($data['content'])),0,400);
		}
		$res = $huxing->save($data);
		if ($res){
			$this->success("保存成功");
		}else{
			$this->error("保存失败");
		}
	}
	public function del($id){
		$huxing = M('huxing');
		$res = $huxing->delete($id);
		if ($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}