<?php
namespace app\backend\logic;
use think\Db;
use think\Request;
class CustomerLogic 
{   
    /**
     * 客户查询的逻辑
     * @access public 
     * @param array   $param 条件数据
     * @param array   $ausess 账号的session信息
     * @since dxf 
     * @return [array]
     */
	static public  function selectParam($param,$ausess){
        $where='';
        //客户名称
        if(isset($param['name']) && !empty($param['name'])){
            $where['t.name']=array('like',"%$param[name]%");
        }
        //手机号
        if(isset($param['mobile']) && !empty($param['mobile'])){
            $where['t.mobile']=array('like',"%$param[mobile]%");
        }
        //类别id
        if(isset($param['cate_id']) && !empty($param['cate_id'])){
            $where['t.cate_id']=$param['cate_id'];
        }
        //省份
        if(isset($param['province']) && !empty($param['province'])){
            $where['t.province']=array('like',"%$param[province]%");
        }
        //市
        if(isset($param['city']) && !empty($param['city'])){
            $where['t.city']=array('like',"%$param[city]%");
        }
        //来源
        if(isset($param['from']) && !empty($param['from'])){
            $where['t.from']=$param['from'];
        }
        //添加人
        if(isset($param['auid']) && !empty($param['auid'])){
            $where['t.auid']=$param['auid'];
        }

        $zdy_rule=config('zdy_rule');
        //用户等级参数处理
        if($ausess['group_role']==1){
            if($zdy_rule==5){
                $where['t.auid']=$ausess['auid'];
            }
        }elseif($ausess['group_role']==2){
            if($zdy_rule==3){
                $where['t.group_id']=$ausess['group_id'];
            }elseif($zdy_rule==4){
                $where['group_id']=$ausess['group_id'];
            }elseif($zdy_rule==5){
                $where['t.auid']=$ausess['auid'];
            }
        }elseif($ausess['group_role']==3){
            if($zdy_rule==2){
                $where['t.auid']=$ausess['auid'];
            }elseif($zdy_rule==3){
                $where['t.group_id']=$ausess['group_id'];
            }elseif($zdy_rule==4){
                $where['t.auid']=$ausess['auid'];
            }elseif($zdy_rule==5){
                $where['t.auid']=$ausess['auid'];
            }
        }
        return $where;
    }
    /**
     * 客户数据下载的逻辑
     * @access public 
     * @param array   $data 要下载的数据
     * @param array   $name excel表名称
     * @since dxf 
     * @return [file]
     */
    static public function down($data,$name){
        vendor('PHPExcel.PHPExcel');
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getActiveSheet()->getStyle('A:N')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
        //遍历数组，注意数组对应的下标
        if($name=='客户信息导入模板'){
            foreach($data as $k => $v){
                $k=1;
                $objPHPExcel->setActiveSheetIndex(0) 
                    ->setCellValue('A'.$k, $v['from_name'])
                    ->setCellValue('B'.$k, $v['cate_name'])
                    ->setCellValue('C'.$k, $v['name'])
                    ->setCellValue('D'.$k, $v['mobile'])
                    ->setCellValue('E'.$k, $v['wx'])
                    ->setCellValue('F'.$k, $v['qq'])
                    ->setCellValue('G'.$k, $v['contents'])
                    ->setCellValue('H'.$k, $v['province'])
                    ->setCellValue('I'.$k, $v['city'])
                    ->setCellValue('J'.$k, $v['area'])
                    ->setCellValue('K'.$k, $v['address']);
            }
        }else{
            foreach($data as $k => $v){
                $k++;
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$k, $v['id'])
                    ->setCellValue('B'.$k, $v['from_name'])   
                    ->setCellValue('C'.$k, $v['cate_name'])
                    ->setCellValue('D'.$k, $v['name'])
                    ->setCellValue('E'.$k, $v['mobile'])
                    ->setCellValue('F'.$k, $v['wx'])
                    ->setCellValue('G'.$k, $v['qq'])
                    ->setCellValue('H'.$k, $v['contents'])
                    ->setCellValue('I'.$k, $v['province'])
                    ->setCellValue('J'.$k, $v['city'])
                    ->setCellValue('K'.$k, $v['area'])
                    ->setCellValue('L'.$k, $v['address'])
                    ->setCellValue('M'.$k, $v['warn_time'])
                    ->setCellValue('N'.$k, $v['uptime'])
                    ->setCellValue('O'.$k, $v['ctime'])
                    ->setCellValue('P'.$k, $v['group_name'])
                    ->setCellValue('Q'.$k, $v['real_name']);
            }
        }
        
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$name.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
    /**
     * 模板下载的表头
     * @access public 
     * @since dxf 
     * @return [array]
     */
    static public function muban(){
        $rs['0']['from_name']='客户来源';
        $rs['0']['cate_name']='客户分类';
        $rs['0']['name']='客户名称';
        $rs['0']['mobile']='手机号';
        $rs['0']['wx']='微信';
        $rs['0']['qq']='QQ';
        $rs['0']['contents']='留言内容';
        $rs['0']['province']='省份';
        $rs['0']['city']='市';
        $rs['0']['area']='区/县';
        $rs['0']['address']='地址';
        return $rs;
    }
    /**
     * 文件上传的字段逻辑
     * @access public 
     * @param file   $uploadfile 上传后的文件名
     * @param array   $ausess 用户数据
     * @since dxf 
     * @return [array]
     */
    static public function uploadFile($uploadfile,$ausess)
    {   
        vendor('PHPExcel.PHPExcel');
        vendor('PHPExcel.PHPExcel.IOFactory');
        vendor('PHPExcel.PHPExcel.Reader.Excel2007.php');
        vendor('PHPExcel.PHPExcel.Reader.Excel5.php');
        vendor('PHPExcel.PHPExcel.Reader.CSV.php');
        $extension = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION) );
        if ($extension =='xlsx') {
            $objReader = new \PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader ->load($uploadfile);
        } else if ($extension =='xls') {
            $objReader = new \PHPExcel_Reader_Excel5();
            $objPHPExcel = $objReader ->load($uploadfile);
        } else if ($extension=='csv') {
            $PHPReader = new \PHPExcel_Reader_CSV();
            //默认输入字符集
            $PHPReader->setInputEncoding('UTF-8');
            //默认的分隔符
            $PHPReader->setDelimiter(',');
            //载入文件
            $objPHPExcel = $PHPReader->load($uploadfile);
        }
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();           //取得总行数
        $highestColumn = $sheet->getHighestColumn();    //取得总列数
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        //echo '总行数='.$highestRow;
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
        $headtitle=array();
        $msg=array();
        $status=1;
            for ($row = 1;$row <= $highestRow;$row++)
            {
                $strs=array();
                //注意highestColumnIndex的列数索引从0开始
                for ($col = 0;$col < $highestColumnIndex;$col++)
                {
                    $strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                } 
                //检查表头
                if($row==1){
                    if(trim($strs['0'])!='客户来源'){
                        $msg="表头:".$strs['0']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['1'])!='客户分类'){
                        $msg="表头:".$strs['1']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['2'])!='客户名称'){
                        $msg="表头:".$strs['2']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['3'])!='手机号'){
                        $msg="表头:".$strs['3']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['4'])!='微信'){
                        $msg="表头:".$strs['4']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['5'])!='QQ'){
                        $msg="表头:".$strs['5']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['6'])!='留言内容'){
                        $msg="表头:".$strs['6']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['7'])!='省份'){
                        $msg="表头:".$strs['7']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['8'])!='市'){
                        $msg="表头:".$strs['8']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['9'])!='区/县'){
                        $msg="表头:".$strs['9']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                    if(trim($strs['10'])!='地址'){
                        $msg="表头:".$strs['10']."，与要求表头不匹配";
                        $status=-1;
                        break;
                    }
                }elseif($row>1001){
                    $msg='导入失败！单次最大导入量1000条';
                    $status=-1;
                    break;
                }else{
                    $data[$row]['from']=trim($strs['0']);
                    $data[$row]['cate_id']=trim($strs['1']);
                    $data[$row]['name']=trim($strs['2']);
                    $data[$row]['mobile']=trim($strs['3']);
                    $fromlist=Db::name('customer_from')->where(['status'=>1])->select();
                    if($fromlist){
                        $fe=[];
                        foreach ($fromlist as $k => $v) {
                            $fe[$v['id']]=$v['name'];
                        }
                        $ffe=implode(',', $fe);
                        if(!in_array($data[$row]['from'], $fe)){
                            $msg='第'.$row."行数据，客户来源:".$data[$row]['from']."，不正确，正确的类型为：".$ffe;
                            $status=-1;
                            break;
                        }
                        //反转充值类型
                        $dt=array_flip($fe);
                        $data[$row]['from']=$dt[$data[$row]['from']];
                    }
                    $catelist=Db::name('customer_cate')->where(['status'=>1])->select();
                    if($catelist){
                        $ftype=[];
                        foreach ($catelist as $k => $v) {
                            $ftype[$v['id']]=$v['name'];
                        }
                        $ff=implode(',', $ftype);
                        if(!in_array($data[$row]['cate_id'], $ftype)){
                            $msg='第'.$row."行数据，客户分类:".$data[$row]['cate_id']."，不正确，正确的类型为：".$ff;
                            $status=-1;
                            break;
                        }
                        //反转充值类型
                        $dd=array_flip($ftype);
                        $data[$row]['cate_id']=$dd[$data[$row]['cate_id']];
                    }
                    if(!is_Mobile($data[$row]['mobile'])){
                        $msg='第'.$row."行数据，手机号码:".$data[$row]['mobile']."，不正确";
                        $status=-1;
                        break;
                    }
                    $data[$row]['wx']=trim($strs['4']);
                    $data[$row]['qq']=trim($strs['5']);
                    $data[$row]['contents']=trim($strs['6']);
                    $data[$row]['province']=trim($strs['7']);
                    $data[$row]['city']=trim($strs['8']);
                    $data[$row]['area']=trim($strs['9']);
                    $data[$row]['address']=trim($strs['10']);
                    $data[$row]['group_id']=$ausess['group_id'];
                    $data[$row]['auid']=$ausess['auid'];
                    $data[$row]['ctime']=time();
                }
            }
            if($status==1){
                return ['status'=>1,'msg'=>'数据检查成功','data'=>$data];
            }else{
                return ['status'=>-1,'msg'=>$msg];
            }
    }

   
}
 

