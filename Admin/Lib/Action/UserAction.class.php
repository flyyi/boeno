<?php
class UserAction extends CommonAction{
	public function index(){
		$user = M('user');
		$res = $user->select();
		$this->assign("userlist",$res);
		$this->display();
	}
	public function edit($id){
		//echo "你要编辑".$id;
		$user = M('user');
		$data = array('id'=>$id);
		$res = $user->where($data)->limit(1)->select();
		$this->assign("user",$res[0]);
		$this->display();
	}
	public function editok(){
		if (I('post.password')!=I('post.repassword')){
			$this->error("两次密码输入不一致！");
		}
		$data = I("post.");
		$data['password'] = md5($data['password']);
		$user = M('user');
		$res = $user->save($data);
		if ($res){
			$this->success("编辑成功！");
		}else{
			$this->error("编辑失败！");
		}
	}
	public function del(){
		$this->error("账户不允许删除");
	}
	public function add(){
		$this->display();
	}
	public function addok(){
		if (I('post.password')!=I('post.repassword')){
			$this->error("两次密码输入不一致！");
		}
		$data = I("post.");
		$data['password'] = md5($data['password']);
		$user = M('user');
		$res = $user->add($data);
		if ($res){
			$this->success("添加成功！");
		}else{
			$this->error("添加失败！");
		}
	}
}