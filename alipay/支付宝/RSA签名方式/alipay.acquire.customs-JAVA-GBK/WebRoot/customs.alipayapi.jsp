<%
/* *
 *���ܣ����ؽӿڽ���ҳ
 *�汾��3.3
 *���ڣ�2012-08-14
 *˵����
 *���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 *�ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 *************************ע��*****************
 *������ڽӿڼ��ɹ������������⣬���԰��������;�������
 *1���̻��������ģ�https://b.alipay.com/support/helperApply.htm?action=consultationApply�����ύ���뼯��Э�������ǻ���רҵ�ļ�������ʦ������ϵ��Э�����
 *2���̻��������ģ�http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9��
 *3��֧������̳��https://openclub.alipay.com/read.php?tid=25&fid=13��
 *�������ʹ����չ���������չ���ܲ�������ֵ��
 **********************************************
 */
%>
<%@ page language="java" contentType="text/html; charset=gbk" pageEncoding="gbk"%>
<%@ page import="com.alipay.config.*"%>
<%@ page import="com.alipay.util.*"%>
<%@ page import="java.util.HashMap"%>
<%@ page import="java.util.Map"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk">
		<title>֧�������ؽӿ�</title>
	</head>
	<%
		////////////////////////////////////�������//////////////////////////////////////

		//������ˮ��		
		String out_request_no = new String(request.getParameter("WIDout_request_no").getBytes("ISO-8859-1"),"GBK");
		//֧�������׺�		
		String trade_no = new String(request.getParameter("WIDtrade_no").getBytes("ISO-8859-1"),"GBK");
		//�̻����ر������		
		String merchant_customs_code = new String(request.getParameter("WIDmerchant_customs_code").getBytes("ISO-8859-1"),"GBK");
		//�̻����ر�������		
		String merchant_customs_name = new String(request.getParameter("WIDmerchant_customs_name").getBytes("ISO-8859-1"),"GBK");
		//���ؽ��		
		String amount = new String(request.getParameter("WIDamount").getBytes("ISO-8859-1"),"GBK");
		//���ر��
		String customs_place = new String(request.getParameter("WIDcustoms_place").getBytes("ISO-8859-1"),"GBK");
		
		
		//////////////////////////////////////////////////////////////////////////////////
		
		//������������������
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
		
		//��������
		String sHtmlText = AlipaySubmit.buildRequest(sParaTemp,"get","ȷ��");
		out.println(sHtmlText);
	%>
	<body>
	</body>
</html>
