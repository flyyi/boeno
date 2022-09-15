<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Erp/tpl/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Erp/tpl/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Erp/tpl/Css/style.css" />
    <script type="text/javascript" src="/Erp/tpl/Js/jquery.js"></script>
    <script type="text/javascript" src="/Erp/tpl/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Erp/tpl/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Erp/tpl/Js/ckform.js"></script>
    <script type="text/javascript" src="/Erp/tpl/Js/common.js"></script>

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
  <button type="button" class="btn btn-success" id="addnew">新增客户</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>客户编号</th>
        <th>客户名称</th>
        <th>地址</th>
        <th>电话</th>
        <th>设计师</th>
        <th>来源</th>
        <th>其他</th>
        <th>咨询</th>
        <th>回访</th>
        <th>量房</th>
        <th>预算</th>
        <th>定金</th>
        <th>设计</th>
        <th>合同</th>
        <th>完工</th>
    </tr>
    </thead>
	     
	     <tr >
            <td><?php echo ($vo["xiaoqu_id"]); ?></td>
            <td><?php echo ($vo["xiaoqu_name"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
        </tr>
        
 </table>
<script type='text/javascript'>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="<?php echo U('Xiaoqu/add');?>";
		 });


    });
</script>
</body>
</html>