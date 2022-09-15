<?php
class IndexAction extends Action {
    public function index(){
		$this->display('Public/login');
    }
    public function login(){
    	$data = $_POST;
    	if ($_SESSION['verify']!= md5($data['verify'])){
    		$this->error('验证码错误！');
    	}
    	$user = M('user');
    	$data['password'] = md5($data['password']);
    	$res = $user->where("username = '".$data['username']."' and password = '".$data['password']."'")->select();
    	if ($res){
    		$_SESSION['username'] = $res[0]['username'];
    		$_SESSION['user_id'] = $res[0]['user_id'];
    		$_SESSION['truename'] = $res[0]['truename'];
    		$_SESSION['bumen_id'] = $res[0]['bumen_id'];
    		$this->success("登录成功",main);
    	}else{
    		$this->error("用户名密码错误！");
    	}
    }
    public function main(){
    	if (!$_SESSION['username']){
    		$this->error("请登录！");
    	}
    	$this->display('./index');
    }
    public function logout(){
    	session(null);
    	$this->redirect(index);
    }
   
}