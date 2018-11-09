<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"/Users/modou/Works/web/newlc/public/../application/backend/view/customer/fromindex.html";i:1535012097;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/footer.html";i:1533524129;}*/ ?>
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


<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
            <div class="layui-card-header">
                    客户来源列表
                <a href="javascript:;"  class="layui-btn layui-btn-sm layui-btn-normal" onclick="add_data('添加客户来源',0)" style="float:right;margin-top: 10px;">+添加客户来源</a>
            </div>
            <div class="layui-card-body">
                <table class="layui-table">
                  <thead>
                    <tr>
                        <th width="">ID</th>
                        <th width="">客户来源</th>
                        <th width="">链接</th>
                        <th width="">排序</th>
                        <th width="">状态</th>
                        <th width="">添加人</th>
                        <th width="">添加时间</th>
                        <th width="">操作</th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php foreach($data as $vo): ?>
                    <tr>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo $vo['name']; ?></td>
                        <td><?php if(!empty($vo->link)){  ?> <a href="<?php echo $vo->link; ?>" target="_blank" title="查看链接"><i class="layui-icon layui-icon-link"></i>  </a>  <?php } ?></td>
                        <td><?php echo $vo->ord; ?></td>
                        <td><span class="<?php echo $vo['status']==1?'':'layui-bg-orange'; ?>  radius"><?php echo $vo['status']==1?'已启用' : '已禁用'; ?></span>
                        </td>
                        <td><?php echo !empty($vo->hasGroupone->group_name)?$vo->hasGroupone->group_name:''; ?>-<?php echo !empty($vo->hasAuone->real_name)?$vo->hasAuone->real_name:''; ?></td>
                        <td><?php echo $vo->ctime; ?></td>
                        <td>
                            <div class="layui-btn-group">
                                <button class="layui-btn layui-btn-sm"  onclick="add_data('编辑客户来源',<?php echo $vo['id']; ?>)"><i class="layui-icon">&#xe642;</i>编辑</button>
                                <button class="layui-btn layui-btn-sm layui-btn-danger" onclick="del(<?php echo $vo['id']; ?>)"><i class="layui-icon" >&#xe640;</i>删除</button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
            <div class="pagelist">
            <?php echo $data->render(); ?>
          </div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
    function add_data(title,id){
        var url = "<?php echo url('Customer/fromAdd'); ?>"+ '?id=' + id;
        x_admin_show(title,url,500,500);
    }
    function del(id){
        layer.confirm('确认要删除吗？',function(index){
            var url = "<?php echo url('Customer/fromDelete'); ?>";
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

