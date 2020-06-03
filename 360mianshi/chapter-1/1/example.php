<?php

/**
 * 写出如下程序的输出结果
 * <?php
 *
 * $data = ['a', 'b', 'c'];
 *
 * foreach($data as $key => $val)
 * {
 *      $val = &$data[$key];
 * }
 * 程序运行时，每一次循环结束后变量$data的值是什么？请解释
 * 程序执行完成后，变量$data的值是什么？请解释
 */

$data = ['a', 'b', 'c'];

foreach ($data as $key=>$val)
{
    $val = &$data[$key];
    var_dump($data);
}

var_dump($data);


/**
 *第一次
 * $key=0,$val=a
 * 这个时候$val = &$data[0] = a;
 * 打印var_dump($data),['a','b','c']
 * 第二次
 * $key=1,$val='b'
 * 由于$val 和 $data[0]是引用赋值,此时$data[0] = 'b'
 * 这个时候$val = &data[1] = b
 * 打印var_dump($data),[b,b,c]
 * 第三次
 * $key=2,$val='c'
 * 由于$val 和 $data[1]是引用赋值,此时$data[1] = 'c'
 * 打印var_dump($data),[b,c,c]
 * foreach循环跑完
 * var_dump($data),[b,c,c]
 */
