<?php
	class MemberAction extends CommonAction{
		public function index(){
			$member = M('member');
			$res = $member->select();
			$this->assign("member",$res);
			$this->display();
		}
		public function add(){
			$this->display();
		}
		public function addok(){
			$member = M('member');
			$res = $member->add($_POST);
			if ($res){
				$this->success("添加成功");
			}else{
				$this->error("姓名或电话已存在");
			}
		}
		public function edit($id){
			$member = M('member');
			$res = $member->select($id);
			$this->assign("member",$res[0]);
			$this->display();
		}
		public function editok(){
			$member = M('member');
			$res = $member->save($_POST);
			if ($res){
				$this->success("保存成功");
			}else {
				$this->error("电话号码已存在");
			}
		}
		public function del($id){
			if (M('member')->delete($id)){
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}
			
		}
	}