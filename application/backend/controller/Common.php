<?php
namespace app\backend\controller;
use think\Request;
use think\Controller;
use think\Db;
use think\Session;
use app\backend\model\AdminUser;
class Common   extends Controller
{
    public $OK = 0;                 //正常
    public $paramMiss = 101;        //参数缺失
    public $paramEmpty = 102;       //有参数，但值为空
    public $paramIllegal = 103;     //参数内容不合法
    public $validError = 104;       //验证不通过
    public $exceptionData = 105;    //数据异常
    public $resEmpty = 201;         //结果集为空
    public $noMoreData = 202;       //无更多结果集
    public $requestError = 301;     //curl等请求失败
    public $SQLError = 501;         //SQL错误
    public $repeatError = 601;      //重复操作
    public $spillError = 602;       //超过最大限度
    public $failed = 701;           //操作失败
    public $privilegeError = 901;   //权限不足
    public $invalidToken = 1001;    //token验证失败
    public $unknowError = -1;       //未知错误
    public $dateNow;
    /**
     * [errCode 错误码调用方法]
     * @param  [type] $para [错误码名称]
     * @return [type]       [错误码编号]
     */
    public function errCode( $para ){
        return $this->$para;
    }
    /**
     * 权限路由验证
     * @access public 
     * @since dxf 
     * @return []
     */
    public function _initialize(){
        parent::_initialize();
        $this->dateNow = date('Y-m-d H:i:s',time());
        // 如果是手机跳转到 手机模块
        if(isMobile()){
            echo '<div style="margin-top:320px;text-align:center;font-size:3rem;">欢迎光临！<br/>请用电脑访问后台哦！</div>';
            die;
        }
        $ausess=$this->ausess();
        $this->assign('config',tpCache());
        $this->authCheck();
        if(empty($ausess['auid'])){
            echo '<script>parent.location.href="http://'.$_SERVER['HTTP_HOST'].'/backend/login";</script>';
            die;
        }
    }
    /**
     * 写入日志
     * @access public 
     * @param String   $content 内容
     * @since dxf 
     * @return []
     */
    public function writeLog($content){
        $ausess=$this->ausess();
        $data=array(
            'auid'=>$ausess['auid'],
            'group_id'=>$ausess['group_id'],
            'content'=>$content,
            'created_t'=>time(),
            'ip'=>Request::instance()->ip()
        );
        Db::name('log')->insert($data);
    }
    /**
     * 数据提交处理移除空格
     * @access public 
     * @since dxf 
     * @return [type] [array]
     */
    public function dataAction(){
        $ress='';
        $data=input('post.');
        foreach ($data as $k => $v) {
            $ress[$k]=trim($v);
        }
        return $ress;
    }
    /**
     * ajax删除
     * @access public 
     * @param String   $table 数据表名称
     * @since dxf 
     * @return [type] [json]
     */
    public function del($table){
        
        $data=Request::instance()->post();
        if(!empty($data['did'])){
            $did=$data['did'];
            $ress=Db::name($table)->delete($did);
            if($ress){
                ajaxReturn($this->errCode('OK'), '删除成功！');
            }else{
                ajaxReturn($this->errCode('SQLError'), '删除失败！');
            }
        }else{
            $del_ress=Db::name($table)->where(['id'=>$data['id']])->find();
            $ress=Db::name($table)->delete($data['id']);
            if($ress){
                $this->after_del($del_ress);
                ajaxReturn($this->errCode('OK'), '删除成功！');
            }else{
                ajaxReturn($this->errCode('SQLError'), '删除失败！');
            }
        }
    }
    /**
     * 权限检查
     * @access protected 
     * @since dxf 
     * @return [type] 
     */
    protected function authCheck(){
        $ausess=$this->ausess();
        $request = Request::instance();
        $module=$request->module();
        $controller=$request->controller();
        $action=$request->action();
        $rulename=['name'=>"$module/$controller/$action"];
        $rule_ress=Db::name('auth_rule')->where($rulename)->find();
        if($rule_ress){
            if($rule_ress['status']==0){
                echo '<script>alert("权限被禁用！");location.href="'.url('backend/index/welcome').'"</script>';
            }
            $exit=in_array($rule_ress['id'], explode(',',$ausess['rules']));
            if(empty($exit)){
                echo '<script>alert("无权限访问！");location.href="'.url('backend/index/welcome').'"</script>';
            }
        }
    }
    /**
     * 获取session信息
     * @access protected 
     * @since dxf 
     * @return Response
     */
    protected function ausess(){
        return Session::get('ausess');
    }
    /**
     * ajax添加数据库处理
     * @access public 
     * @param String   $model 数据表模型
     * @since dxf 
     * @return [type] [json]
     */
    protected function addAction($model){
        $data=$this->before_add($this->dataAction());
        if(empty($data['id'])){
            $ausess=$this->ausess();
            $data['auid']=$ausess['auid'];
            $data['group_id']=$ausess['group_id'];
            if($model->allowField(true)->validate(true)->save($data)) {
                $this->write_log($data);
                $this->after_add($this->dataAction());
                ajaxReturn($this->errCode('OK'), '信息提交成功');
            }else{
                ajaxReturn($this->errCode('SQLError'), $model->getError());
            }
        }else{
            if($model->allowField(true)->validate(true)->save($data,['id' =>$data['id']])){
                $this->write_log($data);
                $this->after_add($this->dataAction());
                ajaxReturn($this->errCode('OK'), '信息修改成功');
            }else{
                ajaxReturn($this->errCode('SQLError'), $model->getError());
            }
        }
    }
}
