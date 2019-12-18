<?php
/*
* 在插件列表中要添加的插件名
* @ pragma string $hook 插件列表名
* @ pragma string $actionFunc 插件名
*/
function addAction($hook, $actionFunc){
    global $emHooks;
    if (!@in_array($actionFunc, $emHooks[$hook])){
        $emHooks[$hook][] = $actionFunc;
    }
    return true;
}
/**
 * 插件钩子的执行函数。也就是所谓的钩子的埋入点函数
 * @param string $hook  插件列表名
 */
function doAction($hook){
    global $emHooks;
    $args = array_slice(func_get_args(), 1);//获取其他参数
    if (isset($emHooks[$hook])){
        foreach ($emHooks[$hook] as $function){
            $string = call_user_func_array($function, $args);
        }
    }
}