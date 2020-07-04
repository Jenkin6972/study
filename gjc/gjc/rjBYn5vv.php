<?php

$star_time=strtotime(date("Y-m-d"));

$pdo = new PDO("mysql:host=10.1.9.51;dbname=nsy_db", "pmcx", "2xZenvOTGzCn");

$sql_buy="select rl.* from nsw_order_ranking_log_list_new_copy as rl left join nsw_order_kwranking_keywords as okk on rl.kid = okk.kid where rl.l_date_num > '{$star_time}' and okk.channel_id = 1 AND rl.rank < 11";

$sth_buy=$pdo->query($sql_buy);

$tablename=$sth_buy->fetchAll(PDO::FETCH_ASSOC);



foreach ($tablename as $key=>$val){

    $sql="SELECT id,user_id FROM nsw_test_rank_verification WHERE add_time > '$star_time' and kid = '{$val['kid']}'";
    $sthhuy=$pdo->query($sql);

    $data_user=$sthhuy->fetch();


    if(!empty($data_user)){
        continue;
    }

    $s=rand(1,3);
    sleep($s);

    $result=rank_verification($val['keywords'],$val['url']);
    if($result['status']){
        $rank_p=$val['rank'];
    }else{
      $rank_p=15;
    }
    $rank_z_time=date("Y-m-d H:i:s",$val['add_time_w']);
    $rank_z=$val['rank_w'];

    $rank_s_time=$val['l_date'];
    $rank_s=$val['rank'];

    $rank_p_time=date("Y-m-d H:i:s");
    $user_id=$val['user_id'];

    $kid=$val['kid'];
    $add_time=time();

    $snapshot=$result['path'];
    $bid=$val['id'];

    $sqls = " UPDATE nsw_order_ranking_log_list_new_copy SET path = '$snapshot' WHERE id = '{$val['id']}'" ;
    $sth_buyss=$pdo->exec($sqls);


    $sql = "INSERT INTO nsw_test_rank_verification (user_id,rank_s,rank_z,rank_p,rank_s_time,rank_z_time,rank_p_time,kid,add_time,snapshot,b_id) VALUES
            ('$user_id','$rank_s','$rank_z','$rank_p','$rank_s_time','$rank_z_time','$rank_p_time','$kid','$add_time','$snapshot','$bid')" ;

    $sth_buy=$pdo->exec($sql);


}


//检测是否在首页
function rank_verification($key_word,$domain){
    $word = urlencode($key_word);//需要对关键词进行url解析,否者部分带字符的标题会返回空
    $url = 'https://www.baidu.com/s?ie=UTF-8&wd='.$word.'&p_tk=811947wzUlkTdW7YQz2fkT2cshB%2F54maSfeRtq4ta039Xo9wjhtmzRQjT8ZtJdOmIeEmiF66o2mUFnZwpxKDyT2UkCwWdvIO1xFgFwBg1XrpQds%3D&p_timestamp='.time().'&p_signature=a4b6ce34903732691efff667fc59aba8';
    $res = curl_request($url);

    $dir_name=date("Ymd");//创建文件名
    $path='log/'.$dir_name;//创建路径
    $patud=createDirectories($path);//创建当天的文件夹


    $name=time()."_".$domain.date("Ymd");
    file_put_contents($patud.'/'."$name.html",$res,FILE_APPEND );

    $path_f=$path.'/'.$name.'.html';
    $name_s=date("Ymd").$key_word;
    if(strpos($res,$domain) !== false){
//        echo '存在首页';
        $data['status']=true;
        putUclode($name_s,$path_f);
        $url=getUclode($name_s);
        $data['path']=$url;

    }else{
//        echo '不存在首页';
        $data['status']=false;
        $data['path']='';
    }

    return $data;
}

/*
 * 创建目录
 * @param    $path      str      目录
 */
function createDirectories($path){

    if (is_dir($path)){
        return $path;
    }else{
        //第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
        $res=mkdir(iconv("UTF-8", "GBK", $path),0777,true);
        if ($res){
            return $path;
        }else{
            return false;
        }
    }

}



//curl获取百度内容
function curl_request($url, $data=null, $method='get', $https=true){
    $ch = curl_init();//初始化
    curl_setopt($ch, CURLOPT_URL, $url);//访问的URL
    curl_setopt($ch, CURLOPT_HEADER, false);//设置不需要头信息
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//只获取页面内容，但不输出
    if($https){
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//https请求 不验证证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//https请求 不验证HOST
    }
    curl_setopt($ch,CURLOPT_ENCODING,'gzip');//百度返回的内容进行了gzip压缩,需要用这个设置解析
    //curl模拟头部信息
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: */*',
        'Accept-Encoding: gzip, deflate, br',
        'Accept-Language: zh-CN,zh;q=0.9,en;q=0.8',
        'Connection: keep-alive',
        'Host: www.baidu.com',
        'is_referer: https://www.baidu.com/',
        'is_xhr: 1',
        'Referer: https://www.baidu.com/',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
        'X-Requested-With: XMLHttpRequest',
    ));
    if($method == 'post'){
        curl_setopt($ch, CURLOPT_POST, true);//请求方式为post请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//请求数据
    }
    $result = curl_exec($ch);//执行请求
    curl_close($ch);//关闭curl，释放资源
    $result = mb_convert_encoding($result, 'utf-8', 'GBK,UTF-8,ASCII,gb2312');//百度默认编码是gb2312 这个设置转化为utf8编码
    return $result;
}

//function curl_file_get_contents($durl){
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $durl);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
//    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
//    $r = curl_exec($ch);
//    curl_close($ch);
//    return $r;
//}


//下载
function getUclode($name){
    require_once("./ucloud/proxy.php");

//存储空间名
    $bucket = "nswyun";
//上传至存储空间后的文件名称(请不要和API公私钥混淆)
    $key    = $name;


    /*
     * 访问公有Bucket的例子
     */
    $url = UCloud_MakePublicUrl($bucket, $key);
//    echo "download url(public): ", $url . "\n";

    /*
     * 访问私有Bucket的例子
     */
//    $url = UCloud_MakePrivateUrl($bucket, $key);
//    echo "download url(private): ", $url . "\n";

    /*
     * 访问包含过期时间的私有Bucket例子
     */
//    $curtime = time();
//    $curtime += 60; // 有效期60秒
//    $url = UCloud_MakePrivateUrl($bucket, $key, $curtime);
//    $content = curl_file_get_contents($url);


    return $url;
//    echo "download file with expires: ", $url . "\n";

}

//上传
function putUclode($name,$path){
    require_once("./ucloud/proxy.php");

//存储空间名
    $bucket = "nswyun";
//上传至存储空间后的文件名称(请不要和API公私钥混淆)
    $key    = $name;
//待上传文件的本地路径
    $file   = $path;

//该接口适用于0-10MB小文件,更大的文件建议使用分片上传接口
    list($data, $err) = UCloud_PutFile($bucket, $key, $file);
//    if ($err) {
//        echo "error: " . $err->ErrMsg . "\n";
//        echo "code: " . $err->Code . "\n";
//        exit;
//    }
//    echo "ETag: " . $data['ETag'] . "\n";
}