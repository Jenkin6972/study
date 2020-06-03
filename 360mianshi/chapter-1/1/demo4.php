<?php

$a = range(0, 3);
xdebug_debug_zval('a');

$b = &$a;
xdebug_debug_zval('a');

$a = range(0, 3);
xdebug_debug_zval('a');
