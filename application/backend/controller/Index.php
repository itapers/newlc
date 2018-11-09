<?php
namespace app\backend\controller;
use think\Controller;
use think\Session;
use think\Request;
use app\backend\model\AdminUser;
use app\backend\model\Customer;
class Index extends Common
{   
    /** 
     * 系统的首页
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function index()
    {	
        $request = Request::instance();
        $url=$request->pathinfo();
        if($url!="backend/index/index"){
            echo '<script>location.href="http://'.$_SERVER['HTTP_HOST'].'/backend/index/index";</script>';
            die;
        }
    	
        $ausess=$this->ausess();
        $this->assign('config',tpCache());
    	$this->assign('navlist',$ausess['navlist']);
        return $this->fetch();
    }
    /** 
     * 系统的首页
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function home()
    {   
        $c=new Customer;
        $ress=$c->get_count();
        $day_count=$c->get_range_day_count();
        $per=$c->get_per($ress);
        $data=[
            'customer_num'=>$ress,
            'day_count'=>$day_count,
            'per'=>$per,
        ];
        $this->assign('systemInfo',getSystemInfo());
        $this->assign('info',$this->ausess());
        $this->assign('data',$data);
        return $this->fetch();
    }
    /** 
     * 修改个人信息
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function auinfo(){
        $ausess=$this->ausess();
        $auress=AdminUser::get($ausess['auid']);
        if(var_export(Request::instance()->isAjax(), true)==='true'){
            $staff=new AdminUser;
            $data=$this->dataAction();
            //验证手机号
            if(!empty($data['mobile'])){
               if(!mobileValidate($data['mobile'])){
                    ajaxReturn($this->errCode('validError'), '手机号码格式不正确');
               }
            }
            if(!empty($data['email'])){
               if(!emailValidate($data['email'])){
                    ajaxReturn($this->errCode('validError'), '邮箱格式不正确');
               }
            }
            $ress=$staff->save($data,['id'=>$ausess['auid']]);
            if($ress){
                ajaxReturn($this->errCode('OK'), '信息修改成功');
            }else{
                ajaxReturn($this->errCode('SQLError'), $ress->getError());
            }
        }
        $this->assign('data',$auress);
        $this->assign('group',$auress->hasGroupone);
        return  $this->fetch();
    }
    /** 
     * 修改密码
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */ 
    public function editpwd(){
        if(var_export(Request::instance()->isAjax(), true)==='true'){
            $au=new AdminUser;
            $ress=$au->pwdaction($this->dataAction(),$this->ausess());
            return $ress;
        }
        return  $this->fetch();
    }
}
