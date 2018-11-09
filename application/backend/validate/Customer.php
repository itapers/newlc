<?php
namespace app\backend\validate;
use think\Validate;
class Customer extends Validate
{
    // 验证规则
    protected $rule = [
        ['name', 'require', '客户名称不能为空'],
    ];
    
    
}