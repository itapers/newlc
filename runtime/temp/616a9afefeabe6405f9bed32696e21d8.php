<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/Users/modou/Works/web/newlc/public/../application/backend/view/index/home.html";i:1535096498;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;}*/ ?>
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


<script src="__STATICBACKEND__/echats/echarts.js"></script>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md8">
        <div class="layui-row layui-col-space15">
          <div class="layui-col-md6">
            <div class="layui-card">
              <div class="layui-card-header">快捷方式</div>
              <div class="layui-card-body">
                <div class="layui-carousel layadmin-carousel layadmin-shortcut">
                  <div carousel-item>
                    <ul class="layui-row layui-col-space10">
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('Rule/grouplist'); ?>">
                          <i class="layui-icon layui-icon-template-1"></i>
                          <cite>部门管理</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('AdminUsers/adminlist'); ?>">
                          <i class="layui-icon layui-icon-user"></i>
                          <cite>账号管理</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('SystemManage/loginlog'); ?>">
                          <i class="layui-icon layui-icon-chat"></i>
                          <cite>登录日志</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('SystemManage/actionLog'); ?>">
                          <i class="layui-icon layui-icon-dialogue"></i>
                          <cite>操作日志</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('Rule/rule_list'); ?>">
                          <i class="layui-icon layui-icon-app"></i>
                          <cite>权限管理</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('ConfigManage/index'); ?>">
                          <i class="layui-icon layui-icon-set"></i>
                          <cite>常用设置</cite>
                        </a>
                      </li>
                    </ul>
                    <ul class="layui-row layui-col-space10">
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('Rule/grouplist'); ?>">
                          <i class="layui-icon layui-icon-template-1"></i>
                          <cite>部门管理</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('AdminUsers/adminlist'); ?>">
                          <i class="layui-icon layui-icon-user"></i>
                          <cite>账号管理</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('SystemManage/loginlog'); ?>">
                          <i class="layui-icon layui-icon-chat"></i>
                          <cite>登录日志</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('SystemManage/actionLog'); ?>">
                          <i class="layui-icon layui-icon-dialogue"></i>
                          <cite>操作日志</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('Rule/rule_list'); ?>">
                          <i class="layui-icon layui-icon-app"></i>
                          <cite>权限管理</cite>
                        </a>
                      </li>
                      <li class="layui-col-xs3">
                        <a lay-href="<?php echo url('ConfigManage/index'); ?>">
                          <i class="layui-icon layui-icon-set"></i>
                          <cite>常用设置</cite>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="layui-col-md6">
            <div class="layui-card">
              <div class="layui-card-header">客户统计</div>
              <div class="layui-card-body">
                <div class="layui-carousel layadmin-carousel layadmin-backlog">
                  <div carousel-item>
                    <ul class="layui-row layui-col-space10">
                      <?php foreach($data['customer_num'] as $k=>$v): ?>
                      <li class="layui-col-xs6">
                        <a  class="layadmin-backlog-body">
                          <h3><?php echo $v['name']; ?></h3>
                          <p><cite><?php echo $v['count']; ?></cite></p>
                        </a>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="layui-col-md12">
            <div class="layui-card">
              <div class="layui-card-header">数据概览</div>
              <div class="layui-card-body">
                <div class="layui-carousel layadmin-carousel layadmin-dataview" data-anim="fade" lay-filter="LAY-index-dataview">
                  <div carousel-item id="LAY-index-dataview">
                    <div><i class="layui-icon layui-icon-loading1 layadmin-loading"></i></div>
                    <div></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="layui-card">
              <div class="layui-tab layui-tab-brief layadmin-latestData">
                <ul class="layui-tab-title">
                  <li class="layui-this">最新客户</li>
                 <!--  <li>今日热帖</li> -->
                </ul>
                <div class="layui-tab-content">
                  <div class="layui-tab-item layui-show">
                    <table id="LAY-index-topSearch"></table>
                  </div>
                  <!-- <div class="layui-tab-item">
                    <table id="LAY-index-topCard"></table>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="layui-col-md4">
        <div class="layui-card">
          <div class="layui-card-header">系统信息</div>
          <div class="layui-card-body layui-text">
            <table class="layui-table">
              <colgroup>
                <col width="100">
                <col>
              </colgroup>
              <tbody>
                <!-- <tr>
                  <td>版本</td>
                  <td>
                    <script type="text/html" template>
                      v1.0.1
                      <a href="javascript:;"  style="padding-left: 15px;" onclick="layer.alert('版本完成时间：2018年8月8日')">查看版本</a>
                    </script>
                  </td>
                </tr> -->
                <tr>
                  <td>系统名称</td>
                  <td>
                    <script type="text/html" template>
                     <?php echo $config['1']; ?>
                    </script>
                 </td>
                </tr>
                <tr>
                  <td>域名</td>
                  <td><?php echo $systemInfo['host_name']; ?></td>
                </tr>
                <tr>
                  <td>上次登录</td>
                  <td><?php echo $info['login_time']; ?></td>
                </tr>
                <tr>
                  <td>登录IP</td>
                  <td><?php echo !empty($info['login_ip'])?$info['login_ip']:''; ?></td>
                </tr>
                
                <tr>
                  <td>说明文档</td>
                  <td style="padding-bottom: 0;">
                    <div class="layui-btn-container">
                      <a href="javascript:;"  class="layui-btn layui-btn-sm layui-btn-warm" onclick="layer.msg('操作手册在根目录下！');">操作手册</a>
                      <a href="javascript:;"  class="layui-btn layui-btn-sm" onclick="layer.msg('操作手册在根目录下！');">开发手册</a>
                      
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        <div class="layui-card">
          <div class="layui-card-header">效果报告</div>
          <div class="layui-card-body layadmin-takerates">
            <div class="layui-progress" lay-showPercent="yes">
              <h3>转化率（日同比 28% <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
              <div class="layui-progress-bar" lay-percent="65%"></div>
            </div>
            <div class="layui-progress" lay-showPercent="yes">
              <h3>签到率（日同比 11% <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
              <div class="layui-progress-bar layui-bg-red" lay-percent="32%" ></div>
            </div>
            <div class="layui-progress" lay-showPercent="yes">
              <h3>转化率（日同比 28% <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
              <div class="layui-progress-bar layui-bg-green" lay-percent="65%"></div>
            </div>
            <div class="layui-progress" lay-showPercent="yes">
              <h3>签到率（日同比 11% <span class="layui-edge layui-edge-bottom" lay-tips="下降" lay-offset="-15"></span>）</h3>
              <div class="layui-progress-bar layui-bg-red" lay-percent="32%" ></div>
            </div>
            <div class="layui-progress" lay-showPercent="yes">
              <h3>转化率（日同比 28% <span class="layui-edge layui-edge-top" lay-tips="增长" lay-offset="-15"></span>）</h3>
              <div class="layui-progress-bar layui-bg-black" lay-percent="85%"></div>
            </div>
          </div>
        </div>
        <div class="layui-card">
          <div class="layui-card-header">常用网址</div>
          <div class="layui-card-body">
            <div class="layui-carousel layadmin-carousel layadmin-news" data-autoplay="true" data-anim="fade" lay-filter="news">
              <div carousel-item>
                <div><a href="http://www.baidu.com" target="_blank" class="layui-bg-red">百度网站</a></div>
                <div><a href="http://www.qq.com" target="_blank" class="layui-bg-green">腾讯首页</a></div> 
                <div><a href="https://www.163.com/" target="_blank" class="layui-bg-blue">网易163</a></div>
                
              </div>
            </div>
          </div>
        </div>

        <div class="layui-card">
          <div class="layui-card-header">
            公司简介
            <i class="layui-icon layui-icon-tips" lay-tips="公司简介" lay-offset="5"></i>
          </div>
          <div class="layui-card-body layui-text layadmin-text">
            <p>**网络科技有限公司，是中原地区最早从事互联网行业网络建设的企业之一，专注于为中小型企业提供网页设计、网站微信系统小程序APP开发、网站推广服务和电子商务平台搭建。曾多次被评为中原网络公司行业代表，在中原网站建设领域取得客户一致好评。
            <p>***本着创新、服务、专业的互联网新思维，凭借多年的互联网运营服务经验，已建成包括房地产、机械、电子、鞋服、石材、包袋、化工、工艺品、食品等三十多个行业的专业化企业平台，服务的客户上百家，并为多个省内外政府机关大型网站建设专案策划。</p>
            <p>—— 小易（<a href="http://www.baidu.com/" target="_blank">baidu.com</a>）</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  layui.config({
    base: '__STATICBACKEND__/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'console','carousel', 'echarts'], function(){
  //数据概览
    var $ = layui.$
    ,carousel = layui.carousel
    ,echarts = layui.echarts;
    var echartsApp = [], options = [
      //客户量
      {
        title: {
          text: '最近一周每日的客户量',
          x: 'center',
          textStyle: {
            fontSize: 14
          }
        },
        tooltip : { //提示框
          trigger: 'axis',
          formatter: "{b}<br>客户量：{c}"
        },
        xAxis : [{ //X轴
          type : 'category',
          data : [<?php echo $data['day_count']['data']['date']; ?>]
        }],
        yAxis : [{  //Y轴
          type : 'value'
        }],
        series : [{ //内容
          type: 'line',
          data:[<?php echo $data['day_count']['data']['count']; ?>],
        }]
      },
      //访客浏览器分布
      { 
        title : {
          text: '客户等级汇总所占百分比',
          x: 'center',
          textStyle: {
            fontSize: 14
          }
        },
        tooltip : {
          trigger: 'item',
          formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
          orient : 'vertical',
          x : 'left',
          data:[<?php echo $data['per']['name']; ?>]
        },
        series : [{
          name:'类型',
          type:'pie',
          radius : '55%',
          center: ['50%', '50%'],
          data:[
            <?php echo $data['per']['data']; ?>
          ]
        }]
      },
      
      
    ]
    ,elemDataView = $('#LAY-index-dataview').children('div')
    ,renderDataView = function(index){
      echartsApp[index] = echarts.init(elemDataView[index], layui.echartsTheme);
      echartsApp[index].setOption(options[index]);
      window.onresize = echartsApp[index].resize;
    };
    
    
    //没找到DOM，终止执行
    if(!elemDataView[0]) return;
    
    
    
    renderDataView(0);
    
    //监听数据概览轮播
    var carouselIndex = 0;
    carousel.on('change(LAY-index-dataview)', function(obj){
      renderDataView(carouselIndex = obj.index);
    });
    
    //监听侧边伸缩
    layui.admin.on('side', function(){
      setTimeout(function(){
        renderDataView(carouselIndex);
      }, 300);
    });
    
    //监听路由
    layui.admin.on('hash(tab)', function(){
      layui.router().path.join('') || renderDataView(carouselIndex);
    });
  });


  </script>
</body>
</html>