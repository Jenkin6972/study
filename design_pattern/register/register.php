<?php
//注册模式，解决全局共享和交换对象。已经创建好的对象，挂在到某个全局可以使用的数组上，
//在需要使用的时候，直接从该数组上获取即可。将对象注册到全局的树上。任何地方直接去访问。
class Register
{
    protected static $objects;

    function set($alias, $object)//将对象注册到全局的树上
    {
        self::$objects[$alias] = $object;//将对象放到树上
    }

    static function get($name)
    {
        return self::$objects[$name];//获取某个注册到树上的对象
    }

    function _unset($alias)
    {
        unset(self::$objects[$alias]);//移除某个注册到树上的对象。
    }
}