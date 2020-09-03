<?php
namespace app\index\controller;
use ali\Send;
use think\Container;

class Index
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function test(){
        return (new Send())->test();
    }

    public function testapp(){
        var_dump(\Config::get("default_jsonp_handler"));
    }
    public function personbuy(){
        /*
        \di\Container::getInstance()->set('person',new \di\Person(new \di\Car()));
        //\di\Container::getInstance()->set('car',new \di\Car());
        $obj = \di\Container::getInstance()->get('person');
        dump($obj->buy());
        */
        //修改成使用反射类的形式去实现
        \di\Container::getInstance()->set('person',"\di\Person");
        //\di\Container::getInstance()->set('car',"\di\Car");
        $obj = \di\Container::getInstance()->get('person');
        dump($obj->buy());
    }
    public function test111(){
        //可以在provider.php文件进行配置绑定,这样就可以直接在容器中拿到car类
        echo Container::get('car')->buy();
    }
    public function test222(){
        $obj = new \di\Person(new \di\Car());
        echo $obj->buy();
    }
}
