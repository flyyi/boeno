<?php
	class MiaoshaAction extends Action {
		public function index(){
			
			//秒杀倒计时
			$mssz = M('msshezhi');
			$res = $mssz->select(1);
			$this->assign("mssz",$res[0]);
			
			$miaosha = M('miaosha');
			$res = $miaosha->join("jhzs_product a on a.product_id = jhzs_miaosha.product_id") -> select();
			$this->assign("miaosha",$res);
			
			//您可能会喜欢（热销产品）
			$resrexiao = M('product')->where("lanmu_id in(1,2,3) and zhuangtai like '%2%'")->limit(6)->select();
			$this->assign("productrexiao",$resrexiao);
			//想要了解的装修知识
			$zxzs = new PublicAction();
			$zxzs->xljzxzs();
			
			$this->position();
			$this->display('./miaosha');
		}
		public function info($id){
			$miaosha = M('miaosha');
			$res = $miaosha->join("jhzs_product a on a.product_id = jhzs_miaosha.product_id")->where("jhzs_miaosha.miaosha_id = ".$id) -> select();
			$this->assign("product",$res[0]);
			
			$res2 = $miaosha->join("jhzs_product as p on p.product_id = jhzs_miaosha.product_id")->where('p.price <'.$res[0]['price']*2)->limit(6)->order('p.price desc')->select();
			$this->assign("xianshimiaosha",$res2);
			
			//秒杀倒计时
			$mssz = M('msshezhi');
			$res = $mssz->select(1);
			$this->assign("mssz",$res[0]);
			//想要了解的装修知识
			$zxzs = new PublicAction();
			$zxzs->xljzxzs();
			
			$this->position_info();
			$this->display("./miaosha_info");
		}
		public function position(){
			//当前位置
			$id=14;
			$position = "<a href='/'>首页</a>&nbsp;>&nbsp;";
			$lanmu = M('lanmu');
			$reslanmu = $lanmu->field('lanmu_id,lanmu_name')->where("lanmu_id =".$id)->find();
			$position.= $reslanmu['lanmu_name'];
			$this->assign("position",$position);
			$this->assign("lanmu_id",$id);
		}
		public function position_info(){
			//当前位置
			$id=14;
			$position = "<a href='/'>首页</a>&nbsp;>&nbsp;";
			$lanmu = M('lanmu');
			$reslanmu = $lanmu->field('lanmu_id,lanmu_name')->where("lanmu_id =".$id)->find();
			$position.= "<a href=".U('Miaosha/index').">".$reslanmu['lanmu_name']."</a>&nbsp;>&nbsp;";
			$this->assign("position",$position);
			$this->assign("lanmu_id",$id);
		}
	}