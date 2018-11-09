<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/Users/modou/Works/web/newlc/public/../application/backend/view/customer/add.html";i:1535103862;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;}*/ ?>
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


<script src="__STATICBACKEND__/distpicker/js/distpicker.js"></script>
<script src="__STATICBACKEND__/distpicker/js/main.js"></script>
<style type="text/css">
  html{
    background-color:#fff;
  }
  #province,#city,#area{
    width:102px;
    height:38px;
    border: 1px solid #E6E6E6;
  }
</style>
<form class="layui-form"  style="margin-top:30px;width:90%;" id="addform" onkeydown="if(event.keyCode==13){return false;}">
    <div class="layui-form-item">
      <label class="layui-form-label">客户称呼<span class="reqcolor">*</span></label>
      <div class="layui-input-block">
        <input type="text" name="name"  class="layui-input" lay-verify="required" value="<?php echo !empty($data['ress']['name'])?$data['ress']['name']:''; ?>" >
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">电话</label>
      <div class="layui-input-block">
        <input type="text" name="mobile"  class="layui-input" value="<?php echo !empty($data['ress']['mobile'])?$data['ress']['mobile']:''; ?>" >
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">QQ</label>
      <div class="layui-input-block">
        <input type="text" name="qq"  class="layui-input" value="<?php echo !empty($data['ress']['qq'])?$data['ress']['qq']:''; ?>" >
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">微信</label>
      <div class="layui-input-block">
        <input type="text" name="wx"  class="layui-input" value="<?php echo !empty($data['ress']['wx'])?$data['ress']['wx']:''; ?>" >
      </div>
    </div>
    <div class="layui-form-item">
        <label  class="layui-form-label">
            客户地址
            </label>
        <div class="layui-input-block" data-toggle="distpicker" id="address-select">
            <select id="province" name="province" data-province="<?php echo !empty($data['ress']['province'])?$data['ress']['province']:'请选择省'; ?>" lay-verify="province" lay-ignore></select>
            <select id="city"  name="city" data-city="<?php echo !empty($data['ress']['city'])?$data['ress']['city']:'请选择市'; ?>" lay-verify="city" lay-ignore ></select>
            <select id="area"  name="area" data-district="<?php echo !empty($data['ress']['area'])?$data['ress']['area']:'请选择区/县'; ?>" lay-verify="area" lay-ignore></select>
        </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">详细地址</label>
      <div class="layui-input-block">
        <input type="text" name="address"  class="layui-input" value="<?php echo !empty($data['ress']['address'])?$data['ress']['address']:''; ?>" >
      </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">留言内容</label>
        <div class="layui-input-block">
            <textarea name="contents" placeholder="请输入内容" class="layui-textarea"><?php echo !empty($data['ress']['contents'])?$data['ress']['contents']:''; ?></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">客户来源<span style="color:red;">*</span></label>
        <div class="layui-input-block">
          <select name="from" lay-verify="required" lay-search="">
            <option value="">全部</option>
            <?php  if(isset($data['fromlist'])){  foreach($data['fromlist'] as $v): ?>
              <option value="<?php echo $v['id']; ?>" <?php echo $v['id']==$data['ress']['from']?'selected':'';; ?>><?php echo $v['name']; ?></option>
              <?php endforeach;  } ?>
          </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">客户等级<span style="color:red;">*</span></label>
        <div class="layui-input-block">
          <select name="cate_id" lay-verify="required" lay-search="">
            <?php  if(isset($data['catelist'])){  foreach($data['catelist'] as $v): ?>
              <option value="<?php echo $v['id']; ?>" <?php echo $v['id']==$data['ress']['cate_id']?'selected':'';; ?>><?php echo $v['name']; ?></option>
              <?php endforeach;  } ?>
          </select>
        </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-block">
        <input type="number" name="ord"  class="layui-input"  value="<?php echo !empty($data['ress']['ord'])?$data['ress']['ord']:''; ?>" >
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">跟进时间</label>
      <div class="layui-input-block">
        <input type="text"  name="warn_time"  class="layui-input" id="time1" placeholder="  请选择" value="<?php echo !empty($data['ress']['warn_time'])?$data['ress']['warn_time']:''; ?>">
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
    //时间选择器
    laydate.render({
      elem: '#time1'
      ,type: 'datetime'
      ,min:minDate()
      ,format: 'yyyy-MM-dd HH:mm:ss' //可任意组合
    });
    // 设置最小可选的日期
    function minDate(){
        var now = new Date();
        return now.getFullYear()+"-" + (now.getMonth()+1) + "-" + now.getDate();
     }
    /* 自定义验证规则 */
    form.verify({
     
    });
    /* 监听提交 */
    form.on('submit(addaction)', function(data){
      var url = "<?php echo url('Customer/add'); ?>";
      var data =$("#addform").serializeArray();
      jqueryAjax('POST',url,data,successLayui);
      return false;
    });
  });

</script>