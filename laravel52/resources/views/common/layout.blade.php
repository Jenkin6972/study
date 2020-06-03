<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>表单 @yield('title','模板继承')</title>
    <link rel="stylesheet" href="{{asset('bootstrap-3.3.7/css/bootstrap.css')}}">
</head>
<body>  <!-- 头部 -->
<div class="jumbotron">
    <div class="container">
        @section('header')
        <h2>轻松学会Larvel</h2>
        <p>表单</p>
        @show()
    </div>
</div><!-- 中间内容区域 -->
<div class="container">
    <div class="row">    <!-- 左侧菜单区域 -->
        <div class="col-md-3">
            <div class="list-group">
                @section('leftmain')
                <a href="{{url('index')}}" class="list-group-item {{request()->getPathInfo()=='/index' || request()->getPathInfo()!='/create' ? 'active' : ''}}">学生列表</a>
                <a href="{{url('create')}}" class="list-group-item {{request()->getPathInfo()=='/create' ? 'active' : ''}}">新增学生</a>
                @show()
            </div>
        </div>    <!-- 右侧内容区域 -->
        <div class="col-md-9">
            {{-- 这里放成功或失败的模板 --}}
            @include('common/message')
            @yield('content')
        </div>
    </div>
</div>
<!-- 尾部 -->
<div class="jumbotron" style="margin: 0;">
    @section('footer')
    <div class="container"><span> @2016 imooc </span></div>
        @show()
</div>
@section('js')
<script src="{{asset('jquery-3.0.0/jquery-3.0.0.js')}}"></script>
<script src="{{asset('bootstrap-3.3.7/js/bootstrap.js')}}"></script>
    @show()
</body>
</html>