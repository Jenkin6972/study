<?php

class ucloud
{
    public function __construct()
    {

    }

    //下载
    public function getUclode($name){
        require_once("ucloud/proxy.php");

//存储空间名
        $bucket = "nswyun";
//上传至存储空间后的文件名称(请不要和API公私钥混淆)
        $key    = $name;

        /*
         * 访问公有Bucket的例子
         */
        $url = UCloud_MakePublicUrl($bucket, $key);
        return $url;


    }

    //上传
    public function putUclode($name,$path){
        require_once("ucloud/proxy.php");

//存储空间名
        $bucket = "nswyun";
//上传至存储空间后的文件名称(请不要和API公私钥混淆)
        $key    = $name;
//待上传文件的本地路径
        $file   = $path;

//该接口适用于0-10MB小文件,更大的文件建议使用分片上传接口
        list($data, $err) = UCloud_PutFile($bucket, $key, $file);
//    if ($err) {
//        echo "error: " . $err->ErrMsg . "\n";
//        echo "code: " . $err->Code . "\n";
//        exit;
//    }
//    echo "ETag: " . $data['ETag'] . "\n";
    }
}