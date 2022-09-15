<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Erp/Tpl/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Erp/Tpl/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Erp/Tpl/Css/style.css" />
    <script type="text/javascript" src="/Erp/Tpl/Js/jquery.js"></script>
    <script type="text/javascript" src="/Erp/Tpl/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Erp/Tpl/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Erp/Tpl/Js/ckform.js"></script>
    <script type="text/javascript" src="/Erp/Tpl/Js/common.js"></script>

 

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">    
    员工名称：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增员工</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>员工id</th>
        <th>用户名</th>
        <th>真实姓名</th>
        <th>部门</th>
        <th>邮箱</th>
        <th>电话</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["user_id"]); ?></td>
            <td><?php echo ($vo["username"]); ?></td>
            <td><?php echo ($vo["truename"]); ?></td>
            <td><?php echo ($vo["bumen_name"]); ?></td>
            <td><?php echo ($vo["email"]); ?></td>
            <td><?php echo ($vo["telphone"]); ?></td>
            <td>
                <a href="<?php echo U('User/edit',array('id'=>$vo[user_id]));?>">编辑</a>                
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>	
</table>
</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="<?php echo U('User/add');?>";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>