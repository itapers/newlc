<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Config;
use think\Request;
use app\backend\model\CustomerCate;
use app\backend\model\CustomerFrom;
use app\backend\model\CustomerRecord;
use app\backend\model\Customer as C;
use app\backend\logic\CustomerLogic;
use app\backend\model\AdminUser;
class Customer  extends Common
{   
    protected $tableName = 'customer_cate';
    protected $tableName1 = 'customer';
    protected $tableName2 = 'customer_from';

    /** 
     * 客户分类页面
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function cateIndex(){
        $data=CustomerCate::stDate();
        $this->assign('data',$data);
        return  $this->fetch();
    }
    /** 
     * 客户分类添加修改页面
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function cateAdd(){
    	if(var_export(Request::instance()->isAjax(), true)==='true'){
          $model=new CustomerCate;
      		$ress=$this->addAction($model);
    	}else{
          $param=input('param.');
          if(isset($param['id']) && !empty($param['id'])){
              $ress= CustomerCate::get($param['id']);
          }else{
              $ress=['status'=>1];
          }
          $data=['ress'=>$ress];
          $this->assign('data',$data);
          return  $this->fetch();
      }
    }
    /** 
     * 客户分类数据删除
     * @access public 
     * @since dxf 
     * @return [json] 
     */ 
    public function cateDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
        //分类有关联数据 禁止删除！
        $data=$this->dataAction();
        $rr=C::stDate(['cate_id'=>$data['id']]);
        if($rr){
            ajaxReturn($this->errCode('SQLError'), '删除失败！分类有关联客户数据');
        }
        $ress=$this->del($this->tableName);
        return $ress;
       }
    }
    /** 
     * 客户来源页面
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */
    public function fromIndex(){
        $data=CustomerFrom::stDate();
        $this->assign('data',$data);
        return  $this->fetch();
    }
    /** 
     * 客户来源添加修改页面
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function fromAdd(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $model=new CustomerFrom;
          $ress=$this->addAction($model);
      }else{
          $param=input('param.');
          if(isset($param['id']) && !empty($param['id'])){
              $ress= CustomerFrom::get($param['id']);
          }else{
              $ress=['status'=>1];
          }
          $data=['ress'=>$ress];
          $this->assign('data',$data);
          return  $this->fetch();
      }
    }
    /** 
     * 客户来源数据删除
     * @access public 
     * @since dxf 
     * @return [json] 
     */ 
    public function fromDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $data=Request::instance()->post();
          $rr=C::getAll(['from'=>$data['id']]);
          if($rr){
            ajaxReturn($this->errCode('SQLError'), '删除失败！来源下有客户数据');
          }
          $ress=$this->del($this->tableName2);
          return $ress;
       }
    }

    /** 
     * 客户列表
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function index(){
        $catelist=CustomerCate::getAll(['status'=>1]);
        $fromlist=CustomerFrom::getAll(['status'=>1]);
        $aulist=AdminUser::all();
        $data=[
            'catelist'=>$catelist,
            'fromlist'=>$fromlist,
            'aulist'=>$aulist,
        ];
        $this->assign('data',$data);
        return  $this->fetch();
    }
    /** 
     * 客户列表数据的获取
     * @access public 
     * @since dxf 
     * @return [json]  
     */ 
    public function getData(){
        $model=new C;
        $param=input('param.');
        $where=CustomerLogic::selectParam($param,$this->ausess());
        $rs=$model->get_join_list($param,$where);
        layuiReturn($this->errCode('OK'), '获取成功', $rs['count'], $rs['list']);
    }
    /** 
     * 客户数据的删除
     * @access public 
     * @since dxf 
     * @return [json] 
     */ 
    public function delete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $ress=$this->del($this->tableName1);
          return $ress;
       }
    }
    /** 
     * 客户添加和修改
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function add(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $model=new C;
          $ress=$this->addAction($model);
      }else{
          $param=input('param.');
          $catelist=CustomerCate::getAll(['status'=>1]);
          $fromlist=CustomerFrom::getAll(['status'=>1]);
          if(isset($param['id']) && !empty($param['id'])){
              $ress= C::get($param['id']);
          }else{
              $ress=['cate_id'=>'','from'=>''];
          }
          $data=['ress'=>$ress,'fromlist'=>$fromlist,'catelist'=>$catelist];
          $this->assign('data',$data);
          return  $this->fetch();
      }
    }
    /** 
     * 客户详情
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function detail(){
        $param=input('param.');
        if(isset($param['id']) && !empty($param['id'])){
            $ress= C::get($param['id']);
            $catelist=CustomerCate::getAll(['status'=>1]);
            $record= CustomerRecord::getAll(['customer_id'=>$param['id']]);
        }else{
            $this->error('页面出错了！');
        }
        $data=['record'=>$record,'ress'=>$ress,'param'=>$param,'catelist'=>$catelist];
        $this->assign('data',$data);
        return  $this->fetch();
    }
    /** 
     * 客户回访记录的添加和修改
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function addRecord(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $model=new CustomerRecord;
          $ress=$this->addAction($model);
      }else{
          $param=input('param.');
          if(isset($param['id']) && !empty($param['id'])){
              $ress= C::get($param['id']);
              $catelist=CustomerCate::getAll(['status'=>1]);
          }else{
             $this->error('页面出错了！');
          }
          $data=['id'=>$param['id'],'catelist'=>$catelist,'ress'=>$ress];
          $this->assign('data',$data);
          return  $this->fetch();
      }
    }
    /** 
     * 客户数据下载
     * @access public 
     * @since dxf 
     * @return [type]  
     */ 
    public function down(){
      $model=new C;
      $param=input('param.');
      $where=CustomerLogic::selectParam($param,$this->ausess());
      $data=$model->get_down_list($param,$where);
      $excel_name='客户信息_'.date('YmdHis');
      CustomerLogic::down($data,$excel_name);
    }
    /** 
     * 客户数据导入的模板下载
     * @access public 
     * @since dxf 
     * @return [type]  
     */ 
    public function muban(){
      $rr=CustomerLogic::muban();
      $excel_name='客户信息导入模板'; 
      CustomerLogic::down($rr,$excel_name);
    }
    /** 
     * 客户数据导入
     * @access public 
     * @since dxf 
     * @return [type]  
     */
    public function leading(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $param=input('param.');
          $rss=CustomerLogic::uploadFile($param['fileurl'],$this->ausess());
          if($rss['status']==1){
            $model=new C;
            $re=$model->saveAll($rss['data']);
            if($re){
                ajaxReturn($this->errCode('OK'), '数据导入成功');
            }else{
                ajaxReturn($this->errCode('SQLError'), '数据导入失败了');
            }
          }else{
              ajaxReturn($this->errCode('SQLError'), $rss['msg']);
          }
      }else{
          return  $this->fetch();
      }
    }

    /** 
     * 数据提交之前的操作
     * @access public 
     * @param  array  $data  接收的数据
     * @since dxf 
     * @return [array] 
     */
    protected function before_add($data){
      if(empty($data['warn_time'])){
        unset($data['warn_time']);
      }
      return $data;
    }
    /** 
     * 数据提交之后的操作
     * @access public 
     * @param  array  $data  接收的数据
     * @since dxf 
     * @return [] 
     */
    protected function after_add($data){
        //更新客户表中的状态和下次提醒时间
        if(!empty($data['customer_id']) && !empty($data['cate_id'])){
          $model=new C;
          $updata['id']=$data['customer_id'];
          $updata['cate_id']=$data['cate_id'];
          $updata['warn_time']=strtotime($data['warn_time']);
          $ress=$model->update_data($updata);
        }
    }
    /** 
     * 数据提交之后写入数据库
     * @access public 
     * @param  array  $data  接收的数据
     * @since dxf 
     * @return [] 
     */
    protected function write_log($data){
      if(!empty($data['customer_id'])){
        $contents="添加回访数据！";
      }elseif(!empty($data['cate_id'])){
        $contents="添加 / 修改了客户数据，名称：$data[name]";
      }else{
        $contents="添加 / 修改了客户分类/来源数据，名称：$data[name]";
      }
      $this->writelog($contents);
      
    }
    /** 
     * 数据删除之后的操作
     * @access public 
     * @param  array  $data  数据
     * @since dxf 
     * @return [] 
     */
    protected function after_del($data){
      if(!empty($data['cate_id'])){
         $contents="删除了客户数据，名称：$data[name]";
      }else{
         $contents="删除了客户分类/来源数据：$data[name]";
      }
      $this->writelog($contents);
    }



}
