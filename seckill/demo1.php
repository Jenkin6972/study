<?php
//php结合实现高并发下的抢购、秒杀功能(常规方案)
//常规写法：
//查询出对应商品的库存，看是否大于0，然后执行生成订单等操作，但是在判断库存是否大于0处，如果在高并发下就会有问题，导致库存量出现负数
//(解决方案一:优化方案1：将库存字段number字段设为unsigned，当库存为0时，就算用户进来了做库存的扣除的更新操作，将会返回false,然后回滚)
$conn=mysql_connect("localhost","root","root");
if(!$conn){
    echo "connect failed";
    exit;
}
mysql_select_db("test",$conn);
mysql_query("set names utf8");

$price=10;
$user_id=1;
$goods_id=1;
$sku_id=11;
$number=1;

//生成唯一订单
function build_order_no(){
    return date('ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}
//记录日志
function insertLog($event,$type=0){
    global $conn;
    $sql="insert into ih_log(event,type) values('$event','$type')";
    mysql_query($sql,$conn);
}

//模拟下单操作
//库存是否大于0
$sql="select number from ih_store where goods_id='$goods_id' and sku_id='$sku_id'";//解锁 此时ih_store数据中goods_id='$goods_id' and sku_id='$sku_id' 的数据被锁住(注3)，其它事务必须等待此次事务 提交后才能执行
$rs=mysql_query($sql,$conn);
$row=mysql_fetch_assoc($rs);
if($row['number']>0){//高并发下会导致超卖
    $order_sn=build_order_no();
    //生成订单
    $sql="insert into ih_order(order_sn,user_id,goods_id,sku_id,price) values('$order_sn','$user_id','$goods_id','$sku_id','$price')";
    $order_rs=mysql_query($sql,$conn);

    //库存减少
    $sql="update ih_store set number=number-{$number} where sku_id='$sku_id' and number>0";
    $store_rs=mysql_query($sql,$conn);
    if(mysql_affected_rows()){
        insertLog('库存减少成功');
    } else{
        insertLog('库存减少失败');
    }
}else{
    insertLog('库存不够');
}
?>