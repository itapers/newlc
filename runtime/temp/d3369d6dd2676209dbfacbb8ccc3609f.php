<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"/Users/modou/Works/web/newlc/public/../application/backend/view/more/qrcode.html";i:1534136137;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/footer.html";i:1533524129;}*/ ?>
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
      <label class="layui-form-label">普通二维码<span class="reqcolor"></span></label>
      <div class="layui-input-block">
         <a class="layui-btn layui-btn-primary" href="javascript:;" onclick="get_qrcode()">点击生成</a>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">带logo的二维码<span class="reqcolor"></span></label>
      <div class="layui-input-block">
         <a class="layui-btn layui-btn-primary" href="javascript:;" onclick="get_qrcode_logo()">点击生成</a>
      </div>
    </div>
</form>
<script type="text/javascript">
  function get_qrcode(){
    var url = "<?php echo url('More/get_qrcode'); ?>";
    var data ='';
    jqueryAjax('POST',url,data,successBase);
    return false;
  }
  function get_qrcode_logo(){
    var url = "<?php echo url('More/get_qrcode_logo'); ?>";
    var data ='';
    jqueryAjax('POST',url,data,successBase);
    return false;
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