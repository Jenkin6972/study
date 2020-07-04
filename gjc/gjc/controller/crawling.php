<?php
//require_once 'pdo/pdo.php';
require_once 'Crawling/test_ranking.php';
require_once 'common/common.php';
require_once 'oss/ucloud.php';
class crawling
{

    public function __construct()
    {
    }

    //开始检测
    public function startDetectionAction(){

//        $star_time=strtotime(date("Y-m-d"));
        $star_time=strtotime(date("2020-07-02"));
        $config=require_once 'pdo/db_config.php';
        $mysql=new Pdodb($config['nswyun']);
        //$mysql = new PDO("mysql:host=10.1.9.51;dbname=nsy_db", "pmcx", "2xZenvOTGzCn");


        $sql="select * from nsw_order_ranking_log_list_new_copy  where l_date_num > '{$star_time}'AND rank < 11";
//        $sql="select rl.*,kdl.region from nsw_order_ranking_log_list_new_copy as rl
//               left join nsw_order_kwranking_keywords as okk on rl.kid = okk.kid
//               left join nsw_order_kwranking_domain_list as kdl on kdl.site_id = okk.site_id
//                where rl.l_date_num > '{$star_time}' and okk.channel_id = 1 AND rl.rank < 11";



        $mysql->query($sql);
        $tablename=$mysql->fetchAll();



        $ranking =new test_ranking();
        $ucloud =new ucloud();



        foreach ($tablename as $key=>$val){

            $sql="SELECT id,user_id FROM nsw_test_rank_verification WHERE add_time > '{$star_time}' and kid = '{$val['kid']}'";
            $mysql->query($sql);
            $data_user=$mysql->fetch();

            if(!empty($data_user)){
                continue;
            }

//            $s=rand(1,3);
//            sleep($s);

//            $res=$ranking->rank_verification($val['keywords'],$val['region']);
            $res=$ranking->rank_verification($val['keywords'],1,$mysql);

            $path_data=createDirectoriesNew($res,$val['url'],$val['keywords']);

            if(strpos($res,$val['url']) !== false){
                //存在首页;
                $data['status']=true;
                $ucloud->putUclode($path_data['name_s'],$path_data['path_f']);
                $url=$ucloud->getUclode($path_data['name_s']);
                $data['path']=$url;

            }else{
               //不存在首页;
                $data['status']=false;
                $data['path']='';
            }


            if($data['status']){
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

            $snapshot=$data['path'];
            $bid=$val['id'];

            $sqls = " UPDATE nsw_order_ranking_log_list_new_copy SET path = '$snapshot' WHERE id = '{$val['id']}'" ;
            $mysql->exec($sqls);


            $sql = "INSERT INTO nsw_test_rank_verification (user_id,rank_s,rank_z,rank_p,rank_s_time,rank_z_time,rank_p_time,kid,add_time,snapshot,b_id) VALUES
            ('$user_id','$rank_s','$rank_z','$rank_p','$rank_s_time','$rank_z_time','$rank_p_time','$kid','$add_time','$snapshot','$bid')" ;

            $mysql->exec($sql);
        }

    }

}