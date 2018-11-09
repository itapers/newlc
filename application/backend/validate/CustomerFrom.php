<?php
namespace app\backend\validate;
use think\Validate;
class CustomerFrom extends Validate
{
    // 验证规则
    protected $rule = [
        ['name', 'require|unique:CustomerFrom', '客户来源不能为空|客户来源名称已经存在了'],
        ['status', 'require', '状态不能为空！'],
    ];
    
    
}