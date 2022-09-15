<?php
$home_config =  array(
	'TAGLIB_LOAD'               => true,//加载标签库打开
    'APP_AUTOLOAD_PATH'         =>'@.TagLib',
    'TAGLIB_BUILD_IN'           =>'Cx,Lists',
);
return array_merge(include'./data/conf/db.php',$home_config);
?>