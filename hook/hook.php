<?php
define("APP_ROOT",str_replace("\\","/",dirname(__FILE__))."/");
require("function.php"); //加载功能函数
/**
 * 加载插件路径
 * 一般情况下，我们要先存储和判断插件是否激活，
 *你可以保存在数据库中，也可以保存在文件配置缓存中
 */
function load_plugins_file($plugin) {
    //要判断和检查。
    if(is_string($plugin) && preg_match("/^[\w\-\/]+$/", $plugin) && file_exists(APP_ROOT."plugins/".$plugin.".php")){
        require APP_ROOT."plugins/".$plugin.".php";
    }
}
//演示的插件例子
$pluginsName = array("check_all","login");
foreach($pluginsName as $plugin){
    load_plugins_file($plugin);
}
//埋下的钩子
doAction("fbbin");