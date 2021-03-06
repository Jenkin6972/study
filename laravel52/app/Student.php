<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Student extends Model {
    protected $table="student";//指定模型关联的表
    protected $primaryKey="id";//指定主键
    protected $fillable=['name','age','sex'];//允许被添加的字段
    const SEX_UN = 10;
    const SEX_BOY = 20;
    const SEX_GRIL = 30;
    //设置存入的时间格式
    protected function getDateFormat()
    {
        return time(); // TODO: Change the autogenerated stub
    }
    public function sex1($ind = null){
        $arr = [
            self::SEX_UN =>'未知',
            self::SEX_BOY=>'男',
            self::SEX_GRIL=>'女',
        ];
        if($ind !== null ){
            return array_key_exists($ind,$arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }
        return $arr;
    }
}
