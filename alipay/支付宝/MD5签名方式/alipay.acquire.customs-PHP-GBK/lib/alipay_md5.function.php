<?php
/* *
 * MD5
 * ��ϸ��MD5����
 * �汾��3.3
 * ���ڣ�2012-07-19
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
 */

/**
 * ǩ���ַ���
 * @param $prestr ��Ҫǩ�����ַ���
 * @param $key ˽Կ
 * return ǩ�����
 */
function md5Sign($prestr, $key) {
	$prestr = $prestr . $key;
	return md5($prestr);
}

/**
 * ��֤ǩ��
 * @param $prestr ��Ҫǩ�����ַ���
 * @param $sign ǩ�����
 * @param $key ˽Կ
 * return ǩ�����
 */
function md5Verify($prestr, $sign, $key) {
	$prestr = $prestr . $key;
	$mysgin = md5($prestr);

	if($mysgin == $sign) {
		return true;
	}
	else {
		return false;
	}
}
?>