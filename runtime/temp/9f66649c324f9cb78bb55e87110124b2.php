<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"/Users/modou/Works/web/newlc/public/../application/backend/view/customer/index.html";i:1535014850;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;}*/ ?>
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
  .layui-card-header.layuiadmin-card-header-auto {
      padding-top: 12px;
      padding-bottom: 8px;
  }
  .layui-table-cell{
      height:40px;
      line-height: 40px;
  }
</style>

<div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-form layui-card-header layuiadmin-card-header-auto" >
        <div class="layui-form-item search" >
          <div class="layui-input-inline" style="width:100px;">
              <input type="text" name="name" placeholder="客户名称" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-input-inline" style="width:120px;">
              <input type="text" name="mobile" placeholder="手机号" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-input-inline" style="width:100px;">
              <input type="text" name="province" placeholder="省份" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-input-inline" style="width:100px;">
              <input type="text" name="city" placeholder="市" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-input-inline" style="width:150px;">
              <select name="from" lay-search="" id="selectfrom">
                <option value="">客户来源</option>
                <?php  if(isset($data['fromlist'])){  foreach($data['fromlist'] as $k=>$v): ?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php endforeach;  } ?>
              </select>
          </div>
          <div class="layui-input-inline" style="width:100px;">
              <select name="cate_id" lay-search="" id="selectcateid">
                <option value="">客户分类</option>
                <?php  if(isset($data['catelist'])){  foreach($data['catelist'] as $k=>$v): ?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php endforeach;  } ?>
              </select>
          </div>
          <div class="layui-input-inline" style="width:100px;">
              <select name="auid" lay-search="" id="selectauid">
                <option value="">添加人</option>
                <?php  if(isset($data['aulist'])){  foreach($data['aulist'] as $k=>$v): ?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['real_name']; ?></option>
                <?php endforeach;  } ?>
              </select>
          </div>
          
          <div class="layui-inline">
            <button class="layui-btn  layui-btn-normal " data-type="reload">
              <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="layui-card-body ">
        <div style="margin-bottom: 8px;" class="search">
          <button class="layui-btn" href="javascript:;" data-type="down" style="background-color:#CD950C;"><i class="layui-icon">&#xe601;</i>导出</button>
          <button class="layui-btn" href="javascript:;" data-type="leading" style="background-color:#4cc149;"><i class="layui-icon">&#xe601;</i>导入</button>
          <button class="layui-btn" data-type="add_data" style=""><i class="layui-icon">&#xe654;</i>添加</button>
        </div>
        <table id="layui-table" lay-filter="layui-table-tool"></table>
        <script type="text/html" id="barTpl">
          <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
          <a class="layui-btn layui-btn-xs" lay-event="detail" style="background: #e05eff;">详情</a>
          <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="delete">删除</a>
        </script>
      </div>
    </div>
  </div> 
  <script>
    layui.use('table', function(){
        var table = layui.table
        , form = layui.form;
        //第一个实例
        table.render({
            elem: '#layui-table'
            ,url: "<?php echo Url('Customer/getData'); ?>" //数据接口
            // ,width: 892
            //,height: 500
            ,height: 'full-180' //高度最大化减去差值
            ,page: { 
              layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
              ,curr: 1 //设定初始在第 5 页
              ,groups: 5 //只显示 1 个连续页码
              ,first: false //不显示首页
              ,last: false //不显示尾页
            }
            ,limit:15
            ,limits:[5,12,15,30,45,60,75,90]
            ,cols: [[ //表头
                {field: 'id', title: '编号', sort: true,width:80}
                ,{field: 'name', title: '客户名称', sort: true,}
                ,{field: 'mobile', title: '手机号', sort: true,}
                ,{field: 'dq', title: '地区', sort: true,}
                ,{field: 'from_name', title: '客户来源', sort: true}
                ,{field: 'cate_name', title: '客户分类', sort: true}
                ,{field: 'warn_time', title: '跟进时间', sort: true,}
                ,{field: 'ord', title: '排序', sort: true,width:80,}
                ,{field: 'ctime', title: '创建时间', sort: true,}
                ,{field: 'real_name', title: '添加人', sort: true,}
                ,{title: '操作', templet: '#barTpl'}
            ]]
            ,id: 'tablereload'
        });
        var $ = layui.$, active = {
          getCheckData: function(){ //获取选中数据
            var checkStatus = table.checkStatus('tablereload')
            ,data = checkStatus.data;
            var delList=[];
            data.forEach(function(n,i){
                  delList.push(n.id);
             });
            if(delList==''){
              layer.msg('未选择数据！',{icon: 2,time:2000});
              return false;
            };
            layer.confirm('确认要删除吗？删除就无法恢复',function(){
                var data1 = {did: delList};
                var url = "<?php echo Url('news/delete'); ?>";
                jqueryAjax('POST',url,data1,successReload); 
            });
          },
          reload: function(){
              //执行重载
              table.reload('tablereload', {
                  page: {
                      curr: 1 //重新从第 1 页开始
                  }
                  ,where: {
                      name: $('input[name="name"]').val(),
                      mobile: $('input[name="mobile"]').val(),
                      province: $('input[name="province"]').val(),
                      city: $('input[name="city"]').val(),
                      from: $("#selectfrom option:selected").val(),
                      cate_id: $("#selectcateid option:selected").val(),  
                      auid: $("#selectauid option:selected").val()
                  }
              });
          },
          add_data:function(){
              var url = "<?php echo url('Customer/add'); ?>";
              x_admin_show('添加客户信息',url,500,500);
          },
          down:function(){
              var name=$('input[name="name"]').val();
              var mobile=$('input[name="mobile"]').val();
              var province=$('input[name="province"]').val();
              var city=$('input[name="city"]').val();
              var from=$("#selectfrom option:selected").val(); 
              var cate_id=$("#selectcateid option:selected").val(); 
              var auid=$("#selectauid option:selected").val(); 
              var url = "<?php echo url('Customer/down'); ?>"+ '?name=' + name+'&mobile='+ mobile+'&province='+ province+'&city='+ city+'&cate_id='+ cate_id+'&from='+ from+'&auid='+ auid;
              location.href=url;
          },
          leading:function(){
              var url = "<?php echo url('Customer/leading'); ?>";
              x_admin_show('导入客户信息',url,400,300);
          },
        };
        $('.search .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });

        //监听工具条
        table.on('tool(layui-table-tool)', function(obj){
            iss = $(this);
            if(obj.event === 'edit'){
                var id = obj.data.id
                var url = "<?php echo Url('Customer/add'); ?>" + '?id=' + id;
                x_admin_show('编辑客户信息',url,500,500);
            }else if(obj.event === 'delete'){
                layer.confirm('确认要删除吗？删除就无法恢复了！',function(index){
                    var data = {id: obj.data.id};
                    var url = "<?php echo Url('Customer/delete'); ?>";
                    jqueryAjax('POST',url,data,successReload);
                });
            }else if(obj.event === 'detail'){
                var id = obj.data.id
                var url = "<?php echo Url('Customer/detail'); ?>" + '?id=' + id;
                location.href=url;
            }

        });
    });
  </script>
</body>
</html>

