<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%Session.CodePage=936%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>
<body>

<form name="form1" method="post" action="ASP_Demo.asp">
  <p>ƽ̨��½�ʺţ�
    <input type="text" name="accountname" id="accountname" value="<%=request("accountname")%>">
  </p>
  <p>ƽ̨��½���룺
    <input type="text" name="accountpwd" id="accountpwd" value="<%=request("accountpwd")%>">
  </p>
  <p>���͵��ֻ��ţ�
    <input type="text" name="mobilecodes" id="mobilecodes" value="<%=request("mobilecodes")%>">
</p>
  <p>�������ݣ�
    <textarea name="msgcontent" id="msgcontent" cols="50" rows="5">��������</textarea>
  </p>
  <p>
    <input type="submit" name="Submit" value="  ȷ������  ">
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

'���ձ�����
accountname = request("accountname")
accountpwd = request("accountpwd")
mobilecodes = request("mobilecodes")
msgcontent = request("msgcontent")

'�жϽ��յĲ����Ƿ�Ϊ��
if len(accountname) > 0 and len(accountpwd) > 0 and len(mobilecodes) > 0 and len(msgcontent) > 0 then
	'����InetCtls.Inet.1�������
	Set https = Server.CreateObject("MSXML2.ServerXMLHTTP")
With https 
.Open "Post", "http://csdk.zzwhxx.com:8002/submitsms.aspx", False
.setRequestHeader "Content-Type","application/x-www-form-urlencoded"
.Send "accountname=" & accountname & "&accountpwd=" & accountpwd & "&mobilecodes=" & mobilecodes & "&msgcontent=" & msgcontent
Return_String = .ResponseBody
End With 
Return_String = BytesToBstr(Return_String,"GB2312")
Set https = Nothing 
	response.write "���ŷ���������ֵΪ��<span style='color:red;font-weight:bold;font-size:20px;font-family:Arial;'>" & Return_String & "</span>"
else
	response.write "<span style='color:red'>�����������Ĳ���</span>"
end if
%>

</body>
</html>