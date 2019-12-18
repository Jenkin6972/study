<?php
function __autoload($class){
    // $class代表什么意思？
    // echo $class;//当你echo 信息时会发现 出来Mysql Upload Form 那么这些数据是怎么来的呢，。原因是底下实例化了，当底下实例化一个对象时，系统会自动检查你引入此文件，如果没有引入，自动帮你引入,但是注意一个问题，在写类名时一定要和文件名称一样，否则会引入文件失败
    //var_dump(__DIR__);
    //var_dump($class.".php");
    include $class.".php";//引入文件
}