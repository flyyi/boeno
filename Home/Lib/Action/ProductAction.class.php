<?php
class ProductAction extends Action{
	public function index($id){
		$where = "lanmu_id = ".$id;
		$getdata = I('get.');
		$order = 'product_id desc';
		if ($id=='5'){
			$where = "lanmu_id in (3,4)";
		}
		if ($getdata[classid]){
			$where.= " and classid = ".$getdata['classid'];
		}
		if ($getdata[pinpai_id]){
			$where.=" and pinpai_id = ".$getdata['pinpai_id'];
			$order = 'price asc';
		}
		if($getdata[shangprice]){
			$where.=" and price <= ".$getdata['shangprice'];
			$order = 'price desc';
		}
		if($getdata[xiaprice]){
			$where.=" and price >= ".$getdata['xiaprice'];
			$order = 'price asc';
		}
		if ($getdata[order]){
			if($getdata[order]=='xiaoliang'){
				$order = $getdata[order]." desc";
			}else if($getdata[order]=='price'){
				$order = $getdata[order]." asc";
			}
		}
		//想要了解的装修知识
		$zxzs = new PublicAction();
		$zxzs->xljzxzs();
		
		//全部商品
		$product = M('product');
		import('ORG.Util.Page');// 导入分页类
		$count = $product->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$res = $product->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("product",$res);
		$this->assign('page',$show);// 赋值分页输出
		
		//您可能会喜欢（热销产品）
		$resrexiao = $product->where("lanmu_id = ".$id." and zhuangtai like '%2%'")->limit(6)->select();
		$this->assign("productrexiao",$resrexiao);
		
		//当前位置
		$position = "<a href='/'>首页</a>&nbsp;>&nbsp;";
		$lanmu = M('lanmu');
		$reslanmu = $lanmu->field('lanmu_id,lanmu_name')->where("lanmu_id =".$id)->find();
		if ($getdata[classid]){
			$position.= "<a href='/index.php/Product/index?id=$reslanmu[lanmu_id]'>".$reslanmu['lanmu_name']."</a>";
			$class = M('class');
			$resclass = $class->field("class_name")->where(" class_id = ".$getdata['classid'])->find();
			$position.="&nbsp;>&nbsp;".$resclass[class_name];
		}else{
			$position.= $reslanmu['lanmu_name'];
		}
		$this->assign("position",$position);
		$this->assign("lanmu_id",$id);
		
		//分类
		$fenlei = M('class');
		$resfenlei = $fenlei->where("lanmu_id = ".$id)->select();
		$this->assign("fenlei",$resfenlei);
		
		
		//品牌
		$pinpai = M('pinpai');
		$respinpai = $pinpai->where('lanmu_id = '.$id)->select();
		$this->assign('pinpai',$respinpai);
		
		
		
		
		$this->display("./product");
	}
	public function info($id){
		//当前位置
		$position = "<a href='/'>首页</a>&nbsp;>&nbsp;";
		$lanmu = M('lanmu');
		$reslanmu = $lanmu->field('lanmu_id,lanmu_name')->where("lanmu_id =".$_GET['lanmu_id'])->find();
		$position.= "<a href='/index.php/Product/index?id=$reslanmu[lanmu_id]'>".$reslanmu['lanmu_name']."</a>";
		if ($getdata[classid]){
			$class = M('class');
			$resclass = $class->field("class_name")->where(" class_id = ".$getdata['classid'])->find();
			$position.="&nbsp;>&nbsp;".$resclass[class_name];
		}
		$position.='&nbsp;>&nbsp;商品';
		$this->assign("position",$position);
		
		//分类
		$fenlei = M('class');
		$resfenlei = $fenlei->where("lanmu_id = ".I('get.lanmu_id'))->select();
		$this->assign("fenlei",$resfenlei);
		
		
		
		$product = M('product');
		$productres = $product->join("jhzs_pinpai as p on p.pinpai_id = jhzs_product.pinpai_id")->select($id);
		if ($productres[0]['image']==''){
			$productres[0]['image']='default_img.jpg';
		}
		if ($productres[0]['image2']==''){
			$productres[0]['image2']='default_img.jpg';
		}
		if ($productres[0]['image3']==''){
			$productres[0]['image3']='default_img.jpg';
		}
		$this->assign("product",$productres[0]);
		
		//您可能会喜欢（热销产品）
		$resrexiao = $product->where("lanmu_id = ".I('get.lanmu_id')." and price < ".$productres[0]['price']*2)->order('price desc')->limit(6)->select();
		$this->assign("productrexiao",$resrexiao);
		//想要了解的装修知识
		$zxzs = new PublicAction();
		$zxzs->xljzxzs();
		
		$this->display("./product_info");
	}
}