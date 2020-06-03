<?php
namespace App\Http\Controllers;
use App\Test3;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class HelloController extends Controller{
    public function test($aaa){
        return $aaa;
    }
    //test1.php模板文件
    public function test1(){
        return view('hello/test1');
    }
    //test2.blade.php模板文件,支持{{$name}}写法
    public function test2(){
        return view('hello/test2',['name'=>'jenkin']);
    }
    //使用模型
    public function use_test3(){
        return Test3::getAge();
    }
    //DB facade(原始查找)
    public function test4(){
        //laravel 提供DB facade(原始查找)、查询构造器和Eloquent ORM三种操作数据库的方式
        //查
        $arr = DB::select("select * from student");
        dd($arr);
        //增
//        $bool = DB::insert("insert into student (name,age) values (?,?)",['kid',25]);
//        var_dump($bool);
        //改
//        $row = DB::update("update student set age=? where name=?",['27','jenkin']);
//        var_dump($row);
        //删
//        $row = DB::delete("delete from student where name=?",['jenkin']);
//        var_dump($row);
    }
    //查询构造器
    public function test5(){
        //增
        $bool=DB::table('student')->insert([
            ['name'=>'lifang','age'=>29],
            ['name'=>'lifang1','age'=>30],
            ['name'=>'lifang2','age'=>27],
            ['name'=>'lifang3','age'=>28],
            ['name'=>'lifang4','age'=>31]
        ]);
//        var_dump($bool);
        //改
//        $row=DB::table('student')
//            ->where(['name'=>'lifang'])
//            ->update(['name'=>'wugui']);
//        var_dump($row);
       //删除
        //$row = DB::table('student')->where(['name'=>'wugui'])->delete();
        //var_dump($row);
        //DB::table('student')->truncate();
        //查  get() first()  where()  pluck()  lists() select()  chunk()
        //$arr=DB::table('student')->get();
        //$arr=DB::table('student')->orderBy('id','desc')->first();//返回结果集中的第一天
        //$arr = DB::table('student')->where(['id'=>6])->get();
        //$arr=DB::table('student')->pluck('name');//返回结果集中指定字段
        //$arr = DB::table('student')->lists('name','id');//和pluck效果一样,返回结果集的指定字段,不过lists的第二个参数可以指定哪个字段作为数组的key值
        //$arr=DB::table('student')->select('id','name','age')->get();//select指定想要获取的结果集字段
        DB::table('student')->chunk(2,function($result){
            var_dump($result);
            return false;
        });//chunk方法再遇到大数据量时,可以每次取一部分数据出来先批量处理,处理完成以后再接着处理下一批数据
        //dd($arr);
    }
    //orm 增删改查
    public function orm1(){
        //查  第一种用 all() find() findOrFail()   第二种  查询构造器在orm中的使用
//        $model = \App\Student::find(1);
//        dd($model);
//        $model = \App\Student::all();
//        dd($model);
//        try {
//            $model = \App\Student::findOrFail(11);//如果主键的值没找到就抛出异常
//            dd($model);
//        }catch(\Exception $e){
//            return $e->getMessage();
//        }
        //使用查询构造器查询
        //$model = \App\Student::where('id','>=',2)->get();
        //$model=\App\Student::where('id', 1)->first();
        //dd($model);

        //新增数据  1种是通过模型新增数据(涉及到自定义时间戳)  1种是使用模型的Create方法新增数据(涉及到批量赋值)
//        $model = new \App\Student;
//        $model->name='孙悟空';
//        $model->age=100;
//        $model->save();
//        $model = new \App\Student;
//        $model->create(['name'=>'wufan1','age'=>'33']);
        //还有其它两种可以用来创建模型的方法：firstOrCreate和firstOrNew。
        //$model = new \App\Student;
        //dd($model::firstOrCreate(['id'=>21,'name'=>'马云','age'=>50]));//如果查不到结果则创建
        //dd($model::firstOrNew(['id'=>24,'name'=>'马化腾','age'=>'51'])->save());//这个需要使用save方法才能保存到数据表

        //改 1种通过模型更新  2一种结合查询语句 批量更新
        //$model = new \App\Student;
//        $row=$model::find(1);
//        $row->name='天线宝宝';
//        $row->save();

        //dd($model::where('id','>','1')->update(['age'=>30]));

        //删 1.通过模型删除  2通过主键值删除  3根据指定条件删除
        $model=new \App\Student();
//        $row = $model::find(1);
//        dd($row->delete());

        //dd($model::destroy(2));

        dd($model::where('name','=','孙悟空')->delete());
    }

    //blade模板继承
    public function section1(){
        //1.学习section yield  extends  parent的用法
        //return view('layouts/app');
        //return view('hello/section1');

        //2.学习 1.在模板中输出变量  2.模板中调用php代码  3.原样输出  4.模板中的注释  5.引入子视图include的使用
        //return view('hello/section1',['name'=>'jenkin']);

        //3.流程控制  1.if 2.unless 3.for  4.foreach
        //$data = DB::table('student')->get();
        $data = \App\Student::all();
        //dd($data);exit;
        //echo route('hello/section1');exit;
        return view('hello/section1',['name'=>'jenkin','data'=>$data]);

        //4.生成url  url()  action() route()
    }

    //request学习
    public function request1(Request $request){
        //1.获取请求中的值  input()  all()  route()获取路由上的参数值
        //dd($request->route('id'));exit;
        //dd($request->all());
        //dd($request->input('id'));
        //dd($request->has('id'));

        //2.判断请求类型  method  ismethod ajax
        //dd($request->method());
        //dd($request->isMethod('get'));

        //3.判断请求路径是否符合固定格式
        //dd($request->is('hello/*'));
        //4.获取当前请求路径 url()  fullUrl()
        //url 方法返回不带查询字符串的 URL，而 fullUrl 方法返回结果则包含查询字符串
        //dd($request->url());
        dd($request->fullUrl());
    }
    //input 和 query 的区别
    //query 查询字符串就是url中的参数 xx.com?para1=value1&para2=value2 。
    //input 就是包含了query 以及表单中的各种数据了。
    public function request2(Request $request){
        if($request->method()=='POST'){
            var_dump($request->input());
            var_dump($request->query());exit;
        }
        return view('hello/form');
    }

    //session的学习使用.需要session_start  运用Illuminate\Session\Middleware\StartSession中间件组实现
    //三种方式:1.通过全局辅助函数session  2.通过request类中封装的session方法  3.session类的静态方法
    public function session1(Request $request){
        //存储session  1.request类的put/push方法 2.session辅助函数
        //session(['key1'=>1111]);
        $request->session()->put('key2',2222);
        //一次性存储  flash()只在下个请求有效的数据  这个练习的时候遇到点问题,测试不到效果
        //删除session  1.forget()  2.flush()
        //$request->session()->flush();//删除所有session
        //$request->session()->forget('key1');//删除指定session

    }
    public function session2(Request $request){
        //获取session  1.request类的get或者all方法  2.session辅助函数
        //var_dump($request->session()->all());
        //var_dump($request->session()->get('key1'));
        //var_dump(session('key2'));
        //pull方法 从session中获取数据,取完就把数据删除
        var_dump($request->session()->get('key2'));
        //var_dump($request->session()->pull('key2'));
        var_dump($request->session()->get('key2'));
        //has方法 判断一个session的值是否存在
        var_dump($request->session()->has('key2'));
    }

    //response学习  1.json响应  2.重定向
    public function response(){
        //1 json响应学习
        $data=[
            'aaa'=>1,
            'bbb'=>2
        ];
        //return response()->json($data);

        //2.重定向响应学习  redirect  1.重定向到控制器动作 2.重定向到命名路由  3.重定向到url   4.back返回上一个页面  5.with带一次性session数据
        //return redirect('hello/test1');
        //return redirect()->action('HelloController@request1');
        //return redirect()->route('hello/section1');
        //return redirect()->back();
        return redirect('hello/test2')->with('key2','你好');
    }

    //中间件学习  1.新建中间件  2.注册中间件  3.使用中间件  4.中间件的前置和后置操作
    public function activity0(){
        return '活动宣传页:活动还没开始敬请期待~';
    }
    public function activity1(){
        return "活动进行中";
    }
    public function activity2(){
        return "活动进行中2";
    }
}