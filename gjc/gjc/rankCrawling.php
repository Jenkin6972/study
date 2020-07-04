<?php

$ctrler=!empty($_GET['act'])?$_GET['act']:'startDetection';

$ctrler_name='crawling';

require './controller/crawling.php';

$obj=new crawling();
$action = $ctrler.'Action';
// 默认在这个对应的控制器中 所有的函数名都是以Action结尾 例如：deleteAction();
$obj->$action();// 动态函数
