<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/Users/modou/Works/web/newlc/public/../application/backend/view/customer/fromadd.html";i:1535012097;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;}*/ ?>
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


<script src="__STATICBACKEND__/jscolor/jscolor.js"></script>
<style type="text/css">
  html{
    background-color:#fff;
  }
</style>
<form class="layui-form"  style="margin-top:30px;width:90%;" id="addform" onkeydown="if(event.keyCode==13){return false;}">
    <div class="layui-form-item">
      <label class="layui-form-label">客户来源<span class="reqcolor">*</span></label>
      <div class="layui-input-block">
        <input type="text" name="name"  class="layui-input" lay-verify="required" value="<?php echo !empty($data['ress']['name'])?$data['ress']['name']:''; ?>" >
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">来源链接</label>
      <div class="layui-input-block">
         <input type="text" name="link"  class="layui-input"  value="<?php echo !empty($data['ress']['link'])?$data['ress']['link']:''; ?>" >
      </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">描述</label>
        <div class="layui-input-block">
            <textarea name="contents" placeholder="请输入内容" class="layui-textarea"><?php echo !empty($data['ress']['contents'])?$data['ress']['contents']:''; ?></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="radio" name="status" value="1" title="启用"  <?php if($data['ress']['status']==1): ?> checked <?php endif; ?>>
            <input type="radio" name="status" value="-1" title="禁用" <?php if($data['ress']['status']==-1): ?> checked <?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-block">
        <input type="number" name="ord"  class="layui-input"  value="<?php echo !empty($data['ress']['ord'])?$data['ress']['ord']:''; ?>" >
      </div>
    </div>
   
    <div class="layui-form-item" style="text-align:center;">
      <div class="layui-input-block">
        <input  type="hidden" name='id' value="<?php echo !empty($data['ress']['id'])?$data['ress']['id']:''; ?>" id='hidden-id'>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        <button class="layui-btn" lay-submit="" lay-filter="addaction">保 存</button>

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
      var url = "<?php echo url('Customer/fromAdd'); ?>";
      var data =$("#addform").serializeArray();
      jqueryAjax('POST',url,data,successLayui);
      return false;
    });
  });

</script>
<script>
    $(document).ready( function() {
      
            $('.demo').each( function() {
                //
                // Dear reader, it's actually very easy to initialize MiniColors. For example:
                //
                //  $(selector).minicolors();
                //
                // The way I've done it below is just for the demo, so don't get confused 
                // by it. Also, data- attributes aren't supported at this time. Again, 
                // they're only used for the purposes of this demo.
                //
        $(this).minicolors({
          control: $(this).attr('data-control') || 'hue',
          defaultValue: $(this).attr('data-defaultValue') || '',
          inline: $(this).attr('data-inline') === 'true',
          letterCase: $(this).attr('data-letterCase') || 'lowercase',
          opacity: $(this).attr('data-opacity'),
          position: $(this).attr('data-position') || 'bottom left',
          change: function(hex, opacity) {
            var log;
            try {
              log = hex ? hex : 'transparent';
              if( opacity ) log += ', ' + opacity;
              console.log(log);
            } catch(e) {}
          },
          theme: 'default'
        });
                
            });
      
    });
  </script>