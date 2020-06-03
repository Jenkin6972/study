<?php
//echo 111;exit;
//header('HTTP/1.1 301 Moved Permanently');
//header('Location: http://www.test.com/');
//exit;


$num = 1;

$str = '1';

$test = 1;
var_dump($num!=$str);//false不等于判断只比较值不比较类型,
var_dump($num!==$str);//true不全等于不仅比较值不还比较类型是否相等
$str1 = '2';
var_dump($num!=$str1);//true不等于判断只比较值不比较类型,