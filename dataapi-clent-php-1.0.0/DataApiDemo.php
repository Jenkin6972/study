<?php
/**
*   Demo of DataApi
*   
*       set your information such as USERNAME, PASSWORD ... before use
*
*       especially, you can modify this Demo on your need!
*
*   @author Baidu Holmes
*/
require_once('ProfileService.php');
require_once('LoginService.php');
require_once('ReportService.php');

//preLogin,doLogin URL
define('LOGIN_URL', 'https://api.baidu.com/sem/common/HolmesLoginService');

//DataApi URL
define('API_URL', 'https://api.baidu.com/json/tongji/v1/ProductService/api');

//USERNAME
//define('USERNAME', '利日能源');
define('USERNAME', '郑捷-牛商网');

//PASSWORD
//define('PASSWORD', 'Lrny88');
define('PASSWORD', 'Qq147258');

//TOKEN
//define('TOKEN', '260ecb2bcddfaa97aa21381659cb1471');
define('TOKEN', 'c6975209d7be278420f727c58aae0cc8');

//UUID, used to identify your device, for instance: MAC address 
define('UUID', 'F8-BC-12-60-17-15');

//ACCOUNT_TYPE
define('ACCOUNT_TYPE', 1);


$loginService = new LoginService();

//preLogin
if (!$loginService->PreLogin())
{
    exit();
}


//doLogin
$ret = $loginService->DoLogin();
if ($ret)
{
    $ucid = $ret['ucid'];
    $st = $ret['st'];
}
else
{
    exit();
}


//call getsites method of profile service
$profile = new ProfileService();
//$ucid = 18732677;
//$st = "dd1a8fe71f55a7cb953c680def15143bd27d60c70ebd00421b981470015077d124d12be4ed1f4b8d1b2d62a8";
$ret = $profile->getsites($ucid, $st);

$retHead = $ret['retHead'];
$retBody = $ret['retBody'];

if(!$retHead || !$retBody)
{
    exit();
}

/*
*   Now, you have successfully call the getsites method of
*   profile service. You can deal with retHead and retBody
*   an you need.
*   For instance:Get quota cost in this call and quota remain
*           $retHeadArray = json_decode($retHead, TRUE);
*           print("This call cost quota: ".$retHeadArray['quota']."\r\n");
*           print("My account has remain quota: ".$retHeadArray['rquota']."\r\n");
*
*   In the next, we will use the first siteid of retuned site Information
*   to show: how to call query, getstatus method of report service.
*
*/

$retBodyArray = json_decode($retBody, TRUE);
$siteInfo = json_decode($retBodyArray['responseData'],TRUE);
if (count($siteInfo['sites']) > 0 )
{
    $siteid = $siteInfo['sites'][0]['siteid'];
}
else
{
    exit();
}


$report = new ReportService();

//call query method of report service
$parameter = array(
    'reportid' => 1,
    'siteid' => $siteid,
    'metrics' => array('pageviews', 'visitors', 'ips'),
    'dimensions' => array('pageid'),
    'start_time' => '20130228000000',
    'end_time' => '20130228235959',
    'filters' => array('fromType=1'),
    'start_index' => 0,
    'max_results' => 10,
    'sort' => array('pageviews desc', 'visitors asc'),
    );
$parameterJSON = json_encode($parameter);

$ret = $report->query($ucid, $st, $parameterJSON);

$retHead = $ret['retHead'];
$retBody = $ret['retBody'];

if(!$retHead || !$retBody)
{
    exit();
}

/*
*   Now, you have successfully call query method of 
*   report service. Similarly, you can deal with retHead
*   or retBody on you need.
*   In the next, we will show how to call getstauts method
*   using result_id that we have got by calling query method.
*/
$retHeadArray = json_decode($retHead, TRUE);
$retBodyArray = json_decode($retBody, TRUE);

$resultInfo = json_decode($retBodyArray['responseData'], TRUE);

if(isset($retHeadArray['status']) && $retHeadArray['status'] === 0 && isset($resultInfo['query']['result_id']))
{
    $result_id = $resultInfo['query']['result_id'];
}
else
{
    exit();
}

//sleep before call getstatus method

print("----------------------sleep----------------------\r\n");
for ($i = 0; $i < 12; $i++)
{
    print("[notice] sleep, wait for generating result\r\n");
    sleep(10);
}
print("----------------------wakeup----------------------\r\n");


//call getstatus method of report service

$parameter = array('result_id' => $result_id);
$ret = $report->getstatus($ucid, $st, json_encode($parameter));

$retHead = $ret['retHead'];
$retBody = $ret['retBody'];

if(!$retHead || !$retBody)
{
    exit();
}

$retHeadArray = json_decode($retHead, TRUE);
$retBodyArray = json_decode($retBody, TRUE);

$statusInfo = json_decode($retBodyArray['responseData'], TRUE);

if(isset($statusInfo['result']['status']))
{
    $resultStatus = $statusInfo['result']['status'];
}
else
{
    exit();
}

/* 
*   if resultStatus === 2, you can call getstatus again after sleeping for
*    a while, that will not be implemented in this Demo.
*/
if($resultStatus === 3 && isset($statusInfo['result']['result_url']))
{
    print("[notide] result_url: ".$statusInfo['result']['result_url']."\r\n");
}
else
{
    exit();
}

//doLogout, please doLogout after call DataApi services

if (isset($ret['ucid']) && isset($ret['st']))
{
    $loginService->DoLogout($ucid, $st);
}
