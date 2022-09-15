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
<form action="<?php echo U('Bumen/editok');?>" method="post">
<table class="table table-bordered table-hover definewidth m10">
    <input type="hidden" name="bumen_id" value='<?php echo ($bumen["bumen_id"]); ?>'/>
    <tr>
        <td class="tableleft">部门名称</td>
        <td><input type="text" name="bumen_name" value='<?php echo ($bumen["bumen_name"]); ?>'/></td>
    </tr>   
    <tr>
        <td class="tableleft">状态</td>
        <td>
            <input type="radio" name="status" value="1" <?php if($bumen["status"] == 1): ?>checked<?php endif; ?>/> 启用
            <input type="radio" name="status" value="0" <?php if($bumen["status"] == 0): ?>checked<?php endif; ?>/> 禁用
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="<?php echo U('Bumen/index');?>";
		 });

    });
</script>