<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this->display("Public/login");
    }
    public function check(){
    	$user = M('user');
	    if($_SESSION['verify'] != md5($_POST['verify'])) {
		   $this->error('验证码错误！');
		}
		$data = array("username"=>I('post.username'),
			("password")=>md5(I('post.password'))
		);
    	$res = $user->where($data)->count();
    	if($res>=1){
    		session('username',I('post.username'));
    		$this->success("登录成功","__APP__/Index/main");
    	}else{
    		$this->error("登录失败");
    	}
    }
    public function logout(){
    	session('username',null);
    	$this->success("注销成功！",index); 
    }
    public function main(){
    	if(!session('username')){
				$this->error("请登录!","./index");
		}else{
			$lanmu = M('lanmu');
				
			//单页栏目
			$resdy = $lanmu->where('lanmutype = 1 and toplanmu_id = 0')->select();
			$a = "";
			foreach ($resdy as &$temp){
				$temp['model'] = 'Danye';
				$temp['action'] = 'index';
				$a .="{id:'".$temp['lanmu_id']."',text:'".$temp['lanmu_name']."',href:'__APP__/".$temp['model']."/".$temp['action']."?id=".$temp['lanmu_id']."'},";
			}
			$a = substr($a,0,-1);
			$this->assign("dylanmu",$a);
    		//文章列表
    		$resarticle = $lanmu->where('lanmutype = 2')->select();
    		$b = "";
    		foreach ($resarticle as &$temp){
    			$temp['model'] = 'Article';
    			$temp['action'] = 'index';
    			$b .="{id:'".$temp['lanmu_id']."',text:'".$temp['lanmu_name']."',href:'__APP__/".$temp['model']."/".$temp['action']."?id=".$temp['lanmu_id']."'},";
    				
    		}
    		$b = substr($b,0,-1);
    		$this->assign("articlelanmu",$b);
    		
    		
			$this->display("./index");
		}
    }
}