<?php
namespace app\backend\controller;
use think\Controller;
use think\Db;
use think\Config;
use think\Request;
use app\backend\model\AuthRule;
use app\backend\model\AuthGroup;
use app\backend\model\GroupConfig;
class Rule  extends Common
{
    /** 
     * 权限规则列表
     * @access public 
     * @since dxf 
     * @return [type]  页面
     */
    public function rule_list(){
        $data=Db::name('auth_rule')->order('ord')->select();
        $this->assign('data',generateTree($data));
        return  $this->fetch();
    }

    /** 
     * 添加和编辑权限页面
     * @access public 
     * @since dxf 
     * @return [type]  页面
     */
    public function ruleAdd(){
    	if(var_export(Request::instance()->isAjax(), true)==='true'){
    		$ress=$this->addRuleAction();
    		return $ress;
    	}
      $param=Request::instance()->param();
      if(isset($param['id'])){
          $data= Db::name('auth_rule')->where('id',$param['id'])->find();
      }else{
          $data=['status'=>1,'left_nav'=>0,'pid'=>$param['pid']];
      }
      $this->assign('data',$data);
    	return  $this->fetch();
    }
    /** 
     * 权限删除
     * @access public 
     * @since dxf 
     * @return [json] 
     */
    public function ruleDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $where['pid']=input('post.id');
          $id=Db::name('auth_rule')->where($where)->find();
          if($id){
              return ['msg'=>'删除失败，请先删除下级权限','status'=>2];
          }else{
             $this->writeLog("删除了权限数据！权限id=$where[pid]");
          }
          $ress=$this->del('auth_rule');
          return $ress;
       }
    }

    /** 
     * 部门列表
     * @access public 
     * @since dxf 
     * @return [type]  页面
     */
    public function groupList(){
        $data=AuthGroup::stDate();
        $this->assign('data',$data);
        return  $this->fetch();
    }

    /** 
     * 添加和修改部门
     * @access public 
     * @since dxf 
     * @return [type]  页面
     */
    public function groupAdd(){
      if(Request::instance()->isPost()===true){
          $data=input('post.');
          if(isset($data['rules'])){
            $data['rules']=implode(",",$data['rules']);
          }
          $pmodel=new AuthGroup;
              if(empty($data['id'])){
                  if ($pmodel->allowField(true)->validate(true)->save($data)) {
                      $this->writeLog("添加了部门数据！部门为$data[group_name]");
                      return ['msg'=>'添加成功！','code'=>0];
                   }else{
                      return ['msg'=>$pmodel->getError(),'code'=>2];
                   }
              }else{
                    if($pmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){  
                        $this->writeLog("修改了部门数据！部门为$data[group_name]");
                        return ['msg'=>'修改成功！','code'=>0];
                    }else{
                       return ['msg'=>$pmodel->getError(),'code'=>2];
                    }
              }
      }
      $param=input('param.');
      $data=[
        'status'=>1,
        'rules'=>array(),
      ];
      if(isset($param['id']) && !empty($param['id']) ){
        $authgroup=AuthGroup::get($param['id']);
        $data=$authgroup->toArray();
        $data['rules']=explode(',',$data['rules']);
      }
      $rulelist=Db::name('auth_rule')->order('ord')->select();
      $this->assign('rulelist',generateTree($rulelist));
      $this->assign('data',$data);
      return  $this->fetch();
    }
    /** 
     * 删除部门
     * @access public 
     * @since dxf 
     * @return [json]  
     */
    public function groupDelete(){
      if(var_export(Request::instance()->isAjax(), true)==='true'){
          $where['group_id']=input('post.id');
          $id=Db::name('admin_user')->where($where)->find();
          if($id){
            return ['msg'=>'删除失败，部门下存在员工账号','status'=>2];
          }else{
            $this->writeLog("删除部门数据！部门id为$where[group_id]");
          }
          $ress=$this->del('auth_group');
          return $ress;
       }
    }

    /** 
     * 权限数据提交数据库处理
     * @access public 
     * @since dxf 
     * @return [json]  
     */
    public function addRuleAction(){
        $data=$this->dataAction();
        $pmodel=new AuthRule;
        if(empty($data['id'])){
            if ($pmodel->allowField(true)->validate(true)->save($data)) {
              $contents="添加了权限，权限名称：$data[name]";
              $this->writeLog($contents);
              return ['code'=>0,'msg'=>'信息提交成功'];
           }else{
               return ['code'=>2,'msg'=>$pmodel->getError()];
           }
        }else{
            unset($data['pid']);
            if($pmodel->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                $contents="修改了权限名称：$data[name]";
                $this->writeLog($contents);
                return ['code'=>0,'msg'=>'信息修改成功'];
            }else{
               return ['code'=>2,'msg'=>$pmodel->getError()];
            }
        }
    }
    /** 
     * 数据删除之后的操作
     * @access public 
     * @param  array  $data  数据
     * @since dxf 
     * @return [] 
     */
    protected function after_del($data){
       
    }
    

   
}
