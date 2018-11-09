<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:92:"/Users/modou/Works/web/newlc/public/../application/backend/view/system_manage/actionlog.html";i:1535102628;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/footer.html";i:1533524129;}*/ ?>
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
  html{
    background: #fff;
  }
  .demoTable{
    text-align: center;
  }
</style>
<div style="width:98%;margin:0 auto;margin-top: 20px; ">
  <div class="demoTable">
    <form action="<?php echo url('SystemManage/actionLog'); ?>" method="get" >
    <div class="layui-input-inline">
        <input type="text" name="admin_name" placeholder="账号" autocomplete="off" class="layui-input" value="<?php echo !empty($param['admin_name'])?$param['admin_name']:''; ?>" >
    </div>
    <div class="layui-input-inline">
        <input type="text" name="content" placeholder="查找内容" autocomplete="off" class="layui-input" value="<?php echo !empty($param['content'])?$param['content']:''; ?>">
    </div>
    <button class="layui-btn" data-type="reload">搜索</button>
    </form>
</div>
<div class="layui-form">
  <table class="layui-table">
    <thead>
      <tr>
        <th>账号</th>
        <th>内容</th>
        <th>操作ip</th>
        <th>时间</th>
      </tr> 
    </thead>
    <tbody>
      <?php foreach($data as $v): ?>
      <tr>
        <td><?php echo $v['admin_name']; ?></td>
        <td><?php echo $v['content']; ?></td>
        <td><?php echo $v['ip']; ?></td>
        <td><?php echo date("Y-m-d H:i:s",$v['created_t']); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<div class="pagelist">
  <?php echo $data->render(); ?>
</div>

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