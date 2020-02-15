<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
function http_get($url)
{
    //$headers[] = "Content-type: application/x-www-form-urlencoded";
    //$headers[] = "Zoomkey-Auth-Token: 9CD0F0F60AFDF00";
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
    //curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $tmpInfo = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    return $tmpInfo;
}
$url = 'https://www.anyknew.com/api/v1/sites/baidu';
$resu = http_get($url);
echo $resu;