<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/Users/modou/Works/web/newlc/public/../application/backend/view/more/express.html";i:1534136137;s:82:"/Users/modou/Works/web/newlc/public/../application/backend/view/public/header.html";i:1534318478;}*/ ?>
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


    <style class="firebugResetStyles" type="text/css" charset="utf-8">
        /* See license.txt for terms of usage */
        /** reset styling **/
        .firebugResetStyles {
            z-index: 2147483646 !important;
            top: 0 !important;
            left: 0 !important;
            display: block !important;
            border: 0 none !important;
            margin: 0 !important;
            padding: 0 !important;
            outline: 0 !important;
            min-width: 0 !important;
            max-width: none !important;
            min-height: 0 !important;
            max-height: none !important;
            position: fixed !important;
            transform: rotate(0deg) !important;
            transform-origin: 50% 50% !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            background: transparent none !important;
            pointer-events: none !important;
            white-space: normal !important;
        }
 
        style.firebugResetStyles {
            display: none !important;
        }
 
        .firebugBlockBackgroundColor {
            background-color: transparent !important;
        }
 
        .firebugResetStyles:before, .firebugResetStyles:after {
            content: "" !important;
        }
        /**actual styling to be modified by firebug theme**/
        .firebugCanvas {
            display: none !important;
        }
 
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
        .firebugLayoutBox {
            width: auto !important;
            position: static !important;
        }
 
        .firebugLayoutBoxOffset {
            opacity: 0.8 !important;
            position: fixed !important;
        }
 
        .firebugLayoutLine {
            opacity: 0.4 !important;
            background-color: #000000 !important;
        }
 
        .firebugLayoutLineLeft, .firebugLayoutLineRight {
            width: 1px !important;
            height: 100% !important;
        }
 
        .firebugLayoutLineTop, .firebugLayoutLineBottom {
            width: 100% !important;
            height: 1px !important;
        }
 
        .firebugLayoutLineTop {
            margin-top: -1px !important;
            border-top: 1px solid #999999 !important;
        }
 
        .firebugLayoutLineRight {
            border-right: 1px solid #999999 !important;
        }
 
        .firebugLayoutLineBottom {
            border-bottom: 1px solid #999999 !important;
        }
 
        .firebugLayoutLineLeft {
            margin-left: -1px !important;
            border-left: 1px solid #999999 !important;
        }
 
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
        .firebugLayoutBoxParent {
            border-top: 0 none !important;
            border-right: 1px dashed #E00 !important;
            border-bottom: 1px dashed #E00 !important;
            border-left: 0 none !important;
            position: fixed !important;
            width: auto !important;
        }
 
        .firebugRuler {
            position: absolute !important;
        }
 
       
 
        .overflowRulerX > .firebugRulerV {
            left: 0 !important;
        }
 
        .overflowRulerY > .firebugRulerH {
            top: 0 !important;
        }
 
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
        .fbProxyElement {
            position: fixed !important;
            pointer-events: auto !important;
        }
    </style>
</head>
<body>
    <style>
        /*#mohe-kuaidi_new ::-webkit-scrollbar {
            width: 10px;
        }
 
        #mohe-kuaidi_new ::-webkit-scrollbar-track-piece {
            background-color: #eee;
        }
 
        #mohe-kuaidi_new ::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border: 1px solid #ccc;
        }*/
 
        #mohe-kuaidi_new .mh-wrap {
            margin: 2px 0;
        }
 
            #mohe-kuaidi_new .mh-wrap a {
                text-decoration: none;
            }
 
                #mohe-kuaidi_new .mh-wrap a:hover {
                    text-decoration: underline;
                }
 
        #mohe-kuaidi_new .mh-form-wrap {
            padding: 5px 15px;
        }
 
            #mohe-kuaidi_new .mh-form-wrap p {
                margin: 10px 0;
            }
 
                #mohe-kuaidi_new .mh-form-wrap p label {
                    margin-right: 10px;
                    vertical-align: middle;
                    padding: 6px 0;
                }
 
                #mohe-kuaidi_new .mh-form-wrap p input, #mohe-kuaidi_new .mh-form-wrap p select {
                    width: 186px;
                    line-height: normal;
                    border: 1px solid #ccc;
                    padding: 6px;
                    box-sizing: border-box;
                    margin: 0;
                }
 
                #mohe-kuaidi_new .mh-form-wrap p button {
                    width: 80px;
                    height: 28px;
                    border: 1px solid #ccc;
                    margin-left: 10px;
                    text-align: center;
                    color: #333;
                    font-family: "Microsoft Yahei";
                    font-size: 14px;
                    cursor: pointer;
                    background: #f7f7f7;
                    background: -moz-linear-gradient(top,#f7f7f7,#ececec);
                    background: -webkit-gradient(linear,left top,left bottom,color-stop(#f7f7f7),color-stop(#ececec));
                    background: -ms-linear-gradient(top,#f7f7f7,#ececec);
                    background: linear-gradient(to bottom,#f7f7f7,#ececec);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f7f7',endColorstr='#ececec',GradientType=0);
                }
 
                    #mohe-kuaidi_new .mh-form-wrap p button:hover {
                        background: -moz-linear-gradient(top,#ececec,#f7f7f7);
                        background: -webkit-gradient(linear,left top,left bottom,color-stop(#ececec),color-stop(#f7f7f7));
                        background: -ms-linear-gradient(top,#ececec,#f7f7f7);
                        background: linear-gradient(to bottom,#ececec,#f7f7f7);
                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ececec',endColorstr='#f7f7f7',GradientType=0);
                    }
 
                    #mohe-kuaidi_new .mh-form-wrap p button:active {
                        background: -moz-linear-gradient(top,#f3f3f3,#fff);
                        background: -webkit-gradient(linear,left top,left bottom,color-stop(#f3f3f3),color-stop(#fff));
                        background: -ms-linear-gradient(top,#f3f3f3,#fff);
                        background: linear-gradient(to bottom,#f3f3f3,#fff);
                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3f3f3',endColorstr='#ffffff',GradientType=0);
                    }
 
            #mohe-kuaidi_new .mh-form-wrap form.mh-loading p button {
                position: relative;
                color: transparent;
                pointer-events: none;
            }
 
                #mohe-kuaidi_new .mh-form-wrap form.mh-loading p button::after {
                    background: url(http://p1.qhimg.com/d/inn/1b1cc057/loading_s.gif) no-repeat center;
                    content: '';
                    display: inline-block;
                    width: 4em;
                    height: 20px;
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    margin-left: -2em;
                    margin-top: -10px;
                }
 
            #mohe-kuaidi_new .mh-form-wrap .mh-error {
                display: none;
                color: #c00;
            }
 
                #mohe-kuaidi_new .mh-form-wrap .mh-error label {
                    visibility: hidden;
                }
 
        #mohe-kuaidi_new .mh-list-wrap {
            max-height: 0;
            _height: 0;
            --overflow: hidden;
        }
 
            #mohe-kuaidi_new .mh-list-wrap.mh-unfold {
                max-height: 281px;
                _height: 281px;
            }
 
           
 
                #mohe-kuaidi_new .mh-list-wrap .mh-list ul {
                    margin-top: 50px;
                    max-height: 255px;
                    //height: 255px;
                    padding-left: 150px;
                   // padding-right: 20px;
                    --overflow: auto;
                    height: 626px;
                }
 
                #mohe-kuaidi_new .mh-list-wrap .mh-list li {
                    position: relative;
                    border-bottom: 1px solid #f5f5f5;
                    margin-bottom: 14px;
                    padding-bottom: 14px;
                    color: #666;
                }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li.first {
                        color: #3eaf0e;
                    }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li p {
                        line-height: 20px;
                    }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li .before {
                        position: absolute;
                        left: -13px;
                        top: 2.2em;
                        height: 82%;
                        width: 0;
                        border-left: 2px solid #ddd;
                    }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li .after {
                        position: absolute;
                        left: -16px;
                        top: 1.2em;
                        width: 8px;
                        height: 8px;
                        background: #ddd;
                        border-radius: 6px;
                    }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li.first .after {
                        background: #3eaf0e;
                    }
 
        #mohe-kuaidi_new .mh-kd-wrap {
            position: relative;
            border-top: 1px solid #eee;
            padding: 15px;
            padding-bottom: 25px;
            background: #fafafa;
        }
 
            #mohe-kuaidi_new .mh-kd-wrap li {
                display: none;
            }
 
                #mohe-kuaidi_new .mh-kd-wrap li.mh-selected {
                    display: block;
                }
 
            #mohe-kuaidi_new .mh-kd-wrap .mh-img-wrap {
                float: left;
                width: 50px;
                height: 50px;
                margin-right: 10px;
                overflow: hidden;
            }
 
                #mohe-kuaidi_new .mh-kd-wrap .mh-img-wrap img {
                    width: 50px;
                }
 
            #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap {
                font-size: 13px;
                margin-left: 60px;
            }
 
                #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap p {
                    margin-bottom: 8px;
                }
 
                #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-name {
                    font-family: "Microsoft Yahei";
                    font-size: 14px;
                }
 
                #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a {
                    text-decoration: none;
                    margin-right: 10px;
                    padding: 2px 10px;
                    border: 1px solid #ccc;
                    color: #333;
                }
 
                    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a:hover {
                        background: white;
                    }
 
                    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a:active {
                        background: -moz-linear-gradient(top,#f3f3f3,#fff);
                        background: -webkit-gradient(linear,left top,left bottom,color-stop(#f3f3f3),color-stop(#fff));
                        background: -ms-linear-gradient(top,#f3f3f3,#fff);
                        background: linear-gradient(to bottom,#f3f3f3,#fff);
                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3f3f3',endColorstr='#ffffff',GradientType=0);
                    }
 
        #mohe-kuaidi_new .mh-slogan {
            position: absolute;
            right: 20px;
            bottom: 0;
            cursor: pointer;
        }
 
        #mohe-kuaidi_new .mh-slogan-hover {
            color: #3eaf0e;
        }
 
        #mohe-kuaidi_new .mh-slogan span {
            vertical-align: middle;
        }
 
        #mohe-kuaidi_new .mh-qrcode-wrap {
            position: absolute;
            right: 0;
            bottom: -1px;
            width: 96px;
            margin-right: -110px;
            border: 1px solid #d6d6d6;
            color: #999;
            padding: 6px;
            box-shadow: 0 1px 1px #efefef;
        }
 
        #mohe-kuaidi_new .mh-icon {
            background: url(http://p9.qhimg.com/d/inn/f2e20611/kuaidi_new.png) no-repeat 0 0;
        }
 
        #mohe-kuaidi_new .mh-icon-qr {
            background-position: 0 -17px;
            display: inline-block;
            *zoom: 1;
            width: 13px;
            height: 13px;
            vertical-align: middle;
            margin-left: 10px;
        }
 
        #mohe-kuaidi_new .mh-slogan-hover .mh-icon-qr {
            background-position: 0 0;
        }
 
        #mohe-kuaidi_new .mh-icon-t {
            position: absolute;
            left: -9px;
            bottom: 14px;
            width: 10px;
            height: 16px;
            background-position: 0 -34px;
            background-color: white;
        }
 
        #mohe-kuaidi_new .mh-icon-new {
            position: absolute;
            left: -20px;
            top: 1.5em;
            width: 41px;
            height: 18px;
            margin-left: -41px;
            margin-top: -9px;
            background-position: 0 -58px;
        }
 
        #mohe-kuaidi_new .mh-wrap .mb-search {
            text-decoration: underline;
            margin-left: 20px;
        }
 
            #mohe-kuaidi_new .mh-wrap .mb-search .mh-new {
                display: inline-block;
                width: 21px;
                height: 9px;
                margin: -1px 0 0 3px;
                background: url(http://p0.qhimg.com/t01a3bd62f6db66463c.png) no-repeat;
            }
 
        #mohe-kuaidi_new .mh-identcode {
            border-top: 1px solid #f5f5f5;
            padding: 10px 15px;
            display: none;
        }
 
            #mohe-kuaidi_new .mh-identcode .mh-img-wrap {
                float: left;
                width: 54px;
                height: 54px;
                padding: 6px;
                border: 1px solid #ccc;
                overflow: hidden;
            }
 
                #mohe-kuaidi_new .mh-identcode .mh-img-wrap img {
                    width: 54px;
                }
 
            #mohe-kuaidi_new .mh-identcode .mh-img-tip {
                margin-left: 78px;
            }
 
            #mohe-kuaidi_new .mh-identcode .mh-tip-txt {
                font-size: 13px;
                line-height: 38px;
                color: #666;
            }
 
            #mohe-kuaidi_new .mh-identcode .mh-btn-install {
                text-decoration: none;
                margin-right: 10px;
                padding: 2px 10px;
                border: 1px solid #ccc;
                color: #333;
            }
 
                #mohe-kuaidi_new .mh-identcode .mh-btn-install:hover {
                    text-decoration: none;
                }
    </style>
    <div data-mohe-type="kuaidi_new" class="g-mohe " id="mohe-kuaidi_new">
        <div style="width:400px;margin:30px auto;font-size:16px;">  
             
            <form action="<?php echo url('more/express'); ?>" method="get" class="layui-form">
            <div class="layui-input-inline" style="width:200px;" >
                
                    <input type="text" class="layui-input"  id="" name="sn" value="<?php echo !empty($param['sn'])?$param['sn']:'220127092292'; ?>" placeholder="中通快递单号">
                </div>
                <button class="layui-btn">查 询</button></div>
            </form>
        <div  id="mohe-kuaidi_new_nucom">
            <div class="mohe-wrap mh-wrap">
                <div class="mh-cont mh-list-wrap mh-unfold">
                    <div class="mh-list">
                        <ul>
                             <?php  if(isset($ress['Traces'])){  $dd=array_reverse($ress['Traces']); foreach($dd as $k => $v):  if($k==0){  ?>
                                <li class="first">
                                     <p><?php echo $v['AcceptTime']; ?></p>
                                <p><?php echo $v['AcceptStation']; ?></p>
                                    <span class="before"></span><span class="after"></span><i class="mh-icon mh-icon-new"></i>
                                </li>
                              <?php }else{  ?>
                            <li >
                                <p><?php echo $v['AcceptTime']; ?></p>
                                <p><?php echo $v['AcceptStation']; ?></p>
                                <span class="before"></span><span class="after"></span>
                            </li>
                            <?php } endforeach;  } ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>