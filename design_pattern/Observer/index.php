<?php

//spl_autoload_register(function ($className){
//    $className = str_replace('\\','/',$className);
//    //var_dump(__DIR__.'/'.$className.".php");
//    include "Observer/".$className.".php";
//});
require_once "../autoload.php";
use Observer\ObserverA;
use Observer\ObserverB;
use Observer\Subject;
/*

ObserverA get state:init A
ObserverB get state:init B
ObserverA get state:hello
ObserverB get state:hello
*/
$subject = new Subject();
$objectA = new ObserverA($subject);
$objectB = new ObserverB($subject);
echo $objectA->getSate();
echo '<br/>';
echo $objectB->getSate();
echo '<br/>';
$subject->seState("hello");
echo $objectA->getSate();
echo '<br/>';
echo $objectB->getSate();
echo '<br/>';