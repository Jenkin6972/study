<?php
//使用PHP SDK，并且使用自定义配置文件
include 'BaiduBce.phar';
require 'SampleConf.php';

use BaiduBce\BceClientConfigOptions;
use BaiduBce\Util\Time;
use BaiduBce\Util\MimeTypes;
use BaiduBce\Http\HttpHeaders;
use BaiduBce\Services\Bos\BosClient;

//调用配置文件中的参数
global $BOS_TEST_CONFIG;
//新建BosClient
$client = new BosClient($BOS_TEST_CONFIG);
var_dump($client);
$bucketName = "nsw-cloud";

//Bucket是否存在，若不存在创建Bucket
$exist = $client->doesBucketExist($bucketName);
if(!$exist){
    $bucket=$client->createBucket($bucketName);
}
var_dump($bucket);exit;
$filename = "./14.png";
$userMeta = array("private" => "private data");
$options = array(
    //BosOptions::PART_SIZE => 5 * 1024 * 1024,
    //BosOptions::USER_METADATA => $userMeta
);
$client->putSuperObjectFromFile($bucket, $object, $filename, $options);