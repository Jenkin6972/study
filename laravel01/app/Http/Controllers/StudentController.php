<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendEmail;

class StudentController extends Controller
{
    //文件上传
    public function uploads(Request $request){
        //dd($_FILES);exit;
        //获取文件对象
        $file = $request->file('source');
        //dd($file);
        //检验文件是否上传成功
        if($file->isValid()){
            //dd($file->isValid());
            //原文件名
            $originaName = $file->getClientOriginalName();//24.jpg
            //扩展名
            $ext = $file->getClientOriginalExtension();//jpg
            //MIMETYPE
            $type = $file->getClientMimeType();//image/jpeg
            //临时存放目录
            $realPath = $file->getRealPath();//C:\Windows\php52E9.tmp
            //设置文件名
            $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
            //var_dump($originaName,$ext,$type,$realPath);exit;
            //上传文件
            $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
            var_dump($bool);
        }
        return view('student/uploads');
    }
    //发送邮件
    public function mail(){
        //发送存文本
//        Mail::raw('邮件内容 测试内容',function($message){
//            $message->from('17724716830@163.com','慕课网jenkin');
//            $message->subject('邮件主题 测试主题');
//            $message->to('2483341565@qq.com');
//        });
        //发送html文件,实用性(可以定制一个好看的邮件模板)
        Mail::send('student.mail',['name'=>'jenkin'],function($message){
            $message->from('17724716830@163.com','慕课网jenkin');
            $message->to('2483341565@qq.com');
        });
    }
    //缓存
    public function cache1(){
        //添加缓存的方法 put add forever
        //Cache::put('key1','val1',600);
        //$bool = Cache::add('key2','val2',600);//add添加已存在的key值时会返回false
        //var_dump($bool);
        //forever 方法可用于持久化将数据存储到缓存中。因为这些数据不会过期，所以必须通过 forget 方法从缓存中手动删除它们：
        //Cache::forever('key3','val3');
    }
    //
    public function cache2(){
        //获取缓存的方法  get  pull
        //var_dump(Cache::get('key1'));
        //pull取出缓存后,会把缓存删除
        //var_dump(Cache::pull('key3'));
        //删除指定缓存
        //var_dump(Cache::forget('key1'));
        //判断指定缓存是否存在
        //var_dump(Cache::has('key1'));
    }
    //错误(debug模式,http异常)
    public function error(){
        //http异常
        //$student = DB::select("select * from student where id=0");
        $student = null;
        if($student == null){
            //abort('503');
            abort('404');
        }
    }
    //日志
    public function log(){
        //Log::info('这是一个info级别的日志');//会在storage/logs/的laravel.log文件中生成一个记录
        Log::error('这是一个error基本错误',['aaa'=>11111]);
    }
    //推送任务到队列
    public function queue(){
        dispatch(new SendEmail('2483341565@qq.com'));
    }
}
