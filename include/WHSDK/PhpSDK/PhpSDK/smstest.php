<?php
header("content-type:text/html; charset=gbk");

$con = '���';	//��������
$postData=array(
	"accountname"=>"",
	"accountpwd"=>"",
	 "mobilecodes"=>"",
	"msgcontent"=>$con
);
$result = curl_post("http://csdk.zzwhxx.com:8002/submitsms.aspx",$postData);
if($result==0)
{
	echo"���ͳɹ�";
}
else
{
	echo"����ʧ�ܣ������룺{$result}";
}
function curl_post($url,$post_arr,$referer=''){
	$post_str = '';
	foreach ( $post_arr as $k => $v ) {
		$post_str .= $k . '=' . $v . '&';
	}
	$post_str = substr ( $post_str, 0, - 1 );	
	$curl = curl_init ();
	curl_setopt ( $curl, CURLOPT_URL, $url ); //Ҫ���ʵĵ�ַ ��Ҫ��¼�ĵ�ַҳ��	
	curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, 1 ); // ��֤���м��SSL�����㷨�Ƿ����
	curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false ); // ����֤֤����Դ�ļ��
//	curl_setopt ( $curl, CURLOPT_HTTPHEADER, $header_arr );
	curl_setopt ( $curl, CURLOPT_POST, 1 ); // ����һ�������Post����
	curl_setopt ( $curl, CURLOPT_POSTFIELDS, $post_str ); // Post�ύ�����ݰ�
	curl_setopt ( $curl, CURLOPT_FOLLOWLOCATION, 0 ); // ʹ���Զ���ת
//	curl_setopt ( $curl, CURLOPT_COOKIEJAR, $cookie_file ); // ���Cookie��Ϣ���ļ�����
//	curl_setopt ( $curl, CURLOPT_COOKIEFILE, $cookie_file ); // ��ȡ�����������Cookie��Ϣ
	curl_setopt ( $curl, CURLOPT_REFERER, $referer ); //����Referer
//	curl_setopt ( $curl, CURLOPT_USERAGENT, $_SERVER ['HTTP_USER_AGENT'] ); // ģ���û�ʹ�õ������
	curl_setopt ( $curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1" ); // ģ���û�ʹ�õ������
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 ); // ��ȡ����Ϣ���ļ�������ʽ����
	curl_setopt ( $curl, CURLOPT_HEADER, false ); //��ȡheader��Ϣ
	$result = curl_exec ( $curl );
	return $result;
}
?>