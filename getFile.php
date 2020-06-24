<?php
/** php 接收流文件
 * @param  String  $file 接收后保存的文件名
 * @return boolean
 */
function receiveStreamFile($receiveFile){

    $streamData = isset($GLOBALS['HTTP_RAW_POST_DATA'])? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

    //if(empty($streamData)){
        //$streamData = file_get_contents('php://input');
        //$streamData = file_get_contents('http://yingxiao.xuanwo001.com/xenu/downloadReport?token=5ee978b73544d66ec2210a33');
        $streamData = file_get_contents('http://yingxiao.xuanwo001.com/stopword/downloadReport?userId=5c6cd275bdf8da44fb5e9173&token=5ee988d310cb676ed8410578');
    //}

    if($streamData!=''){
        $ret = file_put_contents($receiveFile, $streamData, true);
    }else{
        $ret = false;
    }

    return $ret;

}

$receiveFile = 'receive1.html';
$ret = receiveStreamFile($receiveFile);
echo json_encode(array('success'=>(bool)$ret));
$receiveFile = <<<EOT
   <html>
   <head><title>主页</title></head>
   <body>主页内容</body>
   </html>
EOT;
?>