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
<form action="<?php echo U('User/editok');?>" method="post" class="definewidth m20">
<table class="table table-bordered table-hover definewidth m10">
    <input type="hidden" name="user_id" value='<?php echo ($user["user_id"]); ?>'/>
    <tr>
        <td width="10%" class="tableleft">登录名</td>
        <td><input type="text" name="username" value='<?php echo ($user["username"]); ?>'/></td>
    </tr>
    <tr>
        <td class="tableleft">部门</td>
        <td>
        	<select name='bumen_id'>
        		<option value='<?php echo ($user["bumen_id"]); ?>'><?php echo ($user["bumen_name"]); ?></option>
        		<?php if(is_array($bumen)): $i = 0; $__LIST__ = $bumen;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["bumen_id"]); ?>'><?php echo ($vo["bumen_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        	</select>
        </td>
    </tr>
    <tr>
        <td class="tableleft">真实姓名</td>
        <td><input type="text" name="truename" value='<?php echo ($user["truename"]); ?>'/></td>
    </tr>
    <tr>
        <td class="tableleft">电话</td>
        <td><input type="text" name="telphone" value='<?php echo ($user["telphone"]); ?>'/></td>
    </tr>
    <tr>
        <td class="tableleft">邮箱</td> 
        <td><input type="text" name="email" value='<?php echo ($user["email"]); ?>'/></td>
    </tr>
    <tr>
        <td class="tableleft">状态</td>
        <td>
            <input type="radio" name="status" value="1" <?php if($user["status"] == 1): ?>checked<?php endif; ?>/> 在职
            <input type="radio" name="status" value="0" <?php if($user["status"] == 0): ?>checked<?php endif; ?>/> 离职
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="<?php echo U('User/index');?>";
		 });

    });
</script>