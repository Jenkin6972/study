<?php
//(假设某种商品有1000件库存)首先将商品放入队列中,等待抢购
$store=1000;
$redis=new Redis();
$result=$redis->connect('127.0.0.1',6379);
$res=$redis->llen('goods_store');
echo $res;
$count=$store-$res;
for($i=0;$i<$count;$i++){
    $redis->lpush('goods_store',1);
}
echo $redis->llen('goods_store');
