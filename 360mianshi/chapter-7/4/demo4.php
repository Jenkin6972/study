<?php

// array_mer($arr1, $arr2, $arr3, ...... $arrn)
//
function array_mer()
{
    $return = [];
    $arrays = func_get_args();
    foreach($arrays as $arr)
    {
        if (is_array($arr))
        {
            foreach($arr as $val)
            {
                $return[] = $val;
            }
        }
    }
    return $return;
}

var_dump(array_mer([1], [1,2], [3, 4]));

