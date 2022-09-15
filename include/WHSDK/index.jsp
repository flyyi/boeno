<%@ page language="java" import="java.util.*" pageEncoding="utf-8"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>My JSP 'index.jsp' starting page</title>
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->
  </head>
  
  <body>
   SMS TEST <br>
   <form action="http://csdk.zzwhxx.com:8002/submitsms.aspx" method="get">
   		   <input name="accountname" value=""/>
  		   <input name="accountpwd" value=""/>
    	   <input name="mobilecodes" value=""/>
     	   <input name="msgcontent" value=""/>
     	    
     	   <input type="submit" value="OK"/>
   </form>
  </body>
</html>
