<?php
namespace app\backend\validate;
use think\Validate;
class AdminUser extends Validate
{
    // 验证规则
    protected $rule = [
        ['admin_name', 'require|unique:AdminUser', '登录账号不能为空|登录账号已经存在了'],
        ['status', 'require', '状态不能为空！'],
    ];
    
    
}