<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title>֧�������ؽӿڽӿ�</title>
</head>
<?php
/* *
 * ���ܣ����ؽӿڽ���ҳ
 * �汾��3.3
 * �޸����ڣ�2012-07-23
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 *************************ע��*************************
 * ������ڽӿڼ��ɹ������������⣬���԰��������;�������
 * 1���̻��������ģ�https://b.alipay.com/support/helperApply.htm?action=consultationApply�����ύ���뼯��Э�������ǻ���רҵ�ļ�������ʦ������ϵ��Э�����
 * 2���̻��������ģ�http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9��
 * 3��֧������̳��http://club.alipay.com/read-htm-tid-8681712.html��
 * �������ʹ����չ���������չ���ܲ�������ֵ��
 */

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");


$WIDapi_type = $_POST['WIDapi_type'];

if ($WIDapi_type == "acquire") {
		
/**************************�������**************************/
		//������ˮ��

		$out_request_no        = $_POST['WIDout_request_no'];
		//֧�������׺�
		
		$trade_no              = $_POST['WIDtrade_no'];
		//�̻����ر������
		
		$merchant_customs_code = $_POST['WIDmerchant_customs_code'];
		//�̻����ر�������
		
		$merchant_customs_name = $_POST['WIDmerchant_customs_name'];
		//���ؽ��
		
		$amount                = $_POST['WIDamount'];
		//���ر��
		$customs_place         = $_POST['WIDcustoms_place'];
/************************************************************/

//����Ҫ����Ĳ������飬����Ķ�		
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
/**************************�������**************************/
	$out_request_nos = $_POST['out_request_nos'];
/************************************************************/

//����Ҫ����Ĳ������飬����Ķ�
	$parameter = array(
		"service"        => "alipay.overseas.acquire.customs.query",
		"partner"        => trim($alipay_config['partner']),
		"_input_charset" => trim(strtolower($alipay_config['input_charset'])),
		"out_request_nos"=> $out_request_nos
);

}



//��������
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestHttp($parameter);
//����XML
//ע�⣺�ù���PHP5����������֧�֣��迪ͨcurl��SSL��PHP���û��������鱾�ص���ʱʹ��PHP�������
$doc = new DOMDocument();
$doc->loadXML($html_text);

//������������̻���ҵ���߼��������

//�������������ҵ���߼�����д�������´�������ο�������

//��ȡ֧������֪ͨ���ز������ɲο������ĵ���ҳ����תͬ��֪ͨ�����б�

//����XML
if( ! empty($doc->getElementsByTagName( "alipay" )->item(0)->nodeValue) ) {
	$alipay = $doc->getElementsByTagName( "alipay" )->item(0)->nodeValue;
	echo $alipay;
}

//�������������ҵ���߼�����д�������ϴ�������ο�������

?>
</body>
</html>