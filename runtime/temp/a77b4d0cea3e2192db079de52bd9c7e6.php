<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/Users/modou/Works/web/newlc/public/../application/backend/view/news/add.html";i:1535018105;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;s:83:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/ueditor.html";i:1533530630;}*/ ?>
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


<!--以下是在线编辑器 代码 -->
<script type="text/javascript">
    /*
   * 在线编辑器相 关配置 js 
   *  参考 地址 http://fex.baidu.com/ueditor/
   */
    window.UEDITOR_Admin_URL = "__STATICBACKEND__/Ueditor/";
    var URL_upload = "";
    var URL_fileUp = "";
    var URL_scrawlUp = "";
    var URL_getRemoteImage = "";
    var URL_imageManager = "";
    var URL_imageUp = "";
    var URL_getMovie = "";
    var URL_home = "";
</script>
<script type="text/javascript" charset="utf-8" src="__STATICBACKEND__/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__STATICBACKEND__/Ueditor/ueditor.all.min.js"> </script>
 <script type="text/javascript" charset="utf-8" src="__STATICBACKEND__/Ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">  
    var editor;
    $(function () {
        //具体参数配置在  editor_config.js  中
        var options = {
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 600, //初化高度
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign'
            , //允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true
            /*   autotypeset: {
                mergeEmptyline: true,        //合并空行
                removeClass: true,           //去掉冗余的class
                removeEmptyline: false,      //去掉空行
                textAlign: "left",           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
                imageBlockLine: 'center',    //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
                pasteFilter: false,          //根据规则过滤没事粘贴进来的内容
                clearFontSize: false,        //去掉所有的内嵌字号，使用编辑器默认的字号
                clearFontFamily: false,      //去掉所有的内嵌字体，使用编辑器默认的字体
                removeEmptyNode: false,      //去掉空节点
                                             //可以去掉的标签
                removeTagNames: {"font": 1},
                indent: false,               // 行首缩进
                indentValue: '0em'           //行首缩进的大小
            }*/,
          toolbars: [
                   ['fullscreen', 'source', '|', 'undo', 'redo',
                       '|', 'bold', 'italic', 'underline', 'fontborder',
                       'strikethrough', 'superscript', 'subscript',
                       'removeformat', 'formatmatch', 'autotypeset',
                       'blockquote', 'pasteplain', '|', 'forecolor',
                       'backcolor', 'insertorderedlist',
                       'insertunorderedlist', 'selectall', 'cleardoc', '|',
                       'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                       'customstyle', 'paragraph', 'fontfamily', 'fontsize',
                       '|', 'directionalityltr', 'directionalityrtl',
                       'indent', '|', 'justifyleft', 'justifycenter',
                       'justifyright', 'justifyjustify', '|', 'touppercase',
                       'tolowercase', '|', 'link', 'unlink', 'anchor', '|',
                       'imagenone', 'imageleft', 'imageright', 'imagecenter',
                       '|', 'insertimage', 'emotion', 'insertvideo',
                       'attachment', 'map', 'gmap', 'insertframe',
                       'insertcode', 'webapp', 'pagebreak', 'template',
                       'background', '|', 'horizontal', 'date', 'time',
                       'spechars', 'wordimage', '|',
                       'inserttable', 'deletetable',
                       'insertparagraphbeforetable', 'insertrow', 'deleterow',
                       'insertcol', 'deletecol', 'mergecells', 'mergeright',
                       'mergedown', 'splittocells', 'splittorows',
                       'splittocols', '|', 'print', 'preview', 'searchreplace']
               ]
        };
        editor = new UE.ui.Editor(options);
        editor.render("contents");  //  指定 textarea 的  id 为 goods_content
    });  
</script>


<style type="text/css">
  html{
    background-color:#fff;
  }
  .input_img_inline{
    float: none !important;
    width: 100px !important;
  }
  .layui-upload-list{
      display: inline-block;
  }
  .icon_view, .layui-upload-img {
      width: 80px;
      height: 80px;
  }
  </style>
<form class="layui-form"  style="margin-top:30px;width:80%;" id="addform" onkeydown="if(event.keyCode==13){return false;}">
     <div class="layui-form-item">
        <label class="layui-form-label">新闻标题<span class="reqcolor">*</span></label>
        <div class="layui-input-block">
          <input type="text" name="title" lay-verify="required|title"  placeholder="" class="layui-input" value="<?php echo !empty($data['ress']['title'])?$data['ress']['title']:''; ?>">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">关键字<span class="reqcolor">*</span></label>
        <div class="layui-input-block">
          <input type="text" name="key_words" lay-verify="required|key_words"  placeholder="" class="layui-input" value="<?php echo !empty($data['ress']['key_words'])?$data['ress']['key_words']:''; ?>">
        </div>
      </div>
      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">摘 要<span class="reqcolor">*</span></label>
        <div class="layui-input-block">
          <textarea placeholder="" class="layui-textarea" name="main" id="main" lay-verify="required"><?php echo !empty($data['ress']['main'])?$data['ress']['main']:''; ?></textarea>
        </div>
      </div>
      <div class="layui-form-item" style="margin-top: 10px;" id="add">
        <label class="layui-form-label" style="margin-top:30px;">主图<br/>(250*80)<span class="reqcolor">*</span></label>
        <div class="layui-upload layui-input-block">
             <button type="button" class="layui-btn" id="images">上传图片</button>
              <div class="layui-input-inline input_img_inline">
                  <?php  if(isset($data['ress']['id'])){  ?>
                  <a href="<?php echo $data['ress']['main_img']; ?>" target="_blank"><img src="<?php echo $data['ress']['main_img']; ?>" class="icon_view" title="点击查看完整图片"/></a>
                  <?php  } ?>
              </div>
              <div class="layui-upload-list">
                  <img class="layui-upload-img" style="border:none;" id="preview">
                  <p id="imgText1"></p>
              </div>
        </div>
      </div>
      <input type="hidden" name="main_img" id="imgurl" lay-verify="imgurl" value="<?php echo !empty($data['ress']['main_img'])?$data['ress']['main_img']:''; ?>">
      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">主要内容<span class="reqcolor">*</span></label>
        <div class="layui-input-block">
          <textarea  name="contents"  id="contents" lay-verify="required"><?php echo !empty($data['ress']['contents'])?$data['ress']['contents']:''; ?></textarea>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">文章分类<span style="color:red;">*</span></label>
        <div class="layui-input-block">
          <select name="cate_id" lay-verify="required" lay-search="">
            <?php  if(isset($data['catelist'])){  foreach($data['catelist'] as $v): ?>
              <!--<?php if($v['id'] == $data['ress']['cate_id']): ?>
               <option value="<?php echo $v['id']; ?>" selected><?php echo $v['name']; ?></option>
              <?php else: ?>
              <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
              <?php endif; ?> -->
              <option value="<?php echo $v['id']; ?>" <?php echo $v['id']==$data['ress']['cate_id']?'selected':'';; ?>><?php echo $v['name']; ?></option>
              <?php endforeach;  } ?>
          </select>
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">作者</label>
          <div class="layui-input-inline">
            <input type="text" name="author" lay-verify="author" autocomplete="off" class="layui-input" value="<?php echo !empty($data['ress']['author'])?$data['ress']['author']:''; ?>">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">新闻来源</label>
          <div class="layui-input-inline">
            <input type="text" name="from" lay-verify="from" autocomplete="off" class="layui-input" value="<?php echo !empty($data['ress']['from'])?$data['ress']['from']:''; ?>">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">浏览量</label>
          <div class="layui-input-inline">
            <input type="number" name="num"  autocomplete="off" class="layui-input" value="<?php echo !empty($data['ress']['num'])?$data['ress']['num']:''; ?>">
          </div>
        </div>
        
      </div>
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">新闻状态</label>
          <div class="layui-input-inline">
            <input name="status" value="1" title="上线"  type="radio" <?php if($data['ress']['status']=='1'): ?>checked<?php endif; ?>>
            <input name="status" value="-1" title="下线" type="radio" <?php if($data['ress']['status']==-1): ?>checked<?php endif; ?>>
          </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">最新</label>
            <div class="layui-input-block">
              <input type="checkbox" <?php if($data['ress']['is_new']==1): ?> checked="" <?php endif; ?> name="is_new" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">最热</label>
            <div class="layui-input-block">
              <input type="checkbox" <?php if($data['ress']['is_hot']==1): ?> checked="" <?php endif; ?>  name="is_hot" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">最好</label>
            <div class="layui-input-block">
              <input type="checkbox" <?php if($data['ress']['is_best']==1): ?> checked="" <?php endif; ?> name="is_best" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
            </div>
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">外链接<span style="color:red;"></span></label>
        <div class="layui-input-block">
         <input type="text" name="link" lay-verify="link"  class="layui-input" value="<?php echo !empty($data['ress']['link'])?$data['ress']['link']:''; ?>">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">排序<span style="color:red;"></span></label>
        <div class="layui-input-block">
         <input type="number" name="ord"  class="layui-input" value="<?php echo !empty($data['ress']['ord'])?$data['ress']['ord']:''; ?>">
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
  }).use(['index', 'form', 'laydate', 'upload'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,element = layui.element
    ,layer = layui.layer
    ,laydate = layui.laydate
    ,form = layui.form
    , upload = layui.upload;
    /* 自定义验证规则 */
    form.verify({
      title: function(value){
      if(value.length > 252){
        return '标题应小于252个字符！';
        }
      }
      ,key_words: function(value){
      if(value.length > 252){
        return '关键字应小于252个字符！';
        }
      }
      ,from: function(value){
      if(value.length > 252){
        return '长度应小于252个字符！';
        }
      }
      ,link: function(value){
      if(value.length > 252){
        return '长度应小于252个字符！';
        }
      }
      ,imgurl: function(value){
          var imgurl = $('#imgurl').val();
          if(imgurl == ''){
               return '请上传主图';
          } 
      }
    });
    /* 监听提交 */
    form.on('submit(addaction)', function(data){
      var url = "<?php echo url('News/add'); ?>";
      var data =$("#addform").serializeArray();
      jqueryAjax('POST',url,data,successLayui);
      return false;
    });
    //普通图片上传
        var uploadInst = upload.render({
            elem: '#images'
            , method: 'POST'
            , url: "<?php echo Url('Upload/layuiImgUpload'); ?>"
            , field: 'img'
            , data: {
                dir: 'news' +
                ''
            }
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#preview').attr('src', result); //图片链接（base64）
                    console.log(result);
                });
            }
            , done: function (res) {
                //如果上传失败
                if (res.code > 0) {
                    return layer.msg('上传失败');
                } else {
                    var path = res.data;
                    $('#imgurl').val(path);
                    data['imgurl'] = path;
                }
                //上传成功
            }
            , error: function () {
                $('#preview').attr('src', '')
                layer.alert('主图大小不能超过300k，请重新选择!');
                //演示失败状态，并实现重传
                // var imgText1 = $('#imgText1');
                // imgText1.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                // imgText1.find('.demo-reload').on('click', function () {
                //     uploadInst.upload();
                // });
            }
        });
  });

</script>