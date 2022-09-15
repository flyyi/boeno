<?php
header("content-type:text/html; charset=gbk");

$con = '你好';	//短信内容
$postData=array(
	"accountname"=>"",
	"accountpwd"=>"",
	 "mobilecodes"=>"",
	"msgcontent"=>$con
);
$result = curl_post("http://csdk.zzwhxx.com:8002/submitsms.aspx",$postData);
if($result==0)
{
	echo"发送成功";
}
else
{
	echo"发送失败，错误码：{$result}";
}
function curl_post($url,$post_arr,$referer=''){
	$post_str = '';
	foreach ( $post_arr as $k => $v ) {
		$post_str .= $k . '=' . $v . '&';
	}
	$post_str = substr ( $post_str, 0, - 1 );	
	$curl = curl_init ();
	curl_setopt ( $curl, CURLOPT_URL, $url ); //要访问的地址 即要登录的地址页面	
	curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, 1 ); // 从证书中检查SSL加密算法是否存在
	curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false ); // 对认证证书来源的检查
//	curl_setopt ( $curl, CURLOPT_HTTPHEADER, $header_arr );
	curl_setopt ( $curl, CURLOPT_POST, 1 ); // 发送一个常规的Post请求
	curl_setopt ( $curl, CURLOPT_POSTFIELDS, $post_str ); // Post提交的数据包
	curl_setopt ( $curl, CURLOPT_FOLLOWLOCATION, 0 ); // 使用自动跳转
//	curl_setopt ( $curl, CURLOPT_COOKIEJAR, $cookie_file ); // 存放Cookie信息的文件名称
//	curl_setopt ( $curl, CURLOPT_COOKIEFILE, $cookie_file ); // 读取上面所储存的Cookie信息
	curl_setopt ( $curl, CURLOPT_REFERER, $referer ); //设置Referer
//	curl_setopt ( $curl, CURLOPT_USERAGENT, $_SERVER ['HTTP_USER_AGENT'] ); // 模拟用户使用的浏览器
	curl_setopt ( $curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1" ); // 模拟用户使用的浏览器
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 ); // 获取的信息以文件流的形式返回
	curl_setopt ( $curl, CURLOPT_HEADER, false ); //获取header信息
	$result = curl_exec ( $curl );
	return $result;
}
?>