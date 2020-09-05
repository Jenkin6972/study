<?php
//echo htmlspecialchars($_GET['name']);
//$str = 'hello你好世界';
//echo strlen($str);
//echo 111;
//header("HTTP/1.0 404 Not Found");


/*function mystrtoupper($a){

    $b = str_split($a, 1);

    $r = '';

    foreach($b as $v){

        $v = ord($v);

        if($v >= 97 && $v<= 122){

            $v -= 32;

        }

        $r .= chr($v);

    }

    return $r;

}





$a = 'a中你继续F@#$%^&*(BMDJFDoalsdkfjasl';

echo 'origin string:'.$a."\n";

echo 'result string:';

$r = mystrtoupper($a);

var_dump($r);*/


$str = '思源博客siyuantlw/tlw/sy/俺只是一个打酱油的';

//$str = iconv("GB2312",'UTF-8//IGNORE',$str);

$str = urlencode($str);
?>
<html>
<script>
    var ds = '<?php echo $str;?>';
    var ddd = decodeURIComponent(ds);
    alert(ddd);
</script>
</html>





