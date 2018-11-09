<?php
namespace app\backend\validate;
use think\Validate;
class AuthRule extends Validate
{
    // 验证规则
    protected $rule = [
        ['title', 'require|unique:AuthRule', '名称不能为空|名称已经存在了'],
        ['name', 'require|unique:AuthRule', '路由不能为空|路由已经存在'],
        ['status', 'require', '状态不能为空！'],
    ];
    
}