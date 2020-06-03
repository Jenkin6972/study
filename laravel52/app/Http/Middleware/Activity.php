<?php


namespace App\Http\Middleware;
use Closure;

class Activity
{
    //前置中间件
//    public function handle($request,Closure $next){
//        if(time()<1587464124){
//            return redirect('activity0');
//        }
//        return $next($request);
//    }
    //后置中间件
    public function handle($request,Closure $next){
        $response = $next($request);
        //执行请求之后的逻辑处理
        return $response;
        //dd($response);exit;
    }
}