@extends('layouts/app')
@section('title','继承自父模板')

@section('header')
    @parent
    这里是子模板头部@{{$name}}{{time()}}
    @endsection

@include('hello/test2')
<!--这是注释-->

{{--这是隐私注释--}}

@if($name=='jenkin')
    i am jenkin;
    @else
    i am not;
@endif

@unless($name == 'jenkin')
    1111
    @endunless

@for($i=0;$i<10;$i++)
    {{$i}}
    @endfor

@foreach($data as $value)
    {{$value->name}}
@endforeach

<a href="{{url('hello.section1')}}">生成url</a>
<a href="{{action('HelloController@section1',['id'=>1])}}">生成url</a>
<a href="{{route('hello/section1')}}">生成url</a>{{--使用route时需要先给路由指定别名--}}
