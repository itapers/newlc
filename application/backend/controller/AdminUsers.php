<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\backend\model\Config;
use app\backend\model\AdminUser;
use app\backend\model\AuthGroup;
use app\backend\logic\AdminUsersLogic;
class AdminUsers  extends Common
{      
    
    /** 
     * 账号管理列表界面
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */  
    public function adminList(){
        $groupList=AuthGroup::groupList();
        $ausess=$this->ausess();
        $select=AdminUsersLogic::selectParam($ausess);
        $dataress=AdminUser::stDate($select['where']);
        $data=[
            'data'=>$dataress,
            'param'=>$select['param'],
            'group_role_name'=>config('group_role_name'),
            'gp_role'=>$ausess['group_role'],
            'groupList'=>$groupList,
        ];
        $this->assign('data',$data);
        return  $this->fetch();
    }
    /** 
     * 添加和编辑账号界面
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */  
    public function adminAdd(){
        $ausess=$this->ausess();
        if(Request::instance()->isPost()===true){
            $data=$this->dataAction();
            $pmodel=new AdminUser;
            //默认密码123456
            $data['admin_password']=password_encrypt('123456', config('salt_admin'));
            //写入logo
            $content="编辑修改了数据，账号为：".$data['admin_name'].",真实姓名为：".$data['real_name'];
            $this->writeLog($content);
            //如果是添加超级管理员
            if($ausess['group_id']==1 && isset($data['group_id'])){
                if($data['group_id']==1){
                    $data['group_role']=1;
                }
            }elseif($ausess['group_role']==2){
                $data['group_id']=$ausess['group_id'];
                $data['group_role']=3;
            }

            //添加或者修改
            if(empty($data['id'])){
                if ($pmodel->allowField(true)->validate(true)->save($data)) {
                    ajaxReturn($this->errCode('OK'), '操作成功');
               }else{
                    ajaxReturn($this->errCode('SQLError'), $pmodel->getError());
               }
            }else{
                if($data['id']==1){
                    //超级管理员信息禁止修改
                    ajaxReturn($this->errCode('privilegeError'), '权限不足');
                }
                if($pmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                    ajaxReturn($this->errCode('OK'), '操作成功');
                }else{
                    ajaxReturn($this->errCode('SQLError'), $pmodel->getError());
                }
            }
        }
        $param=Request::instance()->get();
        if($param['id']){
            $data= Db::name('admin_user')->where('id',$param['id'])->find();
        }else{
            $data['id']='';
            $data['status']=1;
            $data['sex']=1;
            $data['group_id']='';
            $data['group_role']=3;
        }
        $data['gp_role']=$ausess['group_role'];
        $grouplist=Db::name('auth_group')->where(['status'=>1])->select();
        $this->assign('grouplist',$grouplist);
        $this->assign('data',$data);
        return  $this->fetch();
    }
    
    /** 
     * 删除账号
     * @access public 
     * @since dxf 
     * @return [type] [json]
     */
    public function adminDelete(){
        if(Request::instance()->isPost()===true){
            $data=$this->dataAction();
            if($data['id']==1){
                ajaxReturn($this->errCode('SQLError'), '该账号禁止删除！');
            }
            $ress=$this->del('admin_user');
            return $ress;
        }
    }
    /** 
     * 重置密码
     * @access public 
     * @since dxf 
     * @return [type] 页面 
     */  
    public function editPwd(){
        //提交处理
        if(Request::instance()->isPost()===true){
            $data=$this->dataAction();
            if($data['admin_password']!==$data['password2']){
                ajaxReturn($this->errCode('validError'), '两次密码输入不一致');
            }
            $pwd=password_encrypt($data['admin_password'], config('salt_admin'));
            $re=AdminUser::update(['id'=>$data['id'],'admin_password'=>$pwd]);;
            if($re){
                ajaxReturn($this->errCode('OK'), '更新成功');
            }else{
                ajaxReturn($this->errCode('SQLError'), $pmodel->getError());
            }
        }else{
            $param=input('param.');
            $ress=AdminUser::get($param['id']);
            $data=[
                'ress'=>$ress,
            ];
            $this->assign('data',$data);
            return  $this->fetch();
        }
    }
    /** 
     * 数据提交之前的操作
     * @access public 
     * @since dxf 
     * @return [type] 
     */ 
    protected function after_del($data){
        $contents='删除了账号，账号名称：'.$data['admin_name'].'，真实名称：'.$data['real_name'];
        $this->writeLog($contents);
    }
}
