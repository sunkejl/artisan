<?php
$foo = "<body><txInfo><merchantId>109123456123456</merchantId><version>v5.2</version><payType>31</payType><signType>1</signType><charset>1</charset><orderNo>hnd2017050415565968</orderNo><orderDatetime>20170504155659</orderDatetime><customsInfo><CUSTOMS_TYPE>HG009</CUSTOMS_TYPE><ESHOP_ENT_CODE>23456</ESHOP_ENT_CODE><ESHOP_ENT_NAME>23456</ESHOP_ENT_NAME><TOTAL_FEE>100</TOTAL_FEE><ORIGINAL_ORDER_NO>hnd2017050415565968</ORIGINAL_ORDER_NO><PAY_TIME>20170504155659</PAY_TIME><CURRENCY>156</CURRENCY><PAYER_NAME>张三</PAYER_NAME><PAPER_TYPE>01</PAPER_TYPE><PAPER_NUMBER>401258198804052238</PAPER_NUMBER><MEMO>123456789</MEMO></customsInfo><remark>测试订单</remark></txInfo><signMsg>99789FADBA8DA13C5719815A020D9542</signMsg></body>";
$tx = "<txInfo><merchantId>109123456123456</merchantId><version>v5.2</version><payType>31</payType><signType>1</signType><charset>1</charset><orderNo>hnd2017050415565968</orderNo><orderDatetime>20170504155659</orderDatetime><customsInfo><CUSTOMS_TYPE>HG009</CUSTOMS_TYPE><ESHOP_ENT_CODE>23456</ESHOP_ENT_CODE><ESHOP_ENT_NAME>23456</ESHOP_ENT_NAME><TOTAL_FEE>100</TOTAL_FEE><ORIGINAL_ORDER_NO>hnd2017050415565968</ORIGINAL_ORDER_NO><PAY_TIME>20170504155659</PAY_TIME><CURRENCY>156</CURRENCY><PAYER_NAME>张三</PAYER_NAME><PAPER_TYPE>01</PAPER_TYPE><PAPER_NUMBER>401258198804052238</PAPER_NUMBER><MEMO>123456789</MEMO></customsInfo><remark>测试订单</remark></txInfo><key>1234567890</key>";

$sign = md5($tx);
var_dump($sign);
exit;
#$info="<txInfo><merchantId>109123456123456</merchantId><version>v5.2</version><payType>31</payType><signType>1</signType><charset>1</charset><orderNo>201502121558000</orderNo><orderDatetime>20150212155800</orderDatetime><customsInfo><CUSTOMS_TYPE>HG007</CUSTOMS_TYPE><ESHOP_ENT_CODE>23456</ESHOP_ENT_CODE><ESHOP_ENT_NAME>ABC</ESHOP_ENT_NAME><BIZ_TYPE_CODE>1</BIZ_TYPE_CODE><APP_UID></APP_UID><APP_UNAME></APP_UNAME><TOTAL_FEE>220</TOTAL_FEE><GOODS_FEE>190</GOODS_FEE><TAX_FEE>5</TAX_FEE><FREIGHT_FEE>5</FREIGHT_FEE><OTHER_FEE>0</OTHER_FEE><IETYPE>E</IETYPE><ORIGINAL_ORDER_NO>201502121558000</ORIGINAL_ORDER_NO><PAY_TIME>20150213155800</PAY_TIME><CURRENCY>840</CURRENCY><PAYER_NAME>张三</PAYER_NAME><PAPER_TYPE>01</PAPER_TYPE><PAPER_NUMBER>401258198804052238</PAPER_NUMBER><PAPER_PHONE>13112345678</PAPER_PHONE><PAPER_EMAIL>aaa@123.com</PAPER_EMAIL><PAY_BANK_NAME></PAY_BANK_NAME><PAY_BANK_CODE></PAY_BANK_CODE><PAY_BANK_SERIALNO></PAY_BANK_SERIALNO><PAYER_COUNTRY_CODE></PAYER_COUNTRY_CODE><PAYER_ADDRESS></PAYER_ADDRESS><PAYER_SEX></PAYER_SEX><PAYER_BIRTHDAY></PAYER_BIRTHDAY><CHECK_ECP_CODE></CHECK_ECP_CODE><CHECK_ECP_NAME></CHECK_ECP_NAME><ORG_CODE></ORG_CODE><PAY_CARD_NO></PAY_CARD_NO><SHIPPER_NAME></SHIPPER_NAME><IS_CHECK></IS_CHECK><MEMO>报关备注</MEMO></customsInfo><remark>测试报文</remark></txInfo><key>1234567890</key>";
#$sign=md5($info);
#$xml = "<body><txInfo><merchantId>109123456123456</merchantId><version>v5.2</version><payType>31</payType><signType>1</signType><charset>1</charset><orderNo>201502121558000</orderNo><orderDatetime>20150212155800</orderDatetime><customsInfo><CUSTOMS_TYPE>HG007</CUSTOMS_TYPE><ESHOP_ENT_CODE>23456</ESHOP_ENT_CODE><ESHOP_ENT_NAME>ABC</ESHOP_ENT_NAME><BIZ_TYPE_CODE>1</BIZ_TYPE_CODE><APP_UID></APP_UID><APP_UNAME></APP_UNAME><TOTAL_FEE>220</TOTAL_FEE><GOODS_FEE>190</GOODS_FEE><TAX_FEE>5</TAX_FEE><FREIGHT_FEE>5</FREIGHT_FEE><OTHER_FEE>0</OTHER_FEE><IETYPE>E</IETYPE><ORIGINAL_ORDER_NO>201502121558000</ORIGINAL_ORDER_NO><PAY_TIME>20150213155800</PAY_TIME><CURRENCY>840</CURRENCY><PAYER_NAME>张三</PAYER_NAME><PAPER_TYPE>01</PAPER_TYPE><PAPER_NUMBER>401258198804052238</PAPER_NUMBER><PAPER_PHONE>13112345678</PAPER_PHONE><PAPER_EMAIL>aaa@123.com</PAPER_EMAIL><PAY_BANK_NAME></PAY_BANK_NAME><PAY_BANK_CODE></PAY_BANK_CODE><PAY_BANK_SERIALNO></PAY_BANK_SERIALNO><PAYER_COUNTRY_CODE></PAYER_COUNTRY_CODE><PAYER_ADDRESS></PAYER_ADDRESS><PAYER_SEX></PAYER_SEX><PAYER_BIRTHDAY></PAYER_BIRTHDAY><CHECK_ECP_CODE></CHECK_ECP_CODE><CHECK_ECP_NAME></CHECK_ECP_NAME><ORG_CODE></ORG_CODE><PAY_CARD_NO></PAY_CARD_NO><SHIPPER_NAME></SHIPPER_NAME><IS_CHECK></IS_CHECK><MEMO>报关备注</MEMO></customsInfo><remark>测试报文</remark></txInfo><signMsg>$sign</signMsg></body>";
#echo ($xml);exit;
$xml = base64_encode($foo);


// 创建一个新cURL资源  Client URL Library
$ch = curl_init();

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://ceshi.allinpay.com/bizweb/index.do");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Charset:utf-8', 'Content-type:application/x-www-form-urlencoded']);
curl_setopt($ch, CURLOPT_USERAGENT, "Safari/600.1.4");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["verificationText" => "$xml"]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
$result = curl_exec($ch); // 抓取URL并把它传递给浏览器
$resultObj = simplexml_load_string(base64_decode($result));
var_dump($resultObj);
var_dump($resultObj->txInfo->retCode);
if (!isset($resultObj->txInfo->retCode) || $resultObj->txInfo->retCode != "0000") {
    throw new Exception("xxx");
}


// 关闭cURL资源，并且释放系统资源
curl_close($ch);



#F:\github_my_php\artisan\Raptors\Mphp\curl\chh.php