<?php


class Kuaidiniao 
{   


    public $EBusinessID;
    public $AppKey;
    public $ReqURL='http://api.kdniao.cc/Ebusiness/EbusinessOrderHandle.aspx';

    public function __construct($EBusinessID,$AppKey)
    {
        $this->EBusinessID=$EBusinessID;
        $this->AppKey=$AppKey;

    }

    /**
     * Json方式 查询订单物流轨迹
     */
    public  function getOrderTracesByJson($ShipperCode,$LogisticCode){

        $requestData= "{'OrderCode':'','ShipperCode':'$ShipperCode','LogisticCode':'$LogisticCode'}";
        $datas = array(
            'EBusinessID' => $this->EBusinessID,
            'RequestType' => '1002',
            'RequestData' => urlencode($requestData) ,
            'DataType' => '2',
        );
        $datas['DataSign'] = $this->encrypt($requestData, $this->AppKey);
        $result=$this->sendPost($this->ReqURL, $datas);   
        
        //根据公司业务处理返回的信息......
        
        return $result;
    }
     
    /**
     *  post提交数据 
     * @param  string $url 请求Url
     * @param  array $datas 提交的数据 
     * @return url响应返回的html
     */
    public  function sendPost($url, $datas) {
        $temps = array();   
        foreach ($datas as $key => $value) {
            $temps[] = sprintf('%s=%s', $key, $value);      
        }   
        $post_data = implode('&', $temps);
        $url_info = parse_url($url);
        if(empty($url_info['port']))
        {
            $url_info['port']=80;   
        }
        $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
        $httpheader.= "Host:" . $url_info['host'] . "\r\n";
        $httpheader.= "Content-Type:application/x-www-form-urlencoded\r\n";
        $httpheader.= "Content-Length:" . strlen($post_data) . "\r\n";
        $httpheader.= "Connection:close\r\n\r\n";
        $httpheader.= $post_data;
        $fd = fsockopen($url_info['host'], $url_info['port']);
        fwrite($fd, $httpheader);
        $gets = "";
        $headerFlag = true;
        while (!feof($fd)) {
            if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
                break;
            }
        }
        while (!feof($fd)) {
            $gets.= fread($fd, 128);
        }
        fclose($fd);  
        
        return $gets;
    }


    /**
     * 电商Sign签名生成
     * @param data 内容   
     * @param appkey Appkey
     * @return DataSign签名
     */
    public  function encrypt($data, $appkey) {
        return urlencode(base64_encode(md5($data.$appkey)));
    }
}



?>