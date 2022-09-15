<?php
	class MenuAction extends Action{
		
		public function index(){
			$lanmu = M('lanmu');
			
			//1、系统栏目
			$xitongres = $lanmu->where("lanmutype=0")->order('paixu asc')->select();
			$this->assign('xtlanmu',$xitongres);
			
			//2、单页栏目
			//$danyeres = $lanmu->join("jhzs_lanmu a on jhzs_lanmu.top_lanmu")->where("lanmutype=1")->order('paixu asc')->select();
			$sql = "select a.*,b.lanmu_name as toplanmu_name from jhzs_lanmu as a left join jhzs_lanmu as b on a.toplanmu_id = b.lanmu_id where a.lanmutype = 1";
			$danyeres = $lanmu->query($sql);
			foreach ($danyeres as &$temp){
				if (!$temp['toplanmu_name']){
					$temp['toplanmu_name']='一级栏目';
				}
			}
			$this->assign('dylanmu',$danyeres);;
			
			//3、文章列表
			$sql2 = "select a.*,b.lanmu_name as toplanmu_name from jhzs_lanmu as a left join jhzs_lanmu as b on a.toplanmu_id = b.lanmu_id where a.lanmutype = 2";
			$wenzhangres = $lanmu->query($sql2);
			foreach ($wenzhangres as &$temp){
				if (!$temp['toplanmu_name']){
					$temp['toplanmu_name']='一级栏目';
				}
			}
			$this->assign('wzlanmu',$wenzhangres);
			
			//4、产品列表
			$sql3 = "select a.*,b.lanmu_name as toplanmu_name from jhzs_lanmu as a left join jhzs_lanmu as b on a.toplanmu_id = b.lanmu_id where a.lanmutype = 3"; 
			$productres = $lanmu->query($sql3);
			$this->assign('cplanmu',$productres);
			
			$this->display();			
		}
		public function add(){
			//获取所有的非系统顶级栏目
			$lanmu = M('lanmu');
			$res = $lanmu->where("toplanmu_id = 0 and lanmutype != 0")->select();
			$this->assign("toplanmu",$res);
			$this->display();
		}
		public function addok(){
			$lanmu = M('lanmu');
			$data = $_POST;
			$res = $lanmu->add($data);
			if ($res){
				$this->success("添加成功");				
			}else{
				$this->error("添加失败");				
			}
		}
		
		public function edit(){
			$lanmu_id = I('get.lanmu_id');
			$lanmu = M('lanmu');
			$sql = 'select a.*,b.lanmu_name as toplanmu_name FROM jhzs_lanmu as a LEFT JOIN jhzs_lanmu as b on a.toplanmu_id = b.lanmu_id where a.lanmu_id = '.$lanmu_id;
			$res = $lanmu->query($sql);
			switch ($res[0]['lanmutype']){
				case 1:
					$res[0]['lanmutypename'] = '单页栏目';
					break;
				case 2:
					$res[0]['lanmutypename'] = '文章列表';
					break;
				case 3:
					$res[0]['lanmutypename'] = '产品列表';
					break;
				default:
					$res[0]['lanmutypename'] = '系统栏目';
					break;
			}
			if ($res[0]['toplanmu_id']==0){
				$res[0]['toplanmu_name']="一级菜单";
			}
			$this->assign("lanmu",$res[0]);
			
			
			//获取所有的非系统顶级栏目
			$lanmu = M('lanmu');
			$res2 = $lanmu->where("toplanmu_id = 0 and lanmutype != 0")->select();
			$this->assign("toplanmu",$res2);
			
			
			$this->display();
		}
		public function editok(){
			$lanmu = M('lanmu');
			$data = $_POST;
			$res = $lanmu->save($data);
			if ($res){
				$this->success("保存成功");
			}else{
				$this->error("保存失败");
			}
		}
		public function del(){
			$lanmu = M('lanmu');
			$res = $lanmu->delete(I('get.lanmu_id'));
			if ($res){
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}
		}
		
	}