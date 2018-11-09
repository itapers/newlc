<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/Users/modou/Works/web/newlc/public/../application/backend/view/more/count.html";i:1534736720;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;}*/ ?>
﻿<!DOCTYPE html>
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


<script src="__STATICBACKEND__/echats/echarts.js"></script>
<style type="text/css">
     html{
      background-color:#fff;
    }
    .main{
        height:500px;
        border:1px solid #ccc;
        padding:10px;
    }
    .title{
        text-align: center;
        margin-top:20px;
        font-size:17px;
        font-weight:600;

    }
    .demotable{
      margin: 50px 20px;
    }
</style>
    <div class="demotable">
      <form action="<?php echo url('more/count'); ?>" method="get" class="layui-form">
      <div class="layui-inline">
        <div class="layui-input-inline" style="width:130px;">
          <input type="text"  name="start"  class="layui-input" id="test1" placeholder="开始时间" value="<?php echo $data['day_count']['param']['start']; ?>" AUTOCOMPLETE="OFF">
        </div>
      </div>
      <div class="layui-inline">
        <div class="layui-input-inline" style="width:130px;">
          <input type="text" name="end" class="layui-input" id="test2" placeholder="结束时间" value="<?php echo $data['day_count']['param']['end']; ?>" AUTOCOMPLETE="OFF">
        </div>
      </div>
     
      
      <button class="layui-btn" data-type="reload">搜 索</button>
      </form>
    </div>
    <div class="title">
        每日客户资源柱状统计图
    </div>
    <div id="mainm" class="main" style="margin-top:10px;"></div>
    <script type="text/javascript">
         layui.use(['form', 'layedit', 'laydate'], function(){
            var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;
           //时间选择器
            laydate.render({
              elem: '#test1'
              ,type: 'datetime'
              ,format: 'yyyy-MM-dd HH:mm' //可任意组合
            });
            laydate.render({
              elem: '#test2'
              ,type: 'datetime'
              ,format: 'yyyy-MM-dd HH:mm' //可任意组合
            });
          })
    require.config({
        paths: {
            echarts: '__STATICBACKEND__/echats'
        }
    });
    require(
        [
            'echarts',
            'echarts/chart/bar',
            'echarts/chart/line',
            // 'echarts/chart/map',
            // 'echarts/chart/pie',
        ],
        function (ec) {
             //--- 折柱 ---
            var myChart = ec.init(document.getElementById('mainm'));
            myChart.setOption({
                title : {
                            text: '客户数',
                            subtext: '单位/条'
                        },
                        tooltip : {
                            trigger: 'axis'
                        },
                        legend: {
                            data:['客户数']
                        },
                        toolbox: {
                            show : true,
                            feature : {
                                //mark : {show: true},
                                //dataView : {show: true, readOnly: false},
                                magicType : {show: true, type: ['line', 'bar']},
                                restore : {show: true},
                                saveAsImage : {show: true}
                            }
                        },
                        calculable : true,
                        xAxis : [
                            {
                                type : 'category',
                                data : [<?php echo $data['day_count']['data']['date']; ?>]
                            }
                        ],
                        yAxis : [
                            {
                                type : 'value'
                            }
                        ],
                        series : [
                            {
                                name:'客户数',
                                type:'bar',
                                data:[<?php echo $data['day_count']['data']['count']; ?>],
                                markPoint : {
                                    data : [
                                        {type : 'max', name: '最大值'},
                                        {type : 'min', name: '最小值'}
                                    ]
                                },
                                markLine : {
                                    data : [
                                        {type : 'average', name: '平均值'}
                                    ]
                                }
                            }
                           
                        ]
            });
        }
    );
    </script>
</body>
</html>