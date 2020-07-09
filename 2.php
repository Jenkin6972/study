<?php
//echo 111;exit;
//header('HTTP/1.1 301 Moved Permanently');
//header('Location: http://www.test.com/');
//exit;


//$num = 1;
//
//$str = '1';
//
//$test = 1;
//var_dump($num!=$str);//false不等于判断只比较值不比较类型,
//var_dump($num!==$str);//true不全等于不仅比较值不还比较类型是否相等
//$str1 = '2';
//var_dump($num!=$str1);//true不等于判断只比较值不比较类型,

//echo ' \r aaa ';//单引号只能解析反斜线和单引号本身
//echo "\t  213 ";
//echo '<pre>';
//print_r($_SERVER);
//class Test{
//    public function doit(){
//        echo __FUNCTION__;
//    }
//
//    public function doitAgain(){
//        echo __METHOD__;
//    }
//}
//$obj = new Test();
//$obj->doit();
//echo '<br>';
//$obj->doitAgain();

//trait Hello {
//    public function sayHello() {
//        echo 'Hello ';
//    }
//}
//trait World {
//    public function sayWorld() {
//        echo 'World';
//    }
//}
//class MyHelloWorld {
//    use Hello, World;
//    public function sayExclamationMark() {
//        echo __TRAIT__;
//    }
//}
//$o = new MyHelloWorld();
//$o->sayHello();
//$o->sayWorld();
//$o->sayExclamationMark();
//var_dump($a=true);

////定义循环的数组
//$arr = array('http://www.cnblogs.com/', '博客园', 'PHP教程');
//while (list($k, $v) = each($arr)) {
//    echo $k . '=>' . $v . '<br />';
//}
////each不会重置指针
//reset($arr);
//while (list($k, $v) = each($arr)) {
//    echo $k . '=>' . $v . '<br />';
//}

//function myTest()
//{
//    static $x;
//    var_dump($x);
//    $x++;
//    echo PHP_EOL;    // 换行符
//}
//
//myTest();
//myTest();
//myTest();

//函数的引用返回
//function &test() {
//    static $b=0;//申明一个静态变量
//    $b=$b+1;
//    echo $b;
//    return $b;
//}
//
//$a=test();//这条语句会输出　$b的值　为１
//$a=5;
//$a=test();//这条语句会输出　$b的值　为2
//
//$a=&test();//这条语句会输出　$b的值　为3
//$a=5;
//$a=test();//这条语句会输出　$b的值　为6
//print_r(date_parse("2013-05-01 12:30:45.5"));
echo "Oct 3, 1975 was on a ".date("l", mktime(0,0,0,10,3,1975));
