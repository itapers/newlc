<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\backend\model\Config;
use app\backend\model\Advert;
use app\backend\model\Tag;
class ConfigManage  extends Common
{      
    /** 
     * 配置管理页面
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function index(){
        if(Request::instance()->isPost()===true){
            $model=new Config;
            $data=$this->dataAction();
            foreach ($data as $k => $v) {
                $list[]=['id'=>$k,'value'=>$v];
            }
            $model->isUpdate()->saveAll($list);
            $this->writeLog('修改了常用配置信息！');
            $ress=tpCache(1);
            $this->success('提交成功', 'ConfigManage/index');
        }else{
            $ress=tpCache();
        }
        $this->assign('data',$ress);
        return  $this->fetch();
    }
    /** 
     * 配置LOGO的处理
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function configLogo(){
        if(Request::instance()->isPost()===true){
            $file_1 = request()->file('logo');
            if($file_1){
                $info_1 = $file_1->validate(['size'=>10240000,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public' . DS . 'uploads/logo');
                if($info_1){
                    $data_1=$info_1->getSaveName();
                    Db::name('config')->update(['value' => $data_1,'id'=>18]);
                }else{
                    $this->error($file_1->getError());
                }
            }
            $file_2 = request()->file('logo_backend');
            if($file_2){
                $info_2 = $file_2->validate(['size'=>10240000,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public' . DS . 'uploads/logo');
                if($info_2){
                    $data_2=$info_2->getSaveName();
                    Db::name('config')->update(['value' => $data_2,'id'=>19]);
                }else{
                    $this->error($file_2->getError());
                }
            }
            $file_3 = request()->file('logo_login');
            if($file_3){
                $info_3 = $file_3->validate(['size'=>10240000,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public' . DS . 'uploads/logo');
                if($info_3){
                    $data_3=$info_3->getSaveName();
                    Db::name('config')->update(['value' => $data_3,'id'=>20]);
                }else{
                    $this->error($file_3->getError());
                }
            }
            $file_4 = request()->file('icon');
            if($file_4){
                $info_4 = $file_4->validate(['size'=>10240000,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public' . DS . 'uploads/logo');
                if($info_4){
                    $data_4=$info_4->getSaveName();
                    Db::name('config')->update(['value' => $data_4,'id'=>21]);
                }else{
                    $this->error($file_4->getError());
                }
            }

           
        }
        $ress=tpCache(1);
        $this->assign('data',$ress);
        $this->assign('breadcrumb',['0'=>'基本设置']);
        return  $this->fetch('index');
    }
   
    
    
    
    

}
