<?php
class UserAction extends CommonAction{
	public function index(){
		$user = M('user');
		$res = $user->join("erp_bumen a on erp_user.bumen_id = a.bumen_id")->select();
		$this->assign("user",$res);
		$this->display();
	}
	public function add(){
		$bumen = M('bumen')->where("status = 1")->select();
		$this->assign('bumen',$bumen);
		$this->display();
	}
	public function addok(){
		$user = D('User');
		if (!$user->create()){
			$this->error($user->getError());
		}
		$data = $_POST;
		$data['password'] = md5($data['password']);
		$res = $user->add($data);
		if ($res){
			$this->success("员工添加成功！");
		}else{
			$this->error("员工添加失败！");
		}
	}
	public function edit($id){
		$bumen = M('bumen')->where("status = 1")->select();
		$this->assign('bumen',$bumen);
		
		$res = M('user')->join("erp_bumen a on erp_user.bumen_id = a.bumen_id")->select($id);
		$this->assign("user",$res[0]);
		$this->display();
	}
	public function editok(){
		$user = D('User');
		if (!$user->create()){
			$this->error($user->getError());
		}
		$res = $user->save($_POST);
		if ($res){
			$this->success("修改成功");
		}else{
			$this->error("用户名已存在");
		}
	}
}