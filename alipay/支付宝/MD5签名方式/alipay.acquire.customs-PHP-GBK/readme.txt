
            �q�����������������������������������������������r
    ����������           ֧��������ʾ���ṹ˵��             ����������
            �t�����������������������������������������������s 
��                                                                  
��       �ӿ����ƣ�֧�������ؽӿڣ�alipay.acquire.customs��
�� ��    ����汾��3.3
         �������ԣ�PHP 5.0
         ��    Ȩ��֧�������й������缼�����޹�˾
��       �� �� �ߣ�֧��������������֧����
         ��ϵ��ʽ��https://support.open.alipay.com/alipay/support/index.htm
         ����������DEMO�����ο���ʵ�ʿ�������Ҫ��Ͼ��峡���޸�ʹ�á�

    ������������������������������������������������������������������

��������������
 �����ļ��ṹ
��������������

alipay.acquire.customs-php-GBK
  ��
  ��lib�����������������������������������������ļ���
  ��  ��
  ��  ��alipay_core.function.php ������������֧�����ӿڹ��ú����ļ�
  ��  ��
  ��  ��alipay_notify.class.php��������������֧����֪ͨ�������ļ�
  ��  ��
  ��  ��alipay_submit.class.php��������������֧�������ӿ������ύ���ļ�
  ��  ��
  ��  ��alipay_md5.function.php��������������֧�����ӿ�MD5�����ļ�
  ��
  ��log.txt������������������������������������־�ļ�
  ��
  ��alipay.config.php�����������������������������������ļ�
  ��
  ��alipayapi.php����������������������������֧�����ӿ�����ļ�
  ��
  ��cacert.pem ����������������������������������CURL��У��SSL��CA֤���ļ�
  ��
  ��readme.txt ������������������������������ʹ��˵���ı�

��ע���

1�����뿪��curl����
��1��ʹ��Crul��Ҫ�޸ķ�������php.ini�ļ������ã��ҵ�php_curl.dllȥ��ǰ���";"����
��2���ļ�����cacert.pem�ļ�����ط��õ��̻���վƽ̨�У��磺�������ϣ������ұ�֤��·����Ч���ṩ�Ĵ���demo�е�Ĭ��·���ǵ�ǰ�ļ����¡���getcwd().'\\cacert.pem'

2����Ҫ���õ��ļ��ǣ�
alipay.config.php
alipayapi.php

�񱾴���ʾ����DEMO������fsockopen()�ķ���Զ��HTTP��ȡ���ݡ�����DOMDocument()�ķ�������XML���ݡ�

������̻���վ��������������Ƿ�ʹ�ô���ʾ���еķ�ʽ����
�����ʹ��fsockopen����ô������curl�����棻
�����������PHP5�汾�������ϣ���ô����������������DOMDocument()��

curl��XML���������������б�д���롣


������������������
 ���ļ������ṹ
������������������

alipay_core.function.php

function createLinkstring($para)
���ܣ�����������Ԫ�أ����ա�����=����ֵ����ģʽ�á�&���ַ�ƴ�ӳ��ַ���
���룺Array  $para ��Ҫƴ�ӵ�����
�����String ƴ������Ժ���ַ���

function createLinkstringUrlencode($para)
���ܣ�����������Ԫ�أ����ա�����=����ֵ����ģʽ�á�&���ַ�ƴ�ӳ��ַ��������Բ���ֵurlencode
���룺Array  $para ��Ҫƴ�ӵ�����
�����String ƴ������Ժ���ַ���

function paraFilter($para)
���ܣ���ȥ�����еĿ�ֵ��ǩ������
���룺Array  $para ǩ��������
�����Array  ȥ����ֵ��ǩ�����������ǩ��������

function argSort($para)
���ܣ�����������
���룺Array  $para ����ǰ������
�����Array  ����������

function logResult($word='')
���ܣ�д��־��������ԣ�����վ����Ҳ���Ըĳɴ������ݿ⣩
���룺String $word Ҫд����־����ı����� Ĭ��ֵ����ֵ

function getHttpResponsePOST($url, $cacert_url, $para, $input_charset = '')
���ܣ�Զ�̻�ȡ���ݣ�POSTģʽ
���룺String $url ָ��URL����·����ַ
      String $cacert_url ָ����ǰ����Ŀ¼����·��
      Array  $para ���������
      String $input_charset �����ʽ��Ĭ��ֵ����ֵ
�����String Զ�����������

function getHttpResponseGET($url, $cacert_url)
���ܣ�Զ�̻�ȡ���ݣ�GETģʽ
���룺String $url ָ��URL����·����ַ
      String $cacert_url ָ����ǰ����Ŀ¼����·��
�����String Զ�����������

function charsetEncode($input,$_output_charset ,$_input_charset)
���ܣ�ʵ�ֶ����ַ����뷽ʽ
���룺String $input ��Ҫ������ַ���
      String $_output_charset ����ı����ʽ
      String $_input_charset ����ı����ʽ
�����String �������ַ���

function charsetDecode($input,$_input_charset ,$_output_charset) 
���ܣ�ʵ�ֶ����ַ����뷽ʽ
���룺String $input ��Ҫ������ַ���
      String $_output_charset ����Ľ����ʽ
      String $_input_charset ����Ľ����ʽ
�����String �������ַ���

��������������������������������������������������������������

function md5Sign($prestr, $key)
���ܣ�MD5ǩ��
���룺String $prestr ��ǩ������
      String $key ˽Կ
�����String ǩ�����

function md5Verify($prestr, $sign, $key)
���ܣ�MD5��ǩ
���룺String $data ��ǩ������
      String $sign ǩ�����
      String $key ˽Կ
�����bool ��֤���
��������������������������������������������������������������

alipay_notify.class.php

function verifyNotify()
���ܣ���notify_url����֤
�����Bool  ��֤�����true/false

function verifyReturn()
���ܣ���return_url����֤
�����Bool  ��֤�����true/false

function getSignVeryfy($para_temp, $sign)
���ܣ���ȡ����ʱ��ǩ����֤���
���룺Array $para_temp ֪ͨ�������Ĳ�������
      String $sign ֧�������ص�ǩ�����
�����Bool ���ǩ����֤���

function getResponse($notify_id)
���ܣ���ȡԶ�̷�����ATN���,��֤����URL
���룺String $notify_id ֪ͨУ��ID
�����String ������ATN���

��������������������������������������������������������������

alipay_submit.class.php

function buildRequestMysign($para_sort)
���ܣ�����Ҫ�����֧�����Ĳ�������
���룺Array $para_sort ������Ҫǩ��������
�����String ǩ�����

function buildRequestPara($para_temp)
���ܣ����ݷ�����������Ϣ������ǩ�����
���룺Array $para_temp ����ǰ�Ĳ�������
�����String Ҫ����Ĳ�������

function buildRequestParaToString($para_temp)
���ܣ����ݷ�����������Ϣ������ǩ�����
���룺Array $para_temp ����ǰ�Ĳ�������
�����String Ҫ����Ĳ��������ַ���

function buildRequestForm($para_temp, $method, $button_name)
���ܣ����������Ա�HTML��ʽ���죨Ĭ�ϣ�
���룺Array $para_temp ����ǰ�Ĳ�������
      String $method �ύ��ʽ������ֵ��ѡ��post��get
      String $button_name ȷ�ϰ�ť��ʾ����
�����String �ύ��HTML�ı�

function buildRequestHttp($para_temp)
���ܣ�����������ģ��Զ��HTTP��POST����ʽ���첢��ȡ֧�����Ĵ�����
���룺Array $para_temp ����ǰ�Ĳ�������
�����String ֧����������

function buildRequestHttpInFile($para_temp, $file_para_name, $file_name)
���ܣ�����������ģ��Զ��HTTP��POST����ʽ���첢��ȡ֧�����Ĵ����������ļ��ϴ�����
���룺Array $para_temp �����������
      String $file_para_name �ļ����͵Ĳ�����
      String $file_name �ļ���������·��
�����String ֧�������ش�����

function query_timestamp() 
���ܣ����ڷ����㣬���ýӿ�query_timestamp����ȡʱ����Ĵ�����
�����String ʱ����ַ���

��������������������������������������������������������������


��������������������
 �������⣬��������
��������������������

����ڼ���֧�����ӿ�ʱ�������ʻ�������⣬��ʹ����������ӣ��ύ���롣
https://support.open.alipay.com/support/createOrEditProblem.htm
���ǻ���ר�ŵļ���֧����ԱΪ������




