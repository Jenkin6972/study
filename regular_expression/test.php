<?php
$str = '<div class="" date-lazy="true" date-lazy="true" date-lazy="true">';//查看网页源代码观看效果
$str = preg_replace('/date-lazy="true"/', '', $str);
// 将会改变为'runoob'

echo $str;
