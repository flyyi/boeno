<?php
	class ProductAction extends CommonAction{
		public function index($id){
			$product = M('product');
			$where = "jhzs_product.lanmu_id=".$id;
			import('ORG.Util.Page');// 导入分页类
			$count = $product->where($where)->count();// 查询满足要求的总记录数
			$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
		
			$result = $product->join('jhzs_class as b on jhzs_product.classid = b.class_id')->join('jhzs_pinpai as p on jhzs_product.pinpai_id = p.pinpai_id')->where($where)->order('product_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign("product",$result);
			$this->assign("lanmu_id",$id);
			$this->assign("page",$show);
			$this->display();
		}
		public function add($id){
			//获取商品分类
			$class = M('class');
			$res = $class->where("lanmu_id=".$id)->select();
			$this->assign("class",$res);
			//获取商品品牌
			$pinpai = M('pinpai');
			$res = $pinpai->where("lanmu_id=".$id)->select();
			$this->assign("pinpai",$res);
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
			$prodcut = M('Product');
			$data=$_POST;
			$data['zhuangtai'] = implode(",",$_POST['zhuangtai']);
			$data['image']=$info[0]['savename'];
			$data['image2']=$info[1]['savename'];
			$data['image3']=$info[2]['savename'];
			$res = $prodcut->add($data);
			if ($res) {
				$this->success("添加成功");
			}else{
				$this->error("添加失败");
			}
		}
		public function edit($id){
			//获取商品分类
			$class = M('class');
			$res = $class->where("lanmu_id=".I('get.lanmu_id'))->select();
			$this->assign("class",$res);
			//获取商品品牌
			$pinpai = M('pinpai');
			$res = $pinpai->where("lanmu_id=".I('get.lanmu_id'))->select();
			$this->assign("pinpai",$res);
			
			$product = M('product');
			$res = $product->where('product_id = '.$id)->select();
			$this->assign("product",$res[0]);
			$this->display();
		}
		public function editok(){
			$data=$_POST;
			$data['zhuangtai'] = implode(",",$_POST['zhuangtai']);
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
			if ($_FILES['image2']['name']){
				if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info =  $upload->getUploadFileInfo();
				}
				$data['image2']=$info[1]['savename'];
			}
			if ($_FILES['image3']['name']){
				if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info =  $upload->getUploadFileInfo();
				}
				$data['image3']=$info[2]['savename'];
			}
			$prodcut = M('Product');
			
			$res = $prodcut->save($data);
			if ($res) {
				$this->success("修改成功");
			}else{
				$this->error("修改失败");
			}
		}
		public function del($id){
			$product = M('product');
			$res = $product -> delete($id);
			if ($res){
				$this->success("删除成功！");
			}else{
				$this->error("删除失败！");
			}
		}
	}