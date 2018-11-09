<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"/Users/modou/Works/web/newlc/public/../application/backend/view/system_manage/loginlog.html";i:1535102026;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/footer.html";i:1533524129;}*/ ?>
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
</style>
<div style="width:98%;margin:0 auto;margin-top: 20px; ">
    <div class="demotable">
      <form action="<?php echo url('SystemManage/loginlog'); ?>" method="get" >
        <div class="layui-input-inline">
            <input type="text" name="admin_name" placeholder="输入账号" autocomplete="off" class="layui-input" value="<?php echo !empty($param['admin_name'])?$param['admin_name']:''; ?>" style="width:180px;">
        </div>
        <button class="layui-btn" data-type="reload">搜 索</button>
      
      </form>
    </div>
    <div class="layui-form">
      <table class="layui-table">
        <colgroup>
       
        </colgroup>
        <thead>
          <tr>
            <th>ID</th>
            <th>账号</th>
            <th>登录ip</th>
            <th>时间</th>
          </tr> 
        </thead>
        <tbody>
          <?php foreach($data as $v): ?>
          <tr>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['admin_name']; ?></td>
            <td><?php echo $v['ip']; ?></td>
            <td><?php echo date("Y-m-d H:i:s",$v['login_time']); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="pagelist">
      <?php echo $data->render(); ?>
    </div>
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
