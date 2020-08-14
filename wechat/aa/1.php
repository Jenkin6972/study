<?php
$id='wx1fcb51f06f9d24ef';
$secret="0676870e974d581a78c7b9f2dab1861b";
$_token='weixin';
$_appkey='';
include_once 'WeChat.class.php';
$wechat = new WeChat($id,$secret,$_token,$_appkey);
$content = mt_rand(0,9999);
$wechat->getQRCode($content,'images/1.jpeg');
//$wechat->getUserInfo();