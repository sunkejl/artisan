<?php
/* *
 * ֧�����ӿ�RSA����
 * ��ϸ��RSAǩ������ǩ������
 * �汾��3.3
 * ���ڣ�2012-07-23
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
 */

/**
 * RSAǩ��
 * @param $data ��ǩ������
 * @param $private_key �̻�˽Կ�ַ���
 * return ǩ�����
 */
function rsaSign($data, $private_key) {
    //����Ϊ�˳�ʼ��˽Կ����֤������д˽Կʱ�����Ǵ���ʽ���ǲ�����ʽ������ͨ����֤��
    $private_key=str_replace("-----BEGIN RSA PRIVATE KEY-----","",$private_key);
    $private_key=str_replace("-----END RSA PRIVATE KEY-----","",$private_key);
    $private_key=str_replace("\n","",$private_key);

    $private_key="-----BEGIN RSA PRIVATE KEY-----".PHP_EOL .wordwrap($private_key, 64, "\n", true). PHP_EOL."-----END RSA PRIVATE KEY-----";

    $res=openssl_get_privatekey($private_key);
    if($res)
    {
        openssl_sign($data, $sign,$res);
    }
    else {
        echo "����˽Կ��ʽ����ȷ!"."<br/>"."The format of your private_key is incorrect!";
        exit();
    }
    openssl_free_key($res);
	//base64����
    $sign = base64_encode($sign);
    return $sign;
}

/**
 * RSA��ǩ
 * @param $data ��ǩ������
 * @param $alipay_public_key ֧�����Ĺ�Կ�ַ���
 * @param $sign ҪУ�Եĵ�ǩ�����
 * return ��֤���
 */
function rsaVerify($data, $alipay_public_key, $sign)  {
    //����Ϊ�˳�ʼ��˽Կ����֤������д˽Կʱ�����Ǵ���ʽ���ǲ�����ʽ������ͨ����֤��
    $alipay_public_key=str_replace("-----BEGIN PUBLIC KEY-----","",$alipay_public_key);
    $alipay_public_key=str_replace("-----END PUBLIC KEY-----","",$alipay_public_key);
    $alipay_public_key=str_replace("\n","",$alipay_public_key);

    $alipay_public_key='-----BEGIN PUBLIC KEY-----'.PHP_EOL.wordwrap($alipay_public_key, 64, "\n", true) .PHP_EOL.'-----END PUBLIC KEY-----';
    
    $res=openssl_get_publickey($alipay_public_key);
    if($res)
    {
        $result = (bool)openssl_verify($data, base64_decode($sign), $res);
    }
    else {
        echo "����֧������Կ��ʽ����ȷ!"."<br/>"."The format of your alipay_public_key is incorrect!";
        exit();
    }
    openssl_free_key($res);    
    return $result;
}

?>