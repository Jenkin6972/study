<?php

$str = '中文';

//$pattern = '/[\x{4e00}-\x{9fa5}]/u';

//$pattern = '/['.chr(0xb0).'-'.chr(0xf7).']['.chr(0xa1).'-'.chr(0xfe).']/';

preg_match($pattern, $str, $match);

var_dump($match);
