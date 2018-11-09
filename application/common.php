<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Db;
use think\Request;
use think\Cache;
    /**
     *无限分类树
     * @author dxf
     * @param array  需有对应的id和pid
     * @return  array
    */

    function generateTree($list){
    	foreach ($list as $k => $v){ 
    	            $arr[$v['id']]=$v;
    	 }
    	foreach($arr as $item){
    	        $arr[$item['pid']]['son'][$item['id']] = &$arr[$item['id']];
    	}
    	return isset($arr[0]['son']) ? $arr[0]['son'] : array();
    }

    /**
     * 检查邮箱是否合法 
     * @author dxf
     * @param STRING $email 要检查的邮箱名
     * @return  TRUE or FALSE
     */
    function is_email($email) {
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match($pattern, $email)){
        	return true;
        }else{
        	return false;
        }
    }
    /**
    * 验证手机号是否正确
    * @author dxf
    * @param INT $mobile
    * @return  TRUE or FALSE
    移动：134、135、136、137、138、139、150、151、152、157、158、159、182、183、184、187、188、178(4G)、147(上网卡)；
    联通：130、131、132、155、156、185、186、176(4G)、145(上网卡)；
    电信：133、153、180、181、189 、177(4G)；
    卫星通信：1349
    虚拟运营商：170
    */
    function is_Mobile($mobile) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,5,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }
   function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){  
        if(is_array($arrays)){  
            foreach ($arrays as $array){  
                if(is_array($array)){  
                    $key_arrays[] = $array[$sort_key];  
                }else{  
                    return false;  
                }  
            }  
        }else{  
            return false;  
        } 
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);  
        return $arrays;  
    } 
    //权限按钮隐藏检查
    function ruleCheck($value){
        $rule_ress=Db::name('auth_rule')->where('name',$value)->find();
        if($rule_ress){
                if($rule_ress['status']==0){
                    return 'rulecheck';
                }
                $ausess=session('ausess');
                $exit=in_array($rule_ress['id'], explode(',',$ausess['rules']));
                if(empty($exit)){
                    return 'rulecheck';
                }
            }
    }

    function tmhash($str){ 
        $hash = 0;  
        $s = md5($str);  
        $seed = 5;  
        $len  = 32;  
        for ($i = 0; $i < $len; $i++) {   
            $hash = ($hash << $seed) + $hash + ord($s{$i});  
            //echo $hash."<br/>".ord($s{$i})."<br/>";
        }   
        return $hash & 0x7FFFFFFF;  
    }
    
    //获取用户mongo的collection
    function getMongoDbCollection($uqcode){
        $surfix = fmod($uqcode,100);
        if(!$surfix){
            return 'riskdata';
        }   
        return 'riskdata_' . $surfix;
    }
    /**
     * 邮件发送
     * @param $to    接收人
     * @param string $subject   邮件标题
     * @param string $content   邮件内容(html模板渲染后的内容)
     * @throws Exception
     * @throws phpmailerException
     */ 
    function send_email($to,$subject='',$content=''){
        vendor('phpmailer.PHPMailerAutoload'); ////require_once vendor/phpmailer/PHPMailerAutoload.php';
        //判断openssl是否开启
        $openssl_funcs = get_extension_funcs('openssl');
        if(!$openssl_funcs){
            return array('status'=>-1 , 'msg'=>'请先开启openssl扩展');
        }
        $mail = new PHPMailer;
        //$config = config('smtp');
        $config=Cache::get('config');
        $mail->CharSet  = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //调试输出格式
        //$mail->Debugoutput = 'html';
        //smtp服务器
        $mail->Host = $config['14'];
        //端口 - likely to be 25, 465 or 587
        $mail->Port = $config['15'];

        if($mail->Port == 465) $mail->SMTPSecure = 'ssl';// 使用安全协议
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //用户名
        $mail->Username = $config['16'];
        //密码
        $mail->Password = $config['17'];
        //Set who the message is to be sent from
        $mail->setFrom($config['16']);
        //回复地址
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //接收邮件方
        if(is_array($to)){
            foreach ($to as $v){
                $mail->addAddress($v);
            }
        }else{
            $mail->addAddress($to);
        }

        $mail->isHTML(true);// send as HTML
        //标题
        $mail->Subject = $subject;
        //HTML内容转换
        $mail->msgHTML($content);
        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body';
        //添加附件
        //$mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$mail->send()) {
           return array('status'=>-1 , 'msg'=>'发送失败: '.$mail->ErrorInfo);
        } else {
            return array('status'=>1 , 'msg'=>'发送成功');
        }
    }
    /**
     *日志记录，按照"Ymd.log"生成当天日志文件
     * 日志路径为：入口文件所在目录/logs/$type/当天日期.log.php，/logs/error/20120105.log.php
     * @param string $type 日志类型，对应logs目录下的子文件夹名
     * @param string $content 日志内容
     * @return bool true/false 写入成功则返回true
     */
     function writelog($type="",$content=""){
        if(!$content || !$type){
            return FALSE;
        }
        $dir=getcwd().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.$type;
        print_r($dir);
        if(!is_dir($dir)){ 
            if(!mkdir($dir)){
                return false;
            }
        }
        $filename=$dir.DIRECTORY_SEPARATOR.date("Ymd",time()).'.log.php';
        if(is_file($filename)){
            $logs=include $filename;
        }
        $logs[]=array("time"=>date("Y-m-d H:i:s"),"ip"=>Request::instance()->ip(),"content"=>$content);
        $str="<?php \r\n return ".var_export($logs, true).";";
        if(!$fp=@fopen($filename,"wb")){
            return false;
        }           
        if(!fwrite($fp, $str))return false;
        fclose($fp);
        return true;
    }
        /**
     * 发送HTTP请求
     * @param string $url 请求地址
     * @param string $method 请求方式 GET/POST
     * @param string $refererUrl 请求来源地址
     * @param array $data 发送数据
     * @param string $contentType
     * @param string $timeout
     * @param string $proxy
     * @return boolean
     */
    function send_request($url, $data, $refererUrl = '', $method = 'GET', $contentType = 'application/json', $timeout= 30, $proxy = false) {
        $ch = null;
        if('POST' === strtoupper($method)) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HEADER,0 );
            curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            if ($refererUrl) {
                curl_setopt($ch, CURLOPT_REFERER, $refererUrl);
            }
            if($contentType) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:'.$contentType));
            }
            if(is_string($data)){
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            }
        } else if('GET' === strtoupper($method)) {
            if(is_string($data)) {
                $real_url = $url. (strpos($url, '?') === false ? '?' : ''). $data;
            } else {
                $real_url = $url. (strpos($url, '?') === false ? '?' : ''). http_build_query($data);
            }

            $ch = curl_init($real_url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:'.$contentType));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            if ($refererUrl) {
                curl_setopt($ch, CURLOPT_REFERER, $refererUrl);
            }
        } else {
            $args = func_get_args();
            return false;
        }
        if($proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
        }
        $ret = curl_exec($ch);
        $info = curl_getinfo($ch);
        $contents = array(
                'httpInfo' => array(
                        'send' => $data,
                        'url' => $url,
                        'ret' => $ret,
                        'http' => $info,
                )
        );  
        curl_close($ch);
        return $ret;
    }
    /**
     * 获取缓存或者更新缓存
     * @param string $config_key 缓存文件名称
     * @param array $data 缓存数据  array('k1'=>'v1','k2'=>'v3')
     * @return array or string or bool
     */
    function tpCache($type=0){
        if($type==1){
            $ress=Db::name('config')->select();
            foreach ($ress as $k => $v) {
            $list[$v['id']]=$v['value'];
            }
            Cache::set('config',$list,86400);
            $rre=Cache::get('config');
            return $rre;
        }else{
            $rre=Cache::get('config');
            if($rre){
                return $rre;
            }else{
                $ress=Db::name('config')->select();
                foreach ($ress as $k => $v) {
                    $list[$v['id']]=$v['value'];
                }
                Cache::set('config',$list,86400);
                $rre=Cache::get('config');
                return $rre;
            }  
        }
    }
    function getSystemInfo()
    {
        $systemInfo = array();
         // 系统
        $systemInfo['os'] = PHP_OS;
         // PHP版本
        $systemInfo['phpversion'] = PHP_VERSION;
         // ZEND版本
        $systemInfo['zendversion'] = zend_version();
         // 最大上传文件大小
        $systemInfo['maxuploadfile'] = ini_get('upload_max_filesize');
         // 脚本运行占用最大内存
        $systemInfo['memorylimit'] = get_cfg_var("memory_limit") ? get_cfg_var("memory_limit") : '-';
         //域名
        $systemInfo['host_name']=$_SERVER["HTTP_HOST"];
         //服务器ip
        $systemInfo['ip']=GetHostByName($_SERVER['SERVER_NAME']);
        
         
         //获取服务器语言：   
        $systemInfo['lang']= $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        //获取服务器Web端口：  
        $systemInfo['port']= $_SERVER['SERVER_PORT'];
        $systemInfo['time']= date("Y-m-d H:i:s");
         return $systemInfo;
    }
    function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)  
    {  
      if(function_exists("mb_substr")){  
              if($suffix)  
              return mb_substr($str, $start, $length, $charset)."...";  
              else
                   return mb_substr($str, $start, $length, $charset);  
         }  
         elseif(function_exists('iconv_substr')) {  
             if($suffix)  
                  return iconv_substr($str,$start,$length,$charset)."...";  
             else
                  return iconv_substr($str,$start,$length,$charset);  
         }  
         $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef]
                  [x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";  
         $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";  
         $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";  
         $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";  
         preg_match_all($re[$charset], $str, $match);  
         $slice = join("",array_slice($match[0], $start, $length));  
         if($suffix) return $slice."…";  
         return $slice;
    }
     /**
 * 判断当前访问的用户是  PC端  还是 手机端  返回true 为手机端  false 为PC 端
 * @return boolean
 */
/**
　　* 是否移动端访问访问
　　*
　　* @return bool
　　*/
function isMobile()
{
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
    return true;
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
    {
    // 找不到为flase,否则为true
    return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile');
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            return true;
    }
        // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT']))
    {
    // 如果只支持wml并且不支持html那一定是移动设备
    // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
        {
            return true;
        }
    }
            return false;
 }
/**
 * [ajaxReturn json数据返格式]
 * @param  [type] $code [错误代码]
 * @param  [type] $msg  [描述]
 * @param  array  $data [数据包]
 * @return [type]       [json]
 */
function ajaxReturn($code,$msg,$data = []){
    $rs = array('code'=>$code,'msg'=>$msg,'data'=>$data);
    echo json_encode($rs);
    exit();
}

/**
 * [layuiReturn json数据返格式]
 * @param  [type] $code [错误代码]
 * @param  [type] $msg  [描述]
 * @param  array  $data [数据包]
 * @return [type]       [json]
 */
function layuiReturn($code,$msg,$count,$data = []){
    $rs = array('code'=>$code,'msg'=>$msg, 'count' => $count, 'data'=>$data);
    echo json_encode($rs);
}

/**
 * [mobileValidate 手机号正则验证]
 * @param  [type] $mobile [手机号]
 * @return [type]         [bool]
 */
function mobileValidate($mobile){
    $pattern = '/^1[345789]{1}\d{9}$/';
    if(preg_match($pattern,$mobile)){
        return true;
    }else{
        return false;
    }
}

/**
 * [mobileValidate 邮箱正则验证]
 * @param  [type] $mobile [邮箱]
 * @return [type]         [bool]
 */
function emailValidate($email){
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
    if(preg_match($pattern, trim($email))){
        return true;
    }else{
        return false;
    }
}

/**
 * [getRandomStr 随机字符串获取]
 * @param  [type] $type   [内容类型]
 * @param  [type] $length [内容长度]
 * @return [type]         [字符串]
 */
function getRandomStr($type,$length){
    switch ($type) {
        case '1':
            $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            break;
        case '2':
            $str='0123456789';
            break;
        case '3':
            $str='abcdefghijklmnopqrstuvwxyz';
            break;
        case '4':
            $str='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case '5':
            $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        default:
            # code...
            break;
    }
    $len = strlen($str) - 1;
    $randstr = '';
    for($i=0; $i<$length; $i++){
        $num = mt_rand( 0, $len );
        $randstr .= $str[$num];
    }
    return $randstr;
}


/**
 * [httpGet curl get方法]
 * @param  [type] $url [访问链接]
 * @return [type]      [response]
 */
function httpGet($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 500);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $rs = curl_exec($ch);
    curl_close($ch);
    return $rs;
}
/**
 * [httpGet curl post方法]
 * @param  [type] $url [访问链接]
 * @param  [type] $data [post参数]
 * @return [type]      [response]
 */
function httpPost($url,$data){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $rs = curl_exec($ch);
    curl_close($ch);
    return $rs;
}


/**
 * [get_real_ip 获取当前客户端的访问ip]
 * @return [type] [ipv4地址]
 */
function get_real_ip(){
    $ip=false;
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}


/**
 * [password_encrypt 密码加密]
 * @return [type] [string]
 */
function password_encrypt( $password, $salt ){
    return sha1(sha1($password).$salt);
}

/**
 * [order_no_create 创建订单号]
 * @return [type]         [string]
 */
function order_no_create(){
    $d = date('ymd');
    $dateStr = date('Y-m-d', time());
    $timestamp0 = strtotime($dateStr);
    $s = time() - $timestamp0;
    $s = sprintf("%05d", $s);
    $m = microtime();
    $m = substr($m, 2,4);
    $order_str = $d . $s . $m;
    $luhn = luhn_create($order_str);
    return $d . $s . $luhn . $m;
}

/**
 * [luhn_check luhn校验码验证]
 * @param  [type] $str  [原始字符串]
 * @param  [type] $code [校验码]
 * @return [type]       [bool]
 */
function luhn_check($str,$code){
    $luhn = luhn_create($str);
    if($luhn == $code){
        return true;
    }else{
        return false;
    }
}

/**
 * [luhn_create luhn校验码生成]
 * @param  [type] $str [原始字符串]
 * @return [type]      [number]
 */
function luhn_create($str){
    $newArr = array();
    //前15或18位倒序存进数组
    for ($i=(strlen($str)-1); $i>=0 ; $i--) {
        $newArr[] = substr($str, $i,1);
    }

    $arrJiShu = array();    //奇数位*2的积 <9
    $arrJiShu2 = array();   //奇数位*2的积 >9
    $arrOuShu = array();    //偶数位数组
    for ($j=0; $j<count($newArr); $j++) {
        if( ($j+1)%2 == 1 ){  //奇数位
            if( $newArr[$j]*2 < 9){
                $arrJiShu[] = $newArr[$j] * 2;
            }else{
                $arrJiShu2[] = $newArr[$j] * 2;
            }
        }else{
            $arrOuShu[] = $newArr[$j];
        }
    }

    $jishu_child1 = array();    //奇数位*2 >9 的分割之后的数组个位数
    $jishu_child2 = array();    //奇数位*2 >9 的分割之后的数组十位数
    for ($h=0; $h<count($arrJiShu2); $h++) {
        $jishu_child1[] = $arrJiShu2[$h]%10;
        $jishu_child2[] = $arrJiShu2[$h]/10;
    }
    $sumJiShu=0;        //奇数位*2 < 9 的数组之和
    $sumOuShu=0;        //偶数位数组之和
    $sumJiShuChild1=0;  //奇数位*2 >9 的分割之后的数组个位数之和
    $sumJiShuChild2=0;  //奇数位*2 >9 的分割之后的数组十位数之和
    $sumTotal=0;
    for ($m=0; $m<count($arrJiShu); $m++) {
        $sumJiShu += $arrJiShu[$m];
    }

    for ($n=0; $n<count($arrOuShu); $n++) {
        $sumOuShu += $arrOuShu[$n];
    }

    for ($p=0; $p<count($jishu_child1); $p++) {
        $sumJiShuChild1 += $jishu_child1[$p];
        $sumJiShuChild2 += $jishu_child2[$p];
    }

    //计算总和
    $sumTotal = $sumJiShu + $sumOuShu + $sumJiShuChild1 + $sumJiShuChild2;
    //计算luhn值
    $k = ($sumTotal%10==0)?10:($sumTotal%10);
    $luhn = 10 - $k;
    return $luhn;
}
//时间格式转换
function change_date($time,$type){
    if($time){
        switch ($type) {
            case 1:
                return date('Y-m-d H:i:s',$time);
                break;
            case 2:
                return date('Y-m-d H:i',$time);
                break;
            case 3:
                return date('Y年m月d日 H时i分s秒',$time);
                break;
            case 4:
                return date('Y年m月d日 H时i分',$time);
                break;
            default:
                # code...
                break;
        }
    }else{
        return '';
    }
    
    
    
}
