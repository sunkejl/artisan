<?php
/* *
 * �����ļ�
 * �汾��3.5
 * ���ڣ�2016-06-25
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 * ��ȫУ����鿴ʱ������֧�������ҳ��ʻ�ɫ��������ô�죿
 * ���������
 * 1�������������ã������������������������
 * 2���������������ԣ����µ�¼��ѯ��
 */
 
//�����������������������������������Ļ�����Ϣ������������������������������
//���������ID��ǩԼ�˺ţ���2088��ͷ��16λ��������ɵ��ַ������鿴��ַ��https://b.alipay.com/order/pidAndKey.htm
$alipay_config['partner']		= '';

//�̻���˽Կ,�˴���дԭʼ˽Կ��RSA��˽Կ���ɣ�https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.nBDxfy&treeId=58&articleId=103242&docType=1
$alipay_config['private_key']	= '';

//֧�����Ĺ�Կ���鿴��ַ��https://b.alipay.com/order/pidAndKey.htm 
$alipay_config['alipay_public_key']= 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB';

//�����������������������������������Ļ�����Ϣ������������������������������


//ǩ����ʽ �����޸�
$alipay_config['sign_type']    = strtoupper('RSA');

//�ַ������ʽ Ŀǰ֧�� gbk �� utf-8
$alipay_config['input_charset']= strtolower('gbk');

//ca֤��·����ַ������curl��sslУ��
//�뱣֤cacert.pem�ļ��ڵ�ǰ�ļ���Ŀ¼��
$alipay_config['cacert']    = getcwd().'/cacert.pem';

//����ģʽ,�����Լ��ķ������Ƿ�֧��ssl���ʣ���֧����ѡ��https������֧����ѡ��http
$alipay_config['transport']    = 'http';
?>