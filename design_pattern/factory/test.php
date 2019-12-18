<?php
spl_autoload_register('autoload1');//spl_autoload_register — 注册给定的函数作为 __autoload的实现

$test = Factory::createDatabase();
$test->test();
function autoload1($class){
    $dir  = __DIR__;
    //var_dump('111'.$class);
    $requireFile = $dir."\\".$class.".php";
    require $requireFile;
}