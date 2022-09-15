<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	//建材广告
    	$ads1 = M('ads');
    	$ad1res = $ads1->where("lanmu_id=1")->limit(6)->select();
    	$this->assign("ads1",$ad1res);
    	//建材分类
    	$fenlei1 = M('class');
    	$fenlei1res = $fenlei1->where("lanmu_id = 1")->order('paixu')->select();
    	$this->assign("fenlei1",$fenlei1res);
    	//建材品牌
    	$pinpai1 = M('pinpai');
    	$pinpai1res = $pinpai1->where("lanmu_id=1")->limit('6')->select();
    	$this->assign("pinpai1",$pinpai1res);
    	//建材商品
    	$product1 = M('product');
    	$product1res = $product1->limit(8)->where("lanmu_id=1")->select(); 
    	$this->assign("product1",$product1res);
    	
    	//软装广告
    	$ads5 = M('ads');
    	$ad5res = $ads5->where("lanmu_id=5")->limit(6)->select();
    	$this->assign("ads5",$ad5res);
    	//软装分类（家纺家饰）
    	$fenlei5 = M('class');
    	$fenlei5res = $fenlei5->where("lanmu_id in (3,4)")->order('paixu')->select();
    	$this->assign("fenlei5",$fenlei5res);
    	//家纺分类
    	$fenlei3 = M('class');
    	$fenlei3res = $fenlei3->where("lanmu_id = 3")->order('paixu')->select();
    	$this->assign("fenlei3",$fenlei3res);
    	//家饰分类
    	$fenlei4 = M('class');
    	$fenlei4res = $fenlei4->where("lanmu_id = 4")->order('paixu')->select();
    	$this->assign("fenlei4",$fenlei4res);
    	//软装品牌
    	$pinpai5 = M('pinpai');
    	$pinpai5res = $pinpai5->where("lanmu_id in (3,4)")->limit('6')->select();
    	$this->assign("pinpai5",$pinpai5res);
    	//软装商品
    	$product2 = M('product');
    	$product2res = $product2->limit(8)->where("lanmu_id=2")->select(); 
    	$this->assign("product2",$product2res); 
    	
    	
    	//家具广告
    	$ads2 = M('ads');
    	$ad2res = $ads2->where("lanmu_id=2")->limit(6)->select();
    	$this->assign("ads2",$ad2res);
    	//家具分类
    	$fenlei2 = M('class');
    	$fenlei2res = $fenlei2->where("lanmu_id = 2")->order('paixu')->select();
    	$this->assign("fenlei2",$fenlei2res);
    	//家具品牌
    	$pinpai2 = M('pinpai');
    	$pinpai2res = $pinpai2->where("lanmu_id=2")->limit('6')->select();
    	$this->assign("pinpai2",$pinpai2res);   	
    	//软装商品
    	$product5 = M('product');
    	$product5res = $product5->limit(8)->where("lanmu_id in (3,4)")->select(); 
    	$this->assign("product5",$product5res);
		
		//团购广告
		$ads6 = M('ads');
		$ad6res1 = $ads6->where("lanmu_id = 6")->limit('0,2')->select();
		$ad6res2 = $ads6->where("lanmu_id = 6")->limit('2,1')->select();
		$ad6res3 = $ads6->where("lanmu_id = 6")->limit('3,3')->select();
		$this->assign("ad6res1",$ad6res1);
		$this->assign("ad6res2",$ad6res2);
		$this->assign("ad6res3",$ad6res3);
		
		//秒杀广告
		$ads14 = M('ads');
		$ad14res1 = $ads14->where("lanmu_id = 14")->limit('0,1')->select();
		$ad14res2 = $ads14->where("lanmu_id = 14")->limit('1,2')->select();
		$ad14res3 = $ads14->where("lanmu_id = 14")->limit('3,1')->select();
		$this->assign("ad14res1",$ad14res1);
		$this->assign("ad14res2",$ad14res2);
		$this->assign("ad14res3",$ad14res3);
		
		//经典案例
		$article = M('article');
		$where = 'lanmu_id = 8 and zhuangtai = 1';
		$arc8res = $article->where($where)->limit(3)->order('article_id desc')->select();
    	$this->assign("jdal",$arc8res);
    	
    	//家装效果图
    	$article = M('article');
    	$where = 'lanmu_id = 8';
    	$jiazhuangres = $article->where($where)->limit(4)->order('article_id desc')->select();
    	$this->assign("jiazhuang",$jiazhuangres);
    	//家装效果图分类
    	$jzclass = M('class');
    	$jzflres = $jzclass->where("lanmu_id = 8")->select();
    	$this->assign("jzfl",$jzflres);
    	//案例分类
    	$class = M('class');
    	$arc8fenlei = $class->where("lanmu_id = 8")->select();
    	$this->assign("arc8fenlei",$arc8fenlei);
    	
    	//首页banner广告
    	$ads11 = M('ads');
    	$ad11res = $ads11->where("lanmu_id = 11")->select();
    	$this->assign("ad11res",$ad11res);
    	
    	//找我家
    	$xiaoqu = M('xiaoqu');
    	$res = $xiaoqu->where("lanmu_id = 13")->order('paixu desc')->limit(8)->select();
    	$this->assign("zhaowojia",$res);
    	
    	//秒杀倒计时
    	$mssz = M('msshezhi');
    	$res = $mssz->select(1);
    	$this->assign("mssz",$res[0]);
    	
    	//秒杀倒计时
    	$hbsz = M('msshezhi');
    	$res = $hbsz->select(2);
    	$this->assign("hbsz",$res[0]);
    	
    	//抢红包
    	$hongbao = M('hongbao');
    	$res = $hongbao->join("jhzs_pinpai a on jhzs_hongbao.pinpai = a.pinpai_id")->select();
    	$this->assign("hongbao",$res);
    	
    	//友情链接
    	$link = M('link');
    	$res = $link->select();
    	$this->assign("link",$res);
		$this->display("./index");
    }
}