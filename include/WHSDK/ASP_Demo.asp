<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%Session.CodePage=936%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>
<body>

<form name="form1" method="post" action="ASP_Demo.asp">
  <p>平台登陆帐号：
    <input type="text" name="accountname" id="accountname" value="<%=request("accountname")%>">
  </p>
  <p>平台登陆密码：
    <input type="text" name="accountpwd" id="accountpwd" value="<%=request("accountpwd")%>">
  </p>
  <p>发送的手机号：
    <input type="text" name="mobilecodes" id="mobilecodes" value="<%=request("mobilecodes")%>">
</p>
  <p>短信内容：
    <textarea name="msgcontent" id="msgcontent" cols="50" rows="5">测试内容</textarea>
  </p>
  <p>
    <input type="submit" name="Submit" value="  确定发送  ">
  </p>
</form>
<%
Response.Charset = "gb2312"
Function BytesToBstr(body,Cset) 
dim objstream
set objstream = Server.CreateObject("adodb.stream")
objstream.Type = 1
objstream.Mode =3
objstream.Open
objstream.Write body
objstream.Position = 0
objstream.Type = 2
objstream.Charset = Cset
BytesToBstr = objstream.ReadText 
objstream.Close
set objstream = nothing
End Function
dim accountname,accountpwd,mobilecodes,msgcontent
dim obj,Request_String,Return_String

'接收表单数据
accountname = request("accountname")
accountpwd = request("accountpwd")
mobilecodes = request("mobilecodes")
msgcontent = request("msgcontent")

'判断接收的参数是否为空
if len(accountname) > 0 and len(accountpwd) > 0 and len(mobilecodes) > 0 and len(msgcontent) > 0 then
	'建立InetCtls.Inet.1组件对象
	Set https = Server.CreateObject("MSXML2.ServerXMLHTTP")
With https 
.Open "Post", "http://csdk.zzwhxx.com:8002/submitsms.aspx", False
.setRequestHeader "Content-Type","application/x-www-form-urlencoded"
.Send "accountname=" & accountname & "&accountpwd=" & accountpwd & "&mobilecodes=" & mobilecodes & "&msgcontent=" & msgcontent
Return_String = .ResponseBody
End With 
Return_String = BytesToBstr(Return_String,"GB2312")
Set https = Nothing 
	response.write "短信服务器返回值为：<span style='color:red;font-weight:bold;font-size:20px;font-family:Arial;'>" & Return_String & "</span>"
else
	response.write "<span style='color:red'>请输入完整的参数</span>"
end if
%>

</body>
</html>