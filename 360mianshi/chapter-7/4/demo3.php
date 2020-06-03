<?php

// abcdefg -> gfedcba
//
// a,b,c,d,e,f,g
//
function str_rev($str)
{
    for($i=0;true;$i++)
    {
        if(!isset($str[$i]))
        {
            break;
        }
    }
    $return = '';
    for($j=$i-1;$j>=0;$j--)
    {
        $return .= $str[$j];
    }
    return $return;
}

echo str_rev('abcdefg');
