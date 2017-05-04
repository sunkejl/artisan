<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/5
 * Time: 14:18
 */


$arr = array(
    'BODY' => array(
        'TRANS_SUM' => array(
            'BUSINESS_CODE' => '10600',
            'MERCHANT_ID' => '200604000000445',
            'SUBMIT_TIME' => '20131218230712',
            'TOTAL_ITEM' => '2',
            'TOTAL_SUM' => '2000',
            'SETTDAY' => '',
        )
    )
);


// 创建一个新cURL资源  Client URL Library
$ch = curl_init();
$info="<txInfo><merchantId>109123456123456</merchantId><version>v5.2</version><payType>31</payType><signType>1</signType><charset>1</charset><orderNo>201502121558000</orderNo><orderDatetime>20150212155800</orderDatetime><customsInfo><CUSTOMS_TYPE>HG007</CUSTOMS_TYPE><ESHOP_ENT_CODE>23456</ESHOP_ENT_CODE><ESHOP_ENT_NAME>ABC</ESHOP_ENT_NAME><BIZ_TYPE_CODE>1</BIZ_TYPE_CODE><APP_UID></APP_UID><APP_UNAME></APP_UNAME><TOTAL_FEE>220</TOTAL_FEE><GOODS_FEE>190</GOODS_FEE><TAX_FEE>5</TAX_FEE><FREIGHT_FEE>5</FREIGHT_FEE><OTHER_FEE>0</OTHER_FEE><IETYPE>E</IETYPE><ORIGINAL_ORDER_NO>201502121558000</ORIGINAL_ORDER_NO><PAY_TIME>20150213155800</PAY_TIME><CURRENCY>840</CURRENCY><PAYER_NAME>张三</PAYER_NAME><PAPER_TYPE>01</PAPER_TYPE><PAPER_NUMBER>401258198804052238</PAPER_NUMBER><PAPER_PHONE>13112345678</PAPER_PHONE><PAPER_EMAIL>aaa@123.com</PAPER_EMAIL><PAY_BANK_NAME></PAY_BANK_NAME><PAY_BANK_CODE></PAY_BANK_CODE><PAY_BANK_SERIALNO></PAY_BANK_SERIALNO><PAYER_COUNTRY_CODE></PAYER_COUNTRY_CODE><PAYER_ADDRESS></PAYER_ADDRESS><PAYER_SEX></PAYER_SEX><PAYER_BIRTHDAY></PAYER_BIRTHDAY><CHECK_ECP_CODE></CHECK_ECP_CODE><CHECK_ECP_NAME></CHECK_ECP_NAME><ORG_CODE></ORG_CODE><PAY_CARD_NO></PAY_CARD_NO><SHIPPER_NAME></SHIPPER_NAME><IS_CHECK></IS_CHECK><MEMO>报关备注</MEMO></customsInfo><remark>测试报文</remark></txInfo><key>1234567890</key>";
$sign=md5($info);
$xml = "<body><txInfo><merchantId>109123456123456</merchantId><version>v5.2</version><payType>31</payType><signType>1</signType><charset>1</charset><orderNo>201502121558000</orderNo><orderDatetime>20150212155800</orderDatetime><customsInfo><CUSTOMS_TYPE>HG007</CUSTOMS_TYPE><ESHOP_ENT_CODE>23456</ESHOP_ENT_CODE><ESHOP_ENT_NAME>ABC</ESHOP_ENT_NAME><BIZ_TYPE_CODE>1</BIZ_TYPE_CODE><APP_UID></APP_UID><APP_UNAME></APP_UNAME><TOTAL_FEE>220</TOTAL_FEE><GOODS_FEE>190</GOODS_FEE><TAX_FEE>5</TAX_FEE><FREIGHT_FEE>5</FREIGHT_FEE><OTHER_FEE>0</OTHER_FEE><IETYPE>E</IETYPE><ORIGINAL_ORDER_NO>201502121558000</ORIGINAL_ORDER_NO><PAY_TIME>20150213155800</PAY_TIME><CURRENCY>840</CURRENCY><PAYER_NAME>张三</PAYER_NAME><PAPER_TYPE>01</PAPER_TYPE><PAPER_NUMBER>401258198804052238</PAPER_NUMBER><PAPER_PHONE>13112345678</PAPER_PHONE><PAPER_EMAIL>aaa@123.com</PAPER_EMAIL><PAY_BANK_NAME></PAY_BANK_NAME><PAY_BANK_CODE></PAY_BANK_CODE><PAY_BANK_SERIALNO></PAY_BANK_SERIALNO><PAYER_COUNTRY_CODE></PAYER_COUNTRY_CODE><PAYER_ADDRESS></PAYER_ADDRESS><PAYER_SEX></PAYER_SEX><PAYER_BIRTHDAY></PAYER_BIRTHDAY><CHECK_ECP_CODE></CHECK_ECP_CODE><CHECK_ECP_NAME></CHECK_ECP_NAME><ORG_CODE></ORG_CODE><PAY_CARD_NO></PAY_CARD_NO><SHIPPER_NAME></SHIPPER_NAME><IS_CHECK></IS_CHECK><MEMO>报关备注</MEMO></customsInfo><remark>测试报文</remark></txInfo><signMsg>$sign</signMsg></body>";
echo $xml;exit;
$xml=base64_encode($xml);
var_dump($xml);exit;

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://ceshi.allinpay.com/bizweb/index.do");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Charset:utf-8', 'Content-type:text/xml']);
curl_setopt($ch, CURLOPT_USERAGENT, "Safari/600.1.4");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["verificationText"=>"$xml"]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
$result = curl_exec($ch); // 抓取URL并把它传递给浏览器
var_dump($result);

// 关闭cURL资源，并且释放系统资源
curl_close($ch);



#F:\github_my_php\artisan\Raptors\Mphp\curl\chh.php