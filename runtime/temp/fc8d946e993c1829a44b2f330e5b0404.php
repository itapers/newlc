<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/Users/modou/Works/web/newlc/public/../application/backend/view/more/message.html";i:1534736720;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;}*/ ?>
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
    background-color:#fff;
  }
</style>
<form class="layui-form"  style="margin:100px 300px;" id="addform" >
    <div class="layui-form-item">
      <label class="layui-form-label">
        手机号<span style="color:red;">*</span>
      </label>
      <div class="layui-input-block">
        <input type="text" name="phone" class="layui-input"   lay-verify="phone">
      </div>
    </div>
    <div class="layui-form-item layui-form-text">
          <label class="layui-form-label">短信内容</label>
          <div class="layui-input-block">
              <textarea  placeholder="请输入内容" class="layui-textarea" disabled>欢迎使用短信功能，祝您生活工作愉快！(测试内容禁止修改！)</textarea>
          </div>
      </div>
    <div class="layui-form-item" style="text-align:center;">
      <div class="layui-input-block">
        <button class="layui-btn" lay-submit="" lay-filter="addaction">发 送</button>
      </div>
    </div>
</form>
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
    /* 自定义验证规则 */
    form.verify({
     
    });
    /* 监听提交 */
    form.on('submit(addaction)', function(data){
      var url = "<?php echo url('More/message'); ?>";
      var data =$("#addform").serializeArray();
      jqueryAjax('POST',url,data,successBase);
      return false;
    });
  });
</script>