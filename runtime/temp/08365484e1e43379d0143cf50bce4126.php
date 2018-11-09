<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/Users/modou/Works/web/newlc/public/../application/web/view/index/index.html";i:1534325937;s:78:"/Users/modou/Works/web/newlc/public/../application/web/view/public/header.html";i:1534736720;s:78:"/Users/modou/Works/web/newlc/public/../application/web/view/public/footer.html";i:1534326040;}*/ ?>
    <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo !empty($data->title)?$data->title.'—':''; ?><?php echo $config['1']; ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="__STATICBACKEND__/layuiadmin/layui/css/layui.css" media="all">
  <script type="text/javascript" src="__STATICBACKEND__/other/jquery.min.js"></script>
  <script src="__STATICBACKEND__/layuiadmin/layui/layui.js"></script> 
  <link rel="stylesheet" href="__STATICWEB__/css/mian.css">
	<link rel="stylesheet" href="__STATICWEB__/js/blog.js">
  <link rel="Shortcut Icon" href="/uploads/logo/<?php echo $config['21']; ?>" />
</head>
<body class="lay-blog">
    <div class="header">
      <div class="header-wrap">
        <h1 class="logo pull-left" >
           <a href="<?php echo url('web/index/index'); ?>" style="color:#fff;">
            <img src="/uploads/logo/<?php echo $config['21']; ?>" alt="" class="logo-img">
            <?php echo $config['1']; ?>
          </a>
        </h1>
       
        <div class="blog-nav pull-right">
          <a href="<?php echo url('backend/index/index'); ?>" target="_blank">
            <i class="layui-icon layui-icon-release" title="管理后台"></i>
          </a>
        </div>
        
      </div>
      

    </div>



    <script src="__STATICBACKEND__/other/main.js"></script> 
    <div class="container-wrap">
      <div class="container">
          <div class="contar-wrap" id="contar-wrap">
            <h4 class="item-title">
              <p><i class="layui-icon layui-icon-speaker"></i>公告：<span>欢迎光临！这是一个功能简单的网站首页</span></p>
            </h4>
          </div>
      </div>
    </div>
    <script>
      layui.use('flow', function(){
        var flow = layui.flow;
        flow.load({
          elem: '#contar-wrap' //流加载容器
          ,scrollElem: '#contar-wrap' //滚动条所在元素，一般不用填，此处只是演示需要。
          ,isAuto: false
          ,isLazyimg: true
          ,done: function(page, next){ //加载下一页
            $.ajax({
                type:'POST',
                url:"<?php echo url('Index/getData'); ?>",
                data:{page:page,limit:2},
                dataType:'json',
                success:function(res){
                   //数据插入
                  setTimeout(function(){
                    var lis = [];

                    for(var i = 0; i < res.data.length; i++){
                     // lis.push('<li>'+res.data[i].title+'</li>')
                     lis.push('<div class="item"><div class="item-box  layer-photos-demo2 layer-photos-demo"><h3><a href="details?id='+res.data[i].id+'">'+res.data[i].title+'</a></h3><h5>发布于：<span>'+res.data[i].ctime+'</span></h5><p>'+res.data[i].main+'</p><img src="'+res.data[i].main_img+'" alt="" style="width:120px;height:80px;"></div><div class="comment count"><a href="javascript:;">阅读量（'+res.data[i].num+'）</a><a href="details?id='+res.data[i].id+'" class="like">详情</a></div></div>')
                    }
                    var nn=(res.count)/2;
                    next(lis.join(''), page < nn); 
                  }, 500);
                },
                error:function(res){
                    alert('系统繁忙，请重试！');
                    return false;
                }
            });
            
          }
        });
      });
    </script>

    <div class="footer">
      <p>
        <span>&copy; 2018</span>
        <span><a href="<?php echo url('backend/index/index'); ?>" target="_blank">管理后台</a></span> 
        <span><?php echo $config['1']; ?></span>
      </p>
      <p><span>人生就是一场修行</span></p>
    </div>
</body>
</html>