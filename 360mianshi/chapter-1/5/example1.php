<?php

/**
 * 写出如下程序的输出结果：
 * <?php
 *
 * $count = 5;
 * function get_count()
 * {
 *     static $count;
 *     return $count++;
 * }
 * echo $count;
 * ++$count;
 *
 * echo get_count();
 * echo get_count();
 * 
 * ?>
 *
 */

$count = 5;
function get_count()
{
    static $count;  
    return $count++;
}

echo $count;
++$count;

echo get_count();
echo get_count();




