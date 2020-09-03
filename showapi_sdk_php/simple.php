<?php
//更多说明请访问仓库地址：https://github.com/showapi-public/showapi_sdk_php
//支持php5.5以上版本
include_once 'Util/Autoloader.php';//包含sdk中的自动导入工具类
$url = "http://route.showapi.com/1991-1";
$METHOD = "POST";
$showapi_appid="340384";//替换此值,你可以在这里找到 https://www.showapi.com/console#/myApp
$showapi_sign="16082b9f645745a189a249ecc2c69e71";//替换此值,你可以在这里找到 https://www.showapi.com/console#/myApp

$req = new ShowapiRequest($url,$showapi_appid,$showapi_sign);
$req->addTextPara("company_kw","腾讯");
$req->addTextPara("limit","10");
$req->addTextPara("offset","0");
$req->addTextPara("start_date","2019-01-01");
$req->addTextPara("end_date","2020-12-30");
$response=$req->post();

print_r($response->getContent());
