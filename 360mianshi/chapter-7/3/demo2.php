<?php

// open_door  make_by_id
//
function strHandle($str)
{
    $return = '';
    $arr = explode('_', $str);
    foreach($arr as $val)
    {
        $return .= ucfirst($val);
    }
    return $return;
}

echo strHandle('make_by_id');
