<?php
namespace app\backend\model;
use think\Model;
class AuthGroup extends BaseModel
{   
    protected $tableName = 'auth_group';
    protected $order = ['id' => 'desc'];

    // 类型转换
    protected $type = array(
        'ctime' => 'timestamp:Y-m-d',
    );
    //自动写入
    protected $insert = array(
       'ctime',
    );
    //写入当前创建时间
    protected function setcreatedTAttr()
    {
        return time();
    }
    /**
     * 部门数据
     * @access public 
     * @since dxf 
     * @return [array]
     */
    static public function groupList(){
        $ress=AuthGroup::where('status',1)->field('id,group_name')->select();
        if($ress) {
            $list = collection($ress)->toArray();
        }else{
            $list=[];
        }
        return $list;
    }
    /**
     * 部门数据
     * @access public 
     * @param array   $where 查询条件
     * @param string   $ord  排序
     * @param string   $perPage  每页大小
     * @since dxf 
     * @return [obj]
     */
    static public function stDate($where='1=1',$ord="status desc,id desc",$perPage=15){
        $ress=AuthGroup::where($where)->order($ord)->paginate($perPage);
        return $ress;
    }
    /**
     * 全部部门数据
     * @access public 
     * @param array   $where 查询条件
     * @param string   $ord  排序
     * @since dxf 
     * @return [obj]
     */
    static public function getAll($where='1=1',$ord="status desc,id desc"){
        $ress=AuthGroup::where($where)->order($ord)->select();
        return $ress;
    }

}
 
