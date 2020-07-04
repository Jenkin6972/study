<?php

class curl
{

    public function __construct()
    {

    }

    //curl获取百度内容
   public function curl_request($url, $dip='', $port='',$data=null,$method='get', $https=true){
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_URL, $url);//访问的URL
        curl_setopt($ch, CURLOPT_HEADER, false);//设置不需要头信息
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//只获取页面内容，但不输出
        curl_setopt($ch, CURLOPT_PROXY, $dip); //代理服务器地址
        curl_setopt($ch, CURLOPT_PROXYPORT, $port); //代理服务器端口
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

    /*
    * Get网络请求
    * @access       public
    * @param        $url           str         请求url
    */
    public function vget($url){
        $info=curl_init();
        curl_setopt($info,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($info,CURLOPT_HEADER,0);
        curl_setopt($info,CURLOPT_NOBODY,0);
        curl_setopt($info, CURLOPT_TIMEOUT, 2);
        curl_setopt($info, CURLOPT_CONNECTTIMEOUT, 3);//是从请求开始到响应总共等待的时间
        curl_setopt($info, CURLOPT_TIMEOUT, 2);//是响应等待的时间
        curl_setopt($info,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($info,CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($info,CURLOPT_URL,$url);
        $output= curl_exec($info);
        curl_close($info);
        return $output;
    }


}