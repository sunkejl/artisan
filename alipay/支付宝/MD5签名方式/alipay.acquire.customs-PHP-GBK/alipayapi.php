<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title>支付宝报关接口接口</title>
</head>
<?php
/* *
 * 功能：报关接口接入页
 * 版本：3.3
 * 修改日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************注意*************************
 * 如果您在接口集成过程中遇到问题，可以按照下面的途径来解决
 * 1、商户服务中心（https://b.alipay.com/support/helperApply.htm?action=consultationApply），提交申请集成协助，我们会有专业的技术工程师主动联系您协助解决
 * 2、商户帮助中心（http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9）
 * 3、支付宝论坛（http://club.alipay.com/read-htm-tid-8681712.html）
 * 如果不想使用扩展功能请把扩展功能参数赋空值。
 */

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");


$WIDapi_type = $_POST['WIDapi_type'];

if ($WIDapi_type == "acquire") {
		
/**************************请求参数**************************/
		//报关流水号

		$out_request_no        = $_POST['WIDout_request_no'];
		//支付宝交易号
		
		$trade_no              = $_POST['WIDtrade_no'];
		//商户海关备案编号
		
		$merchant_customs_code = $_POST['WIDmerchant_customs_code'];
		//商户海关备案名称
		
		$merchant_customs_name = $_POST['WIDmerchant_customs_name'];
		//报关金额
		
		$amount                = $_POST['WIDamount'];
		//海关编号
		$customs_place         = $_POST['WIDcustoms_place'];
/************************************************************/

//构造要请求的参数数组，无需改动		
		$parameter = array(
			"service"               => "alipay.acquire.customs",
			"partner"               => trim($alipay_config['partner']),
			"out_request_no"        => $out_request_no,
			"trade_no"              => $trade_no,
			"merchant_customs_code" => $merchant_customs_code,
			"merchant_customs_name" => $merchant_customs_name,
			"amount"                => $amount,
			"customs_place"         => $customs_place,
			"_input_charset"        => trim(strtolower($alipay_config['input_charset']))
);

}else{
/**************************请求参数**************************/
	$out_request_nos = $_POST['out_request_nos'];
/************************************************************/

//构造要请求的参数数组，无需改动
	$parameter = array(
		"service"        => "alipay.overseas.acquire.customs.query",
		"partner"        => trim($alipay_config['partner']),
		"_input_charset" => trim(strtolower($alipay_config['input_charset'])),
		"out_request_nos"=> $out_request_nos
);

}



//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestHttp($parameter);
//解析XML
//注意：该功能PHP5环境及以上支持，需开通curl、SSL等PHP配置环境。建议本地调试时使用PHP开发软件
$doc = new DOMDocument();
$doc->loadXML($html_text);

//请在这里加上商户的业务逻辑程序代码

//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

//获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

//解析XML
if( ! empty($doc->getElementsByTagName( "alipay" )->item(0)->nodeValue) ) {
	$alipay = $doc->getElementsByTagName( "alipay" )->item(0)->nodeValue;
	echo $alipay;
}

//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

?>
</body>
</html>