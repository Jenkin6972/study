<?php
//引用变量工作原理(cow机制 copy on write.只有当我们对$a或$b进行写操作时,才会在内存开辟一个新的空间.)

//引用的概念

//zval结构体(变量容器)

//unset(取消引用,不会销毁空间)

//对象本身就是引用传值
