<?php
namespace app\index\controller;

use think\Controller;

class Mail extends Controller{
    private $host="smtp.nsw88.com";//SMTP服务器
    private $username="nswyun_code@nsw88.com";//用户名
    private $password="03LgPA9q69YA";//密码
    private $port="25";//邮件发送端口
    private $form="nswyun_code@nsw88.com";//发送的邮箱
    public function send_mail()
    {
        // 引入类库
        $mail = new \PHPMailer\PHPMailer\PHPMailer(); //实例化

        //$mail->SMTPDebug = 3;

        $mail->IsSMTP(); // 启用SMTP

        //发送邮件的时候遇到一个奇怪的问题,(加了下面这段数组才能发送成功)//原因是升到php5.6后默认开启验证,添加参数，去掉验证：
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            )
        );

        $mail->Host = $this->host; //SMTP服务器 163邮箱例子

        //$mail->Host = "smtp.126.com"; //SMTP服务器 126邮箱例子

        //$mail->Host = "smtp.qq.com"; //SMTP服务器 qq邮箱例子

        $mail->Port = $this->port;  //邮件发送端口

        $mail->SMTPAuth = true;  //启用SMTP认证

        $mail->CharSet = "UTF-8"; //字符集

        $mail->Encoding = "base64"; //编码方式

        $mail->Username = $this->username;  //你的用户名

        $mail->Password = $this->password;  //你的密码

        $mail->Subject = "xxx你好"; //邮件标题

        $mail->From = $this->form;  //发件人地址（也就是你的邮箱）

        $mail->FromName = "xxx";   //发件人姓名

        $address = "17724716830@163.com";//收件人email

        $mail->AddAddress($address, "郑捷");    //添加收件人1（地址，昵称）

        //$mail->AddAddress($address2, "xxx2");    //添加收件人2（地址，昵称）

        $mail->AddAttachment(APP_PATH."test.xlsx", '我的附件.xlsx'); // 添加附件,并指定名称

        //$mail->AddAttachment('xx1.xls', '我的附件1.xls'); // 可以添加多个附件

        //$mail->AddAttachment('xx2.xls', '我的附件2.xls'); // 可以添加多个附件

        $mail->IsHTML(true); //支持html格式内容

        //$mail->AddEmbeddedImage("logo.jpg", "my-attach", "logo.jpg"); //设置邮件中的图片

        $mail->Body = '你好, <b>朋友</b>! <br/>这是一封邮件！'; //邮件主体内容

        //发送

        if (!$mail->Send()) {

            echo "发送失败: " . $mail->ErrorInfo;

        } else {

            echo "成功";

        }
    }
}

