<?php
//阻塞写入代码:必须等上一个脚本完全执行完,才轮到下一个脚本
$file = fopen("test.txt","w+");

$t1 = microtime(TRUE);
if (flock($file,LOCK_EX))
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