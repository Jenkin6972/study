<?php
//非阻塞写入代码：（只要文件被占用，则显示Error locking file!）：
//只要文件被占用,就返回else分支的结果
$file = fopen("test.txt","a+");

$t1 = microtime(TRUE);
if (flock($file,LOCK_EX|LOCK_NB))
{
    sleep(10);
    fwrite($file,"Write something");
    flock($file,LOCK_UN);
    echo "Ok locking file!";
}
else
{
    echo "Error locking file!";
}

fclose($file);

$t2 = microtime(TRUE);
echo sprintf("%.6f",($t2-$t1));