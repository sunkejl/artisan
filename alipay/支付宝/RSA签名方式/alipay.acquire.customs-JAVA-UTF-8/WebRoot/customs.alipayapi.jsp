<%
/* *
 *功能：报关接口接入页
 *版本：3.3
 *日期：2012-08-14
 *说明：
 *以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 *该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************注意*****************
 *如果您在接口集成过程中遇到问题，可以按照下面的途径来解决
 *1、商户服务中心（https://b.alipay.com/support/helperApply.htm?action=consultationApply），提交申请集成协助，我们会有专业的技术工程师主动联系您协助解决
 *2、商户帮助中心（http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9）
 *3、支付宝论坛（https://openclub.alipay.com/read.php?tid=25&fid=13）
 *如果不想使用扩展功能请把扩展功能参数赋空值。
 **********************************************
 */
%>
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="com.alipay.config.*"%>
<%@ page import="com.alipay.util.*"%>
<%@ page import="java.util.HashMap"%>
<%@ page import="java.util.Map"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>支付宝报关接口</title>
	</head>
	<%
		////////////////////////////////////请求参数//////////////////////////////////////

		//报关流水号
		String out_request_no = new String(request.getParameter("WIDout_request_no").getBytes("ISO-8859-1"),"UTF-8");
		//支付宝交易号
		String trade_no = new String(request.getParameter("WIDtrade_no").getBytes("ISO-8859-1"),"UTF-8");
		//商户海关备案编号
		String merchant_customs_code = new String(request.getParameter("WIDmerchant_customs_code").getBytes("ISO-8859-1"),"UTF-8");
		//商户海关备案名称
		String merchant_customs_name = new String(request.getParameter("WIDmerchant_customs_name").getBytes("ISO-8859-1"),"UTF-8");
		//报关金额
		String amount = new String(request.getParameter("WIDamount").getBytes("ISO-8859-1"),"UTF-8");
		//海关编号

		String customs_place = new String(request.getParameter("WIDcustoms_place").getBytes("ISO-8859-1"),"UTF-8");
		
		
		//////////////////////////////////////////////////////////////////////////////////
		
		//把请求参数打包成数组
		Map<String, String> sParaTemp = new HashMap<String, String>();
		sParaTemp.put("service", "alipay.acquire.customs");
        sParaTemp.put("partner", AlipayConfig.partner);
        sParaTemp.put("_input_charset", AlipayConfig.input_charset);
		sParaTemp.put("out_request_no", out_request_no);
		sParaTemp.put("trade_no", trade_no);
		sParaTemp.put("merchant_customs_code", merchant_customs_code);
		sParaTemp.put("merchant_customs_name", merchant_customs_name);
		sParaTemp.put("amount", amount);
		sParaTemp.put("customs_place", customs_place);
		
		//建立请求
		String sHtmlText = AlipaySubmit.buildRequest(sParaTemp,"get","确认");
		out.println(sHtmlText);
	%>
	<body>
	</body>
</html>
