<?php
	class ArticleAction extends Action{
		
		public function index(){
			
			$article = M('article');
			$where = 'lanmu_id = '.I('get.lanmu_id');
			if (I('get.class_id')){
				$where.=" and class_id = ".I('get.class_id');
			}
			
			import('ORG.Util.Page');// 导入分页类
			$count      = $article->where($where)->count();// 查询满足要求的总记录数
			$Page       = new Page($count,24);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$res = $article->where($where)->order('uptime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			
			$this->assign('page',$show);
			$this->assign("article",$res);
			
			$this->base();
			
			//想要了解的装修知识
			$zxzs = new PublicAction();
			$zxzs->xljzxzs();
			
			if (I('get.lanmu_id') == 8||I('get.lanmu_id') == 9||I('get.lanmu_id') == 10){
				$this->display('./article');
			}else if (I('get.lanmu_id') == 12){
				$this->display('./wzarticle');
			}else {
				$this->error("模板不存在！");
			}
		}
		public function info($id){
			$article = M('article');
			$where = "article_id = ".$id;
			$res = $article->where($where)->select();
			$this->assign('article',$res[0]);
			$this->base();
			
			//想要了解的装修知识
			$zxzs = new PublicAction();
			$zxzs->xljzxzs();
			
			$this->display('./article_info');
		}
		public function base(){
			$getdata = I('get.');
			$where = 'lanmu_id = '.I('get.lanmu_id');
			$article = M('article');
			//案例推荐
			$res2 = $article->where($where." and zhuangtai = 1")->limit(4)->select();
				
			$this->assign('anliarticle',$res2);
				
			//分类
			$res3 = M('class')->where('lanmu_id = '.I('get.lanmu_id'))->select();
			$this->assign("fenlei",$res3);
				
			//当前位置position
			$position = "<a href='/'>首页</a>&nbsp;>&nbsp;";
			$lanmu = M('lanmu');
			$reslanmu = $lanmu->field('lanmu_id,lanmu_name')->where("lanmu_id =".$getdata['lanmu_id'])->find();
			if ($getdata[class_id]){
				$position.= "<a href=".U('Article/index',array('lanmu_id'=>$getdata['lanmu_id'])).">".$reslanmu['lanmu_name']."</a>";
				$class = M('class');
				$resclass = $class->field("class_name")->where(" class_id = ".$getdata['class_id'])->find();
				$position.="&nbsp;>&nbsp;".$resclass[class_name];
			}else if ($getdata[id]){
				$position.= "<a href=".U('Article/index',array('lanmu_id'=>$getdata['lanmu_id'])).">".$reslanmu['lanmu_name']."</a>";
				$position.='&nbsp;>&nbsp;正文';
			}
			else{
				$position.= $reslanmu['lanmu_name'];
			}
			$this->assign("position",$position);
		}
	}