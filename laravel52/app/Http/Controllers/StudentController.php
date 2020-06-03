<?php
namespace App\Http\Controllers;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller{
    //列表页
    public function index(){
        $students = \App\Student::paginate(3);
        return view('student/index',['students'=>$students]);
    }
    //创建页
    public function create(Request $request){
        if($request->method()=='POST'){
            $data = $request->input('Student');
            //表单验证知识点  1.控制器验证  2.validator类验证
//            $this->validate($request,[
//                'Student.name'=>'required',
//                'Student.sex'=>'required',
//                'Student.age'=>'required|integer'
//            ],[
//                'required'=>':attribute 为必填项',
//                'integer'=>':attribute 必须为整数'
//            ],[
//                'Student.name'=>'姓名',
//                'Student.sex'=>'性别',
//                'Student.age'=>'年龄'
//            ]);
            $validator=Validator::make($request->all(),[
                'Student.name'=>'required',
                'Student.sex'=>'required',
                'Student.age'=>'required|integer'
            ],[
                'required'=>':attribute 为必填项',
                'integer'=>':attribute 必须为整数'
            ],[
                'Student.name'=>'姓名',
                'Student.sex'=>'性别',
                'Student.age'=>'年龄'
            ]);
            if($validator->fails()){
                //withInput(将前面用户表单提交的数据,一并返回)
                //withErrors 如果验证失败，则可以使用 withErrors 方法把错误消息闪存到 Session 。使用这个方法进行重定向后， $errors 变量会自动和视图共享，你可以把这些消息显示给用户。
                return redirect('create')->withErrors($validator)->withInput();
            }
            $student = \App\Student::create($data);
            if($student){
                //添加成功
                return redirect('index')->with('success',1);
            }else{
                //添加失败
                return redirect()->back()->with('error',1);
            }
        }
        $students = new Student();
        return view('student/create',['students'=>$students]);
    }
    //更新页
    public function update(Request $request,$id){
        $students = new Student();
        //根据模型找到这条数据
        $row = $students::find($id);
        if($request->method() == 'POST'){
            $data = $request->input('Student');
            $validator=Validator::make($request->all(),[
                'Student.name'=>'required',
                'Student.sex'=>'required',
                'Student.age'=>'required|integer'
            ],[
                'required'=>':attribute 为必填项',
                'integer'=>':attribute 必须为整数'
            ],[
                'Student.name'=>'姓名',
                'Student.sex'=>'性别',
                'Student.age'=>'年龄'
            ]);
            if($validator->fails()){
                //withInput(将前面用户表单提交的数据,一并返回)
                //withErrors 如果验证失败，则可以使用 withErrors 方法把错误消息闪存到 Session 。使用这个方法进行重定向后， $errors 变量会自动和视图共享，你可以把这些消息显示给用户。
                return redirect("update/$id")->withErrors($validator)->withInput();
            }
            //var_dump($data);exit;
            $row->name = $data['name'];
            $row->age = $data['age'];
            $row->sex = $data['sex'];
            if($row->save()){
                return redirect('index')->with('success',1);
            }else{
                return redirect()->back()->with('error',1);
            }
        }
        return view('student/update',['students'=>$row]);
    }
    //查看详情
    public function detail($id){
        $students = new Student();
        $row = $students::find($id);
        return view('student/detail',['student'=>$row]);
    }
    //删除
    public function del($id){
        $students = new Student();
        $row = $students::find($id);
        if($row->delete()){
            return redirect('index')->with('success',1);
        }else{
            return redirect('index')->with('error',1);
        }
    }
}