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
//echo "Oct 3, 1975 was on a ".date("l", mktime(0,0,0,10,3,1975));

/*class Cls1 {
    public $var1 = 111;
    protected  $var2 = 222;
    private $var3 = 333;
    public function func() {}
}

$s = "111";

$n = 1;
$b = false;
$f = 1.1222;
$o = new Cls1();
$arr = ['1' => 1, "3", 5, $o];

print_r($s); // '111'
print_r($n); // 1
print_r($b); // ''
print_r($f); // 1.1222
print_r($arr);*/


/*$n = 11;
$s = "22";
$f = "22";

printf("%d%s%f", $n, $s, $f); // 112222.000000

$s2 = sprintf("%d%s%f", $n, $s, $f);
echo $s2; // 112222.000000*/

/*//$str = addslashes('What \ does "yolo" mean?');
$str = addslashes('NULL');
echo($str);
//var_dump(get_magic_quotes_gpc());*/

/*$arr = array('Hello','World!','Beautiful','Day!');
echo join("-",$arr);*/

/*echo number_format("1000000")."<br>";
echo number_format("1000000",2)."<br>";
echo number_format("1000000",2,".","/");*/

/*parse_str("name=Peter&age=43");
echo $name."<br>";
echo $age;
parse_str("name=Peter&age=43",$myArray);
print_r($myArray);*/

/*$str = "Hello world. (can you hear me?)";
echo quotemeta($str);*/

/*//echo strchr("Hello world!","world");
echo strstr("Hello world!","world");*/

/*$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
print_r(array_change_key_case($age,CASE_UPPER));*/

/*$cars=array("Volvo","BMW","Toyota","Honda","Mercedes");
echo '<pre>';
print_r(array_chunk($cars,2));*/

/*$fname=array("Peter","Ben","Joe");
$age=array("35","37","43");

$c=array_combine($fname,$age);
print_r($c);*/


/*function func_odd($var)
{
    // returns whether the input integer is odd
    return($var & 1);
}

function even($var)
{
    // returns whether the input integer is even
    return(!($var & 1));
}

$array1 = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);
$array2 = array(6, 7, 8, 9, 10, 11, 12);

echo "Odd :\n";
print_r(array_filter($array1, "func_odd"));//回调函数
echo "Even:\n";
print_r(array_filter($array2, "even"));*/

/*$a=array("a"=>"red","b"=>"green","c"=>"red");
print_r(array_unique($a));*/

/*function myfunction($value,$key)
{
    //echo "The key $key has the value $value<br>";
    echo $value.'1';
}
$a=array("a"=>"red","b"=>"green","c"=>"blue");
array_walk($a,"myfunction");*/
/*$userinfo = "Name: <b>PHP</b> <br> Title: <b>Programming Language</b>";
preg_match_all ("/<b>(.*)<\/b>/U", $userinfo, $pat_array);
print_r($pat_array[0]);*/
/*$str = 'runo o   b';
$str = preg_replace('/\s+/', '', $str);
// 将会改变为'runoob'
echo $str;*/
//使用逗号或空格(包含" ", \r, \t, \n, \f)分隔短语
/*$keywords = preg_split("/[\s,]+/", "hypertext language, programming");
print_r($keywords);*/
/**
 * 工厂模式
 */
/*//生产汽车的标准
interface carNorms{
    function engine();//引擎
    function body();//车身
    function whell();//轮子
}

//生产小汽车
class car implements carNorms{

    public function engine(){
        return '汽车引擎';
    }

    public function body(){
        return '汽车车身';
    }

    public function whell(){
        return '汽车轮子';
    }

}

//生产巴士车
class bus implements carNorms{

    public function engine(){
        return '巴士引擎';
    }

    public function body(){
        return '巴士车身';
    }

    public function whell(){
        return '巴士轮子';
    }

}

//汽车工厂
class carFactory{

    static public function carInstance($type){
        $instance='';
        switch($type){
            case 'car':
                $instance=new car();
                break;
            case 'bus':
                $instance=new bus();
                break;
            default:
                throw new Exception('本工厂无法生产这种类型的车');
        }
        if(!$instance instanceof carNorms){
            throw new Exception('这种车不符合生产标准');
        }
        return $instance;
    }

}

try {
    $createCar=carFactory::carInstance('bus');
    $car['engine']=$createCar->engine();
    $car['body']=$createCar->body();
    $car['whell']=$createCar->whell();
    print_r($car);
}catch (\Exception $e){
    echo $e->getMessage();//捕获异常,避免直接输出
}*/
/*
 * 工厂模式
 */
/*class Config1 {}
class Config
{
//* 必须先声明一个静态私有属性:用来保存当前类的实例
//* 1. 为什么必须是静态的?因为静态成员属于类,并被类所有实例所共享
//* 2. 为什么必须是私有的?不允许外部直接访问,仅允许通过类方法控制方法
//* 3. 为什么要有初始值null,因为类内部访问接口需要检测实例的状态,判断是否需要实例化

    private static $instance = null;
//保存用户的自定义配置参数
    private $setting = [];
//构造器私有化:禁止从类外部实例化
    private function __construct(){}
//克隆方法私有化:禁止从外部克隆对象
    private function __clone(){}
    //因为用静态属性返回类实例,而只能在静态方法使用静态属性
    //所以必须创建一个静态方法来生成当前类的唯一实例
    public static function getInstance()
    {
        //检测当前类属性$instance是否已经保存了当前类的实例
        if (self::$instance == null) {
            //如果没有,则创建当前类的实例
            self::$instance = new self;
        }
        //如果已经有了当前类实例,就直接返回,不要重复创建类实例
        return self::$instance;
    }
//设置配置项
    public function set($index, $value)
    {
        $this->setting[$index] = $value;
    }
//读取配置项
    public function get($index)
    {
        return $this->setting[$index];
    }
}
$obj1 = new Config1;
$obj2 = new Config1;
var_dump($obj1);
var_dump($obj2);
echo '<hr>';
//实例化Config类
$obj1 = Config::getInstance();
$obj2 = Config::getInstance();
var_dump($obj1,$obj2);
$obj1->set('host','localhost');
$obj2->set('host','127.0.0.1');
echo $obj1->get('host');
echo $obj2->get('host');*/

/*
 * 注册树模式
 */
//创建单例
//class Single{
//    public $hash;
//    static protected $ins=null;
//    final protected function __construct(){
//        $this->hash=rand(1,9999);
//    }
//
//    static public function getInstance(){
//        if (self::$ins instanceof self) {
//            return self::$ins;
//        }
//        self::$ins=new self();
//        return self::$ins;
//    }
//}
//
////工厂模式
//class RandFactory{
//    public static function factory(){
//        return Single::getInstance();
//    }
//}
//
////注册树
//class Register{
//    protected static $objects;
//    public static function set($alias,$object){
//        self::$objects[$alias]=$object;
//    }
//    public static function get($alias){
//        return self::$objects[$alias];
//    }
//    public static function _unset($alias){
//        unset(self::$objects[$alias]);
//    }
//}
//
//Register::set('rand',RandFactory::factory());
//
//$object=Register::get('rand');
//
//print_r($object);
//echo phpinfo();exit;
/*class Config1 {}
class Config
{
//* 必须先声明一个静态私有属性:用来保存当前类的实例
//* 1. 为什么必须是静态的?因为静态成员属于类,并被类所有实例所共享
//* 2. 为什么必须是私有的?不允许外部直接访问,仅允许通过类方法控制方法
//* 3. 为什么要有初始值null,因为类内部访问接口需要检测实例的状态,判断是否需要实例化

    private static $instance = null;
//保存用户的自定义配置参数
    private $setting = [];
//构造器私有化:禁止从类外部实例化
    private function __construct(){}
//克隆方法私有化:禁止从外部克隆对象
    private function __clone(){}
    //因为用静态属性返回类实例,而只能在静态方法使用静态属性
    //所以必须创建一个静态方法来生成当前类的唯一实例
    public static function getInstance()
    {
        //检测当前类属性$instance是否已经保存了当前类的实例
        if (self::$instance == null) {
            //如果没有,则创建当前类的实例
            self::$instance = new self();
        }
        //如果已经有了当前类实例,就直接返回,不要重复创建类实例
        return self::$instance;
    }
//设置配置项
    public function set($index, $value)
    {
        $this->setting[$index] = $value;
    }
//读取配置项
    public function get($index)
    {
        return $this->setting[$index];
    }
}
$obj1 = new Config1;
$obj2 = new Config1;
var_dump($obj1,$obj2);
echo '<hr>';
//实例化Config类
$obj1 = Config::getInstance();
$obj2 = Config::getInstance();
var_dump($obj1,$obj2);
$obj1->set('host','localhost');
echo $obj1->get('host');*/
/*class customException extends Exception
{
    public function errorMessage()
    {
        // 错误信息
        $errorMsg = '错误行号 '.$this->getLine().' in '.$this->getFile()
            .': <b>'.$this->getMessage().'</b> 不是一个合法的 E-Mail 地址';
        return $errorMsg;
    }
}

$email = "someone@example...com";

try
{
    // 检测邮箱
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
    {
        // 如果是个不合法的邮箱地址，抛出异常
        throw new customException($email);
    }
}

catch (customException $e)
{
//display custom message
    echo $e->errorMessage();
}*/
//echo phpinfo();exit;
/*class customException extends Exception
{
    public function errorMessage()
    {
        // 错误信息
        $errorMsg = '错误行号 '.$this->getLine().' in '.$this->getFile()
            .': <b>'.$this->getMessage().'</b> 不是一个合法的 E-Mail 地址';
        return $errorMsg;
    }
}

$email = "someone@example.com";

try
{
    // 检测邮箱
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
    {
        // 如果是个不合法的邮箱地址，抛出异常
        throw new customException($email);
    }
    // 检测 "example" 是否在邮箱地址中
    if(strpos($email, "example") !== FALSE)
    {
        throw new Exception("$email 是 example 邮箱");
    }
}
catch (customException $e)
{
    echo $e->errorMessage();
}
catch(Exception $e)
{
    echo $e->getMessage();
}*/

/*function myException($exception)
{
    echo "<b>Exception:</b> " , $exception->getMessage();
}

set_exception_handler('myException');

throw new Exception('Uncaught Exception occurred');*/
//echo "<a href=''>111</a>";

//echo '<a href="mailto:17724716830@163.com?subject=邮件标题&body=邮件内容">告诉我们</a>';

//sleep(5);
$data = ['1',2,3,4,5,6];
foreach($data as $val){
    var_dump($val);
}exit;