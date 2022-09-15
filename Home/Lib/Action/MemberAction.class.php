<?php
class MemberAction extends Action{
		public function zhuce(){
			$member = D('Member');
			if (!$member->create()){
				$this->error($member->getError());
			}else{
				$res = $member->add($_POST);
				if ($res){
					//发送短信
					$con = $_POST['member_name'].'您好，恭喜您成功成为我们的会员！家汇装饰祝您生活愉快！【家汇装饰】';	//短信内容
					$postData=array(
							"accountname"=>"sdkjiazhuang",
							"accountpwd"=>"977400",
						 	"mobilecodes"=>$_POST['member_telphone'],
							"msgcontent"=>$con
					);
					$result = $member->curl_post("http://csdk.zzwhxx.com:8002/submitsms.aspx",$postData);
					/*if($result==0)
					{
						$this->success("发送成功");
					}
					else
					{
						$this->error("发送失败，错误码：{".$result."}");
					}*/
					
					$this->success("注册成功");
				}else{
					$this->error("姓名或电话已被注册");
				}
			}
		}
		public function index($lanmu_id){
			if ($_SESSION['member_id']){
				$this->redirect(ifno);
			}
			$lanmu = M('lanmu')->select($lanmu_id);
			$this->assign("lanmu",$lanmu[0]);
			$this->display('./member');
		}
		public function login(){
			if($_SESSION['verify'] != md5($_POST['verify'])) {
				$this->error('验证码错误！');
			}
			$member = M('member');
			$res = $member->where("member_name = '".$_POST['member_name']."' and member_telphone= '".$_POST['member_telphone']."'")->select();
			if($res){
				$_SESSION['member_id']=$res[0]['member_id'];
				$this->success("登录成功",ifno);
			}else{
				$this->error("姓名或电话错误");
			}
			
		}
		public function ifno(){
			$lanmu = M('lanmu')->select(34);
			$this->assign("lanmu",$lanmu[0]);
			$memberinfo = M('member')->select($_SESSION['member_id']);
			$this->assign('memberinfo',$memberinfo[0]);
			$this->display('./member_info');
		}
}