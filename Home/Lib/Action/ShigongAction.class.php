<?php
	class ShigongAction extends Action{
		public function index(){
			$article= M('article');
			$res = $article->where("lanmu_id = 8")->limit(5)->select();
			$this->assign("xiaoguotu",$res);
			$this->display('./shigong');
		}
		public function denglu(){
			$data = $_POST;
			$shigong = M('shigong');
			$res = $shigong->where("kehu_name='".$data['kehu_name']."' and hetongbianhao = '".$data['hetongbianhao']."'")->field('shigong_id')->select();
			if ($res[0]){
				session('kehu_name',$data['kehu_name']);
				session('shigong_id',$res[0]['shigong_id']);
				$this->success("登录成功","info");
			}else{
				$this->error("登录失败");
			}
		}
		public function info(){
			if (session('shigong_id')){
				$sgcontent = M('sgcontent');
				$res = $sgcontent->where('shigong_id = '.session('shigong_id'))->order('uptime desc')->select();
				$this->assign("sgcontent",$res);
				
				$shigong = M('shigong');
				$res = $shigong->select(session('shigong_id'));
				$this->assign("shigong",$res[0]);
				//热销产品
				$rexiaoproduct = new ZhaowojiaAction();
				$rexiaoproduct->rexiaoproduct();
				
				
				//想要了解的装修知识
				$zxzs = new PublicAction();
				$zxzs->xljzxzs();
				
				//位置
				$position = "<a href='/'>首页</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href=".U('Shigong/index').">施工千里眼</a>&nbsp;&nbsp;>".$res[0]['kehu_name'];
				$this->assign("position",$position);
				$this->display('./shigong_info');
			}else{
				$this->error("请登录!","index");
			}
		}
	}