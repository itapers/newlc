<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/Users/modou/Works/web/newlc/public/../application/backend/view/rule/rule_list.html";i:1533524129;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/footer.html";i:1533524129;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $config['1']; ?>-<?php echo lang('name'); ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="__STATICBACKEND__/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="__STATICBACKEND__/layuiadmin/style/admin.css" media="all">
  <link rel="stylesheet" type="text/css" href="__STATICBACKEND__/other/pagelist.css" />
  <script type="text/javascript" src="__STATICBACKEND__/other/jquery.min.js"></script>
  <script src="__STATICBACKEND__/layuiadmin/layui/layui.js"></script> 
  <script src="__STATICBACKEND__/other/main.js"></script> 
  <link rel="Shortcut Icon" href="/uploads/logo/<?php echo $config['21']; ?>" />
  <style type="text/css">
    .reqcolor{
      color:red;
    }
  </style>
</head>
<body>


<style type="text/css">
  .layui-btn+.layui-btn {
      margin-left: 0px;
  }
</style>
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
            <div class="layui-card-header">
                权限列表
                <a href="javascript:;"  class="layui-btn layui-btn-sm layui-btn-normal" onclick="add_data('添加顶级权限',0)" style="float:right;margin-top: 10px;">添加顶级权限</a>
            </div>

            <div class="layui-card-body">
                <table class="layui-table">
                  <thead>
                    <tr>
                        <th width="">权限名</th>
                        <th width="">权限路由</th>
                        <th width="">图标</th>
                        <th width="">排序</th>
                        <th width="">状态</th>
                        <th width="">操作</th>
                    </tr> 
                  </thead>
                  <tbody>
                     <?php foreach($data as $vo): ?>
                    <tr class="text-c text-hidden-<?php echo $vo['id']; ?>">
                        <td class="text-left"><?php echo $vo['title']; ?></td>
                        <td><?php echo $vo['name']; ?></td>
                        <td><i class="layui-icon <?php echo $vo['icon']; ?>"></i>  </td>
                        <td><?php echo $vo['ord']; ?></td>
                        <td><span class="label <?php echo $vo['status']==1?'label-success':'label-default'; ?>  radius"><?php echo $vo['status']==1?'已启用' : '已禁用'; ?></span></td>
                        <td>
                            <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="add_data('添加子权限',<?php echo $vo['id']; ?>)"><i class="layui-icon">&#xe654;</i></button>
                            <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="edit_data('修改权限',<?php echo $vo['id']; ?>)" ><i class="layui-icon">&#xe642;</i></button>
                            <button class="layui-btn layui-btn-primary layui-btn-sm"  onclick="del(<?php echo $vo['id']; ?>)"><i class="layui-icon">&#xe640;</i></button>
                        </td>
                    </tr>
                    <?php  if(isset($vo['son'])){  foreach($vo['son'] as $vson): ?>
                    <tr class="text-c text-hidden-<?php echo $vo['id']; ?>">
                        <td class="text-left">|——<?php echo $vson['title']; ?></td>
                        <td><?php echo $vson['name']; ?></td>
                        <td></td>
                        <td><?php echo $vson['ord']; ?></td>
                        <td><span class="label <?php echo $vson['status']==1?'label-success':'label-default'; ?>  radius"><?php echo $vson['status']==1?'已启用' : '已禁用'; ?></span></td>
                        <td>
                             <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="add_data('添加子权限',<?php echo $vson['id']; ?>)"><i class="layui-icon">&#xe654;</i></button>
                            <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="edit_data('修改权限',<?php echo $vson['id']; ?>)" ><i class="layui-icon">&#xe642;</i></button>
                            <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="del(<?php echo $vson['id']; ?>)"><i class="layui-icon" >&#xe640;</i></button>
                        </td>
                    </tr>
                        <?php  if(isset($vson['son'])){  foreach($vson['son'] as $pson): ?>
                        <tr class="text-c text-hidden-<?php echo $vo['id']; ?>">
                            <td class="text-left">|————<?php echo $pson['title']; ?></td>
                            <td><?php echo $pson['name']; ?></td>
                            <td></td>
                            <td><?php echo $pson['ord']; ?></td>
                            <td><span class="label <?php echo $pson['status']==1?'label-success':'label-default'; ?>  radius"><?php echo $pson['status']==1?'已启用' : '已禁用'; ?></span></td>
                            <td>
                                <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="edit_data('修改权限',<?php echo $pson['id']; ?>)" ><i class="layui-icon">&#xe642;</i></button>
                                <button class="layui-btn layui-btn-primary layui-btn-sm" onclick="del(<?php echo $pson['id']; ?>)"><i class="layui-icon" >&#xe640;</i></button>
                            </td>
                        </tr>
                        <?php endforeach;  } endforeach;  } endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
    <script type="text/javascript">
        function add_data(title,id){
            var url = "<?php echo url('Rule/ruleadd'); ?>"+ '?pid=' + id;
            x_admin_show(title,url,400,480);
        }
        function edit_data(title,id){
            var url = "<?php echo url('Rule/ruleadd'); ?>"+ '?id=' + id;
            x_admin_show(title,url,400,480);
        }
        function del(id){
            layer.confirm('确认要删除吗？',function(index){
                var url = "<?php echo url('rule/ruleDelete'); ?>";
                jqueryAjax('POST',url,{id:id},successReload);
            });
        }
    </script>

<script>
  layui.config({
    base: '__STATICBACKEND__/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'form', 'laydate'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,element = layui.element
    ,layer = layui.layer
    ,laydate = layui.laydate
    ,form = layui.form;
  });
</script>
</body>
</html>

