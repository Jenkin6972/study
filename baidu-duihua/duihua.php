<?php
/**
 * 发起http post请求(REST API), 并获取REST请求的结果
 * @param string $url
 * @param string $param
 * @return - http response body if succeeds, else false.
 */
function request_post($url = '', $param = '')
{
    if (empty($url) || empty($param)) {
        return false;
    }
    $postUrl = $url;
    $curlPost = $param;
    // 初始化curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $postUrl);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    // 要求结果为字符串且输出到屏幕上
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // post提交方式
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    // 运行curl
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}
$token = '24.3d4871dce7f3be1965d56fe54ae768c1.2592000.1586416048.282335-18764538';
$url = 'https://aip.baidubce.com/rpc/2.0/unit/service/chat?access_token=' . $token;
$bodys = '{"log_id":"UNITTEST_100002312312","version":"2.0","service_id":"S27788","session_id":"","request":{"query":"你好","user_id":"88888"},"dialog_state":{"contexts":{"SYS_REMEMBERED_SKILLS":[""]}}}';
$res = request_post($url, $bodys);
var_dump($res);