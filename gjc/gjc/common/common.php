<?php

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

//请求接口获取代理ip
function getProxyIp($id){
    switch ($id)
    {
        case 1:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=440000&city=440100&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//广州
        case 2:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=440000&city=441900&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//东莞
        case 3:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=510000&city=510300&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//四川自贡
        case 4:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=510000&city=511100&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//四川乐山
        case 5:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=530000&city=530400&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//云南玉溪
        case 6:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=430000&city=430600&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//湖南岳阳
        case 7:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=420000&city=420100&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//湖北武汉
        case 8:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=360000&city=360100&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//江西南昌
        case 9:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=350000&city=350200&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//福建厦门
        case 10:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=310000&city=310112&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//上海
        case 11:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=320000&city=320100&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//江苏南京
        case 12:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=330000&city=330100&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//浙江杭州
        case 13:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=370000&city=370100&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//山东济南
        case 14:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=410000&city=411500&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//河南信阳
        case 15:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=130000&city=130200&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//河北唐山
        case 16:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=110000&city=110105&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';break;//北京

        default:$url='http://d.jghttp.golangapi.com/getip?num=1&type=2&pro=440000&city=440100&yys=0&port=11&time=2&ts=1&ys=0&cs=1&lb=1&sb=0&pb=5&mr=1&regions=';
    }

    return $url;
}

function createDirectoriesNew($res,$domain,$key_word){
    $dir_name=date("Ymd");//创建文件名
    $path='log/'.$dir_name;//创建路径
    $patud=createDirectories($path);//创建当天的文件夹


    $name=time()."_".$domain.date("Ymd");
    file_put_contents($patud.'/'."$name.html",$res,FILE_APPEND );

    $data['path_f']=$path.'/'.$name.'.html';
    $data['name_s']=date("Ymd").$key_word;

    return $data;
}


