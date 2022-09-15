<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/Erp/tpl/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="/Erp/tpl/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="/Erp/tpl/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public//Erp/tpl/assets/img/top.png">-->
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo (session('truename')); ?></span><a href="<?php echo U('Index/logout');?>" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        		<li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>		<li class="nav-item dl-selected"><div class="nav-item-inner nav-order">业务管理</div></li>       

      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="/Erp/tpl/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/Erp/tpl/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/Erp/tpl/assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="/Erp/tpl/assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = [{id:'1',menu:[{text:'系统管理',items:[{id:'12',text:'部门管理',href:"__APP__/Bumen/index"},{id:'3',text:'小区管理',href:'__APP__/Xiaoqu/index'},{id:'4',text:'员工管理',href:'__APP__/User/index'},{id:'6',text:'客户进度管理',href:'__APP__/Kehu/index'}]}]},{id:'7',homePage : '9',menu:[{text:'业务管理',items:[{id:'9',text:'查询业务',href:'Node/index.html'}]}]}];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>