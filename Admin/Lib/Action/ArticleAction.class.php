<?php
class ArticleAction extends Action{
	
	public function index($id){
		$this->assign("lanmu_id",$id);
		$article = M('article');
		$where = 'lanmu_id = '.$id;
		
		import('ORG.Util.Page');// 导入分页类
		$count      = $article->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$res = $article->join('jhzs_class as c on jhzs_article.class_id = c.class_id')->where('jhzs_article.'.$where)->order('article_id desc')->limit($Page->firstRow.','.$Page->listRows)->field('jhzs_article.*,c.class_name')->select();
		$this->assign('page',$show);
		$this->assign("articlelist",$res);
		$this->display();	
	}
	public function add($id){
		//获取文章分类
		$class = M('class');
		$res = $class->where("lanmu_id=".$id)->select();
		$this->assign("class",$res);
		$this->assign("lanmu_id",$id);
		$this->display();
	}
	public function addok(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './uploadfiles/';// 设置附件上传目录
		$data = $_POST;
		if ($_FILES['image']['name']){
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
			$data['image']=$info[0]['savename'];
		}
		$article = M('article');
		if($data['description']==''){
			$data['description'] = substr(str_replace(array(' ','&nbsp;',PHP_EOL),"",strip_tags($data['content'])),0,400);
		}
		if ($data['uptime']==''){
			$data['uptime'] = date("Y-m-d");
		}
		if ($data['liulan']==''){
			$data['liulan'] = rand(50,150);
		}
		$res = $article->add($data);	
		if ($res){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
	}
	public function edit($id){
		//获取文章分类
		$class = M('class');
		$res = $class->where("lanmu_id=".I('get.lanmu_id'))->select();
		$this->assign("class",$res);
		
		$article = M('article');
		$sql = 'select a.*,c.class_name from jhzs_article as a left join jhzs_class as c on a.class_id = c.class_id where a.article_id ='.$id;
		$res = $article->query($sql);
		$this->assign("article",$res[0]);
		$this->display();
	}
	public function editok(){
		
		
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './uploadfiles/';// 设置附件上传目录
		$data = $_POST;
		if ($_FILES['image']['name']){
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
			$data['image']=$info[0]['savename'];
		}
		$article=M('article');
		if($data['description']==''){
			$data['description'] = substr(str_replace(array(' ','&nbsp;',PHP_EOL),"",strip_tags($data['content'])),0,400);
		}
		if ($data['uptime']==''){
			$data['uptime'] = date("Y-m-d");
		}
		if ($data['liulan']==''){
			$data['liulan'] = rand(50,150);
		}
		$res = $article->save($data);
		if ($res){
			$this->success("保存成功");
		}else{
			$this->error("保存失败");
		}
	}
	public function del($id){
		$article = M('article');
		$res = $article ->delete($id);
		if ($res){
			$this->success("删除成功！");
		}else{
			$this->error("删除失败！");
		}
	}
}