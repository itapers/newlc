<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/Users/modou/Works/web/newlc/public/../application/backend/view/more/long.html";i:1534136137;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/footer.html";i:1533524129;}*/ ?>
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


<script type="text/javascript" src="__STATICBACKEND__/map/js/MapType.js"></script>
<script type="text/javascript" src="__STATICBACKEND__/map/js/MapGrid.js"></script>
<link rel="stylesheet" href="__STATICBACKEND__/map/css/mapgrid.css">
<style type="text/css">
 html{
    background-color:#fff;
  }
</style>
<form class="layui-form"  style="margin:100px 300px;" id="addform" >
    <div class="layui-form-item">
      <label class="layui-form-label">
        经纬度
      </label>
      <div class="layui-input-block">
        <input type="text" name="long" class="layui-input" value="<?php echo !empty($data['ress']['long'])?$data['ress']['long']:''; ?>" id="map"  placeholder="" >
      </div>
    </div>
</form>
<script type="text/javascript">
   /**
   * MapType.js 是地图类型百度 高德 
   * 请在MapType.js里面把tMapKey方法里面的密钥换成自己的，目前属于测试密钥以防后期删除
   * MapGrid.js 是调用方法
   */
    new MapGrid('#map',{
    //地图类型 高端(gouldMap) 百度(baiduMap)
    type : baiduMap,//gouldMap || baiduMap
    /**
     * [callback description]
     * @param  {[type]}   lng [经度：]
     * @param  {[type]}   lat [纬度：]
     * @return {Function}     [description]
     */
    callback : function(lng,lat){
      console.log(lng,lat)
    }
    
  });
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