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
  <button type="button" class="btn btn-success" id="addnew">新增小区</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>小区编号</th>
        <th>小区名称</th>
        <th>地址</th>
        <th>管理操作</th>
    </tr>
    </thead>
	     <?php if(is_array($xiaoqu)): $i = 0; $__LIST__ = $xiaoqu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
            <td><?php echo ($vo["xiaoqu_id"]); ?></td>
            <td><?php echo ($vo["xiaoqu_name"]); ?></td>
            <td><?php echo ($vo["address"]); ?></td>
            <td>
                  <a href="<?php echo U('Xiaoqu/edit',array('id'=>$vo[xiaoqu_id]));?>">编辑</a>
                  <a href="<?php echo U('Xiaoqu/del',array('id'=>$vo[xiaoqu_id]));?>" onclick="javascript:return confirm('确定要删除吗？');">删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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