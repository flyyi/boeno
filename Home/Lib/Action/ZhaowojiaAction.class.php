<?php
	class ZhaowojiaAction extends Action{
		
		public function index($id){
			$huxing = M('huxing');
			$where = "jhzs_huxing.xiaoqu_id = ".$id;
			if ($_GET['fengge']){
				$where.=' and fengge = '.$_GET['fengge'];
			}
			if ($_GET['jushi']){
				$where.=' and jushi = '.$_GET['jushi'];
			}
			if ($_GET[minmianji]){
				$where.=' and mianji >='.$_GET[minmianji];
			}
			if ($_GET[maxmianji]&&intval($_GET[maxmianji])){
				$where.=' and mianji <='.$_GET[maxmianji];
			}
			$res = $huxing->join("jhzs_xiaoqu as a on a.xiaoqu_id = jhzs_huxing.xiaoqu_id")->join("jhzs_jushi as b on jhzs_huxing.jushi = b.jushi_id")->where($where)->field("jhzs_huxing.*,a.lanmu_id,b.jushi_name")->select();
			$this->assign("huxing",$res);
			
			$this->position($_GET,'13');
			
			//获取小区信息
			$xiaoqu = M('xiaoqu');
			$res2 = $xiaoqu->select($id);
			$this->assign("xiaoqu",$res2[0]);
			//获取风格
			$fengge = M('fengge');
			$resfengge = $fengge->select();
			$this->assign('fengge',$resfengge);
			
			//获取居室
			$jushi = M('jushi');
			$resjushi = $jushi->select();
			$this->assign('jushi',$resjushi);
			
			//面积
			$resmianji = array(
				array('minmianji'=>'50','maxmianji'=>'100'),
				array('minmianji'=>'100','maxmianji'=>'150'),
				array('minmianji'=>'150','maxmianji'=>'200'),
				array('minmianji'=>'200','maxmianji'=>'以上'),
			);
			$this->assign("mianji",$resmianji);
			
			$this->rexiaoproduct();
			//想要了解的装修知识
			$zxzs = new PublicAction();
			$zxzs->xljzxzs();
			
			
			$this->display('./zhaowojia');
		}
		public function info($id){
			$huxing = M('huxing');
			$res = $huxing->join("jhzs_jushi as a on jhzs_huxing.jushi = a.jushi_id")->join("jhzs_fengge as b on jhzs_huxing.fengge = b.fengge_id")->field("jhzs_huxing.*,a.jushi_name,b.fengge_name")->where("jhzs_huxing.huxing_id = ".$id)->select();
			$this->assign("huxing",$res[0]);
			$this->rexiaoproduct();
			$this->position_info($res[0], "正文");
			$this->display('./zhaowojia_info');
		}
		public function rexiaoproduct(){
			//您可能会喜欢（热销产品）
			$resrexiao = M('product')->where(" zhuangtai like '%2%'")->limit(6)->select();
			$this->assign("productrexiao",$resrexiao);			
		}
		public function position($getdata,$id){
			//当前位置
			$position = "<a href='/'>首页</a>&nbsp;>&nbsp;<a href=".U('Xiaoqu/index',array('id'=>'13')).">小区</a>&nbsp;>&nbsp;";
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
		}
		public function position_info($getdata,$str){
			$position = "<a href='/'>首页</a>&nbsp;>&nbsp;<a href=".U('Xiaoqu/index',array('id'=>'13')).">小区</a>&nbsp;>&nbsp;";
			$lanmu = M('lanmu');
			$reslanmu = $lanmu->field('lanmu_id,lanmu_name,model')->where("lanmu_id =".$_GET['lanmu_id'])->find();
			$position.= "<a href=".U($reslanmu[model].'/index',array('id'=>$getdata['xiaoqu_id'])).">".$reslanmu['lanmu_name']."</a>";
			if ($getdata[classid]){
				$class = M('class');
				$resclass = $class->field("class_name")->where(" class_id = ".$getdata['classid'])->find();
				$position.="&nbsp;>&nbsp;".$resclass[class_name];
			}
			$position.='&nbsp;>&nbsp;'.$str;
			$this->assign("position",$position);
		}
		
	}