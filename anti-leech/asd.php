<?php
//防盗链技术
//先判断是否获取到 $_SERVER['HTTP_REFERER'] 变量
if(isset($_SERVER['HTTP_REFERER'])){
    //判断$_SERVER['HTTP_REFERER']是不是以http://localhost/开始的
    if(strpos($_SERVER['HTTP_REFERER'],"http://localhost")==0){
        echo '<img src="a.png"/>';
    }
    else{
        header("Location:warning.php");//跳转页面到warning.php
        //echo $_SERVER["HTTP_REFERER"];
    }
}
else {
    header("Location:warning.php");
}
?>