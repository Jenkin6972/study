<?php
namespace app\index\controller;

use think\Controller;

class Excel extends Controller
{
    // 将数据导出至Excel
    /**
     * @param $list    array   //需要多少列[A,B,C,D,E,F,G]
     * @param $header   array     //对应表头,[学号,姓名,班级]
     * @param $field   array     //对应所要展示的字段,['stuNo','name','class']
     * @param $data   array     //要导出到excel表的数据,[[记录1],[记录2],[记录3]...]
     * @param $sheet_name   string     //设置当前sheet的名称
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     * @throws \PHPExcel_Writer_Exception
     */
    public function exportExcel($list,$header,$field,$data,$sheet_name)
    {
        // 引入类库
        import('phpexcel.PHPExcel', EXTEND_PATH);

        // 文件名和文件类型
        $fileName = "student";
        $fileType = "xlsx";

        // 模拟获取数据
        //$data = self::getData();

        $obj = new \PHPExcel();

        // 以下内容是excel文件的信息描述信息
        $obj->getProperties()->setCreator('张三'); //设置创建者
        $obj->getProperties()->setLastModifiedBy('李四'); //设置修改者
        $obj->getProperties()->setTitle('贝加尔湖'); //设置标题
        $obj->getProperties()->setSubject('人生短暂多去走走'); //设置主题
        $obj->getProperties()->setDescription(''); //设置描述
        $obj->getProperties()->setKeywords('');//设置关键词
        $obj->getProperties()->setCategory('');//设置类型

        // 设置当前sheet
        $obj->setActiveSheetIndex(0);

        // 设置当前sheet的名称
        $obj->getActiveSheet()->setTitle($sheet_name);

        // 列标
        //$list = ['A', 'B', 'C'];

        // 填充第一行数据
        for($i = 0; $i < count($list); $i++){
            $obj->getActiveSheet()
                ->setCellValue($list[$i] . '1', $header[$i]);
        }
//        $obj->getActiveSheet()
//            ->setCellValue($list[0] . '1', '学号')
//            ->setCellValue($list[1] . '1', '姓名')
//            ->setCellValue($list[2] . '1', '班级');

        // 填充第n(n>=2, n∈N*)行数据
        $length = count($data);
//        for ($i = 0; $i < $length; $i++) {
//            $obj->getActiveSheet()->setCellValue($list[0] . ($i + 2), '20190101', \PHPExcel_Cell_DataType::TYPE_STRING);//将其设置为文本格式
//            $obj->getActiveSheet()->setCellValue($list[1] . ($i + 2), 'student01');
//            $obj->getActiveSheet()->setCellValue($list[2] . ($i + 2), '1班');
//        }

        foreach ($data as $key => $value){
            static $i = 0;
            //这里有一个坑就是,如果有需要单独对某一行记录进行处理样式的话,需要修改代码
            for($j=0;$j<count($field);$j++){
                $obj->getActiveSheet()->setCellValue($list[$j] . ($i + 2), $value[$field[$j]]);
            }
            $i++;
        }

        // 设置加粗和左对齐
        foreach ($list as $col) {
            // 设置第一行加粗
            $obj->getActiveSheet()->getStyle($col . '1')->getFont()->setBold(true);
            // 设置第1-n行，左对齐
            for ($i = 1; $i <= $length + 1; $i++) {
                $obj->getActiveSheet()->getStyle($col . $i)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            }
        }

        // 设置列宽
        for($i = 0; $i < count($list); $i++){
            $obj->getActiveSheet()->getColumnDimension($list[$i])->setWidth(20);
        }

        // 导出
        ob_clean();
        if ($fileType == 'xls') {
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $fileName . '.xls');
            header('Cache-Control: max-age=1');
            $objWriter = new \PHPExcel_Writer_Excel5($obj);
            $objWriter->save('php://output');
            exit;
        } elseif ($fileType == 'xlsx') {
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx');
            header('Cache-Control: max-age=1');
            $objWriter = \PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
            $objWriter->save('php://output');
            exit;
        }
    }


    // 准备数据
    protected function getData()
    {
        $studentList = [
            [
                'stuNo' => '20190101',
                'name' => 'student01',
                'class' => '1班'
            ], [
                'stuNo' => '20190102',
                'name' => 'student02',
                'class' => '1班'
            ], [
                'stuNo' => '20190103',
                'name' => 'student03',
                'class' => '1班'
            ]
        ];

        return $studentList;
    }

    public function test(){
        $list=['A','B','C'];
        $header=['学号','姓名','班级'];
        $field=['stuNo','name','class'];
        $data=self::getData();
        $sheet_name="自定义sheet";
        $this->exportExcel($list,$header,$field,$data,$sheet_name);
    }
}