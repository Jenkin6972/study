<?php

function &myFunc()
{
    static $b = 10;
    return $b;
}

echo myFunc();

$a = &myFunc();

$a = 100;

echo myFunc();
