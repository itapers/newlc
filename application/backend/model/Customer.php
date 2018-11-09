<?php
namespace app\backend\model;
use think\Model;
use think\Request;
use think\Db;
class Customer extends BaseModel
{   
    protected $tableName = 'customer';
    protected $tableName1 = 'customer_cate';
    // 类型转换
    protected $type = array(
        'ctime' => 'timestamp:Y-m-d H:i:s',
        'uptime'=> 'timestamp:Y-m-d H:i:s',
        'warn_time'=> 'timestamp:Y-m-d H:i:s'
    );
    //自动写入
    protected $insert = array(
       'ctime',
    );
    //自动更新
    protected $update = array(
       'uptime',
    );
    //写入当前创建时间
    protected function setCtimeAttr()
    {
        return time();
    }
    protected function setUptimeAttr()
    {
        return time();
    }
    
    //模型关联部门
    public function hasGroupone()
    {
        return $this->hasOne('AuthGroup','id','group_id')->field('group_name,rules');
    }
    //模型关联员工
    public function hasAuone()
    {
        return $this->hasOne('AdminUser','id','auid')->field('real_name');
    }
    //模型关联客户分类
    public function hasCateone()
    {
        return $this->hasOne('customer_cate','id','cate_id')->field('name');
    }
    //模型关联客户来源
    public function hasFromone()
    {
        return $this->hasOne('customer_from','id','from')->field('name');
    }
    /**
     * 客户数据
     * @access public 
     * @param array   $where 查询条件
     * @param string   $ord  排序
     * @param string   $perPage  每页大小
     * @since dxf 
     * @return [obj]
     */
    static public function stDate($where='1=1',$ord="status desc,ord desc,id desc",$perPage=15){
        $ress=Customer::where($where)->order($ord)->paginate($perPage);
        return $ress;
    }
    /**
     * 全部客户数据
     * @access public 
     * @param array   $where 查询条件
     * @param string   $ord  排序
     * @since dxf 
     * @return [obj]
     */
    static public function getAll($where='1=1',$ord="status desc,ord desc,id desc"){
        $ress=Customer::where($where)->order($ord)->select();
        return $ress;
    }
    /**
     * [get_list 获取列表数据]
     * @param  [type] $where  [条件值]
     * @param  [type] $order  [排序规则]
     * @param  [type] $offset [offset]
     * @param  [type] $limit  [limit]
     * @return [type]         [二维数组]
     */
    public function get_list($param,$where='1=1',$order="status desc,ord desc,id desc"){
        $offset=($param['page'] - 1) * $param['limit'];
        $rs = parent::get_list_base($this->tableName,$where,$order,$offset,$param['limit']);
        $count=$this->get_count_for_table($where);
        return ['list'=>$rs,'count'=>$count];
    }
    /**
     * [get_count_for_table 后台管理表单列表总数]
     * @param array $map [where条件合集]
     * @return [type]      [int]
     */
    public function get_count_for_table($map = [])
    {
        $rs = parent::get_count_for_table_base($map, $this->tableName);
        return $rs;
    }
    /**
     * [update_updata 更新数据]
     * @param  [type] $data [数据]
     * @return [type]       [bool]
     */
    public function update_data($data){
        $rs = parent::update_base($data, $this->tableName);
        return $rs;
    }
    
    /**
     * 客户数据
     * @access public 
     * @param array   $param 查询参数
     * @param array   $where  查询条件
     * @since dxf 
     * @return [array]
     */
    public function get_join_list($param,$where='1=1'){
        $offset=($param['page'] - 1) * $param['limit'];
        $tb1=$this->tableName1;
        $rs=Db::name($this->tableName)->alias('t')
            ->join("$tb1 t1",'t.cate_id=t1.id','LEFT')
            ->join("customer_from t2",'t.from=t2.id','LEFT')
            ->join("admin_user t3",'t.auid=t3.id','LEFT')
            ->join("auth_group t4",'t.group_id=t4.id','LEFT')
            ->field('t.*,t1.name as cate_name,t2.name as from_name,t3.real_name,t4.group_name')
            ->where($where)
            ->order('t.status desc,t.ord desc,t.id desc')
            ->limit($offset,$param['limit'])
            ->select();
        //数据赋值修改
        $news_status=config('news_status');
        foreach ($rs as $k => $v) {
            $rs[$k]['warn_time']=change_date($v['warn_time'],2);
            $rs[$k]['ctime']=change_date($v['ctime'],2);
            $rs[$k]['status']=$news_status[$v['status']];
            $rs[$k]['dq']=$v['province'].$v['city'].$v['area'];
            $rs[$k]['real_name']=$v['group_name']."-".$v['real_name'];
        }
        //总数
        $count =Db::name($this->tableName)->alias('t')
            ->join("$tb1 t1",'t.cate_id=t1.id','LEFT')
            ->join("customer_from t2",'t.from=t2.id','LEFT')
            ->field('t.*,t1.name as cate_name,t2.name as from_name')
            ->where($where)
            ->count();
        return ['list'=>$rs,'count'=>$count];
    }
    /**
     * 数据导出
     * @access public 
     * @param array   $param 查询参数
     * @param array   $where  查询条件
     * @since dxf 
     * @return [array]
     */
    public function get_down_list($param,$where='1=1'){
        $tb1=$this->tableName1;
        $ress=Db::name($this->tableName)->alias('t')
            ->join("$tb1 t1",'t.cate_id=t1.id','LEFT')
            ->join("customer_from t2",'t.from=t2.id','LEFT')
            ->join("admin_user t3",'t.auid=t3.id','LEFT')
            ->join("auth_group t4",'t.group_id=t4.id','LEFT')
            ->field('t.*,t1.name as cate_name,t2.name as from_name,t3.real_name,t4.group_name')
            ->where($where)
            ->order('t.status desc,t.ord desc,t.id desc')
            ->select();
        //数据赋值修改
        $status=config('status');
        $rs['0']['id']='编号';
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
        $rs['0']['warn_time']='跟进时间';
        $rs['0']['uptime']='更新时间';
        $rs['0']['ctime']='创建时间';
        $rs['0']['group_name']='添加部门';
        $rs['0']['real_name']='添加人';
        foreach ($ress as $k => $v) {
            $k=$k+1;
            $rs[$k]['id']=$v['id'];
            $rs[$k]['from_name']=$v['from_name'];
            $rs[$k]['cate_name']=$v['cate_name'];
            $rs[$k]['name']=$v['name'];
            $rs[$k]['mobile']=$v['mobile'];
            $rs[$k]['wx']=$v['wx'];
            $rs[$k]['qq']=$v['qq'];
            $rs[$k]['contents']=$v['contents'];
            $rs[$k]['province']=$v['province'];
            $rs[$k]['city']=$v['city'];
            $rs[$k]['area']=$v['area'];
            $rs[$k]['address']=$v['address'];
            $rs[$k]['warn_time']=change_date($v['warn_time'],1);
            $rs[$k]['uptime']=change_date($v['uptime'],1);
            $rs[$k]['ctime']=change_date($v['ctime'],1);
            $rs[$k]['group_name']=$v['group_name'];
            $rs[$k]['real_name']=$v['real_name'];
        }    
        return $rs;
    }
    /**
     * 首页数据的统计
     * @access public 
     * @param array   $where  查询条件
     * @since dxf 
     * @return [array]
     */
    public function get_count($where='1=1'){
        $tb1=$this->tableName1;
        $count=Db::name($this->tableName)->alias('t')
            ->join("$tb1 t1",'t.cate_id=t1.id','LEFT')
            ->field('count(t.id) as count,t1.name')
            ->where($where)
            ->order('t1.ord desc,t1.id desc')
            ->group('t.cate_id')
            ->select();
        return $count;
    }
    /**
     * 首页数据百分比统计
     * @access public 
     * @param array   $data 查询参数
     * @since dxf 
     * @return [array]
     */
    public function get_per($data){
        $ress['data']='';
        foreach ($data as $k => $v) {
            $ress['data'].="{value:$v[count],name:'$v[name]'},";
            
        }
        $ress['name']=join(',', array_map(function($v) {return "'$v'";}, array_column($data,'name')));
        
        return $ress;
    }
    /**
     * 按日期查询统计录入客户个数
     * @access public 
     * @param array   $param 查询参数
     * @since dxf 
     * @return [array]
     */
    public function get_range_day_count($param=''){
        $ress=array();
        if(!empty($param['start']) && !empty($param['end'])){
            $start=strtotime($param['start']);
            $end=strtotime($param['end']);
        }else{
            //默认最近30天数据 
            $start=time()-2592000;
            $end=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        }
        $pstart=date('Y-m-d H:i',$start);
        $pend=date('Y-m-d H:i',$end);

        $param=['start'=>$pstart,'end'=>$pend];

        $sql="SELECT count(id) as ocount, date_format(FROM_UNIXTIME( `ctime`),'%m月%d日') odate  FROM `n_customer` where   `ctime`>$start and `ctime`<$end group by odate";
        $order_uday=Db::query($sql); //按月份分组的用户
        $ress1=array();
        foreach ($order_uday as $k => $v) {
            $ress1[$v['odate']]=$v;
            if(isset($ress1[$v['odate']]) && !empty($ress1[$v['odate']])){
                $ress1[$v['odate']]['oicount']=&$ress2[$v['odate']]['oicount'];    
            }else{
                $ress1[$v['odate']]['oicount']='0';
            }
        }
        $data['date']=join(',', array_map(function($v) {return "'$v'";}, array_column($ress1,'odate')));
        $data['count']=implode(',',array_column($ress1,'ocount'));
        return ['data'=>$data,'param'=>$param];
    }
    
     
}
 
