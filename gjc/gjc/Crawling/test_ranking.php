<?php
require_once 'common/common.php';
require_once 'request/curl.php';
require_once 'pdo/pdo.php';
class test_ranking
{

    public function __construct()
    {
    }
//检测是否在首页
    public function rank_verification($key_word,$curl_id,$mysql){
        $curlobj=new curl();

//        $config=require_once 'pdo/db_config.php';
//        $mysql_c=new Pdodb($config['nsy_db']);
        $now_time=time();
        $sql="select ip,port from nsw_agent_ip where expire_time < $now_time AND region = $curl_id";
        $mysql->query($sql);
        $data_ip=$mysql->fetch();
        if(empty($data_ip)){
            $url_ip=getProxyIp($curl_id);
            $ip_info= $curlobj->vget($url_ip);

            $ip_info;

            if(!is_array($ip_info)){
                $ip_info=json_decode($ip_info,true);
            }
//            var_dump($ip_info);die;
//            echo json_decode($ip_info);die;

            $set['expire_time']=$expire_time= strtotime($ip_info['data'][0]['expire_time']);
            $set['ip']=$ip=$data_ip['ip']=$ip_info['data'][0]['ip'];
            $set['port']=$port=$data_ip['port']=$ip_info['data'][0]['port'];
            $set['region']=$curl_id;

            $sql = "INSERT INTO nsw_agent_ip (region,more,expire_time,ip,port) VALUES('$curl_id','$more','$expire_time','$ip','$port')" ;
            $mysql->exec($sql);

        }

        $word = urlencode($key_word);//需要对关键词进行url解析,否者部分带字符的标题会返回空
        $url = 'https://www.baidu.com/s?ie=UTF-8&wd='.$word.'&p_tk=811947wzUlkTdW7YQz2fkT2cshB%2F54maSfeRtq4ta039Xo9wjhtmzRQjT8ZtJdOmIeEmiF66o2mUFnZwpxKDyT2UkCwWdvIO1xFgFwBg1XrpQds%3D&p_timestamp='.time().'&p_signature=a4b6ce34903732691efff667fc59aba8';

        $res = $curlobj->curl_request($url,$data_ip['ip'],$data_ip['port']);
        unset($curlobj);
        return $res;
    }
}