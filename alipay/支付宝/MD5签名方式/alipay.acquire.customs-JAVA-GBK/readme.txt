
            �q�����������������������������������������������r
    ����������           ֧��������ʾ���ṹ˵��             ����������
            �t�����������������������������������������������s 
��                                                                  
��       �ӿ����ƣ�֧�������ؽӿڣ�alipay.acquire.customs��
�� ��    ����汾��3.3
         �������ԣ�JAVA JDK1.5
         ��    Ȩ��֧�������й������缼�����޹�˾
��       �� �� �ߣ�֧��������������֧����
         ��ϵ��ʽ��https://support.open.alipay.com/alipay/support/index.htm
         ����������DEMO�����ο���ʵ�ʿ�������Ҫ��Ͼ��峡���޸�ʹ�á�

    ������������������������������������������������������������������

��������������
 �����ļ��ṹ
��������������

alipay.acquire.customs-JAVA-GBK
  ��
  ��src�����������������������������������ļ���
  ��  ��
  ��  ��com.alipay.config
  ��  ��  ��
  ��  ��  ��AlipayConfig.java���������������������ļ�
  ��  ��
  ��  ��com.alipay.util
  ��  ��  ��
  ��  ��  ��AlipayCore.java������������֧�����ӿڹ��ú������ļ�
  ��  ��  ��
  ��  ��  ��AlipayNotify.java����������֧����֪ͨ�������ļ�
  ��  ��  ��
  ��  ��  ��AlipaySubmit.java����������֧�������ӿ������ύ���ļ�
  ��  ��  ��
  ��  ��  ��UtilDate.java��������������֧�����Զ��嶩�����ļ�
  ��  ��
  ��  ��com.alipay.md5
  ��  ��  ��
  ��  ��  ��MD5.java ������������������MD5ǩ�����ļ�
  ��  ��
  ��  ��com.alipay.util.httpClient���ѷ�װ��
  ��      ��
  ��      ��HttpProtocolHandler.java ��֧����HttpClient�������ļ�
  ��      ��
  ��      ��HttpRequest.java ����������֧����HttpClient�������ļ�
  ��      ��
  ��      ��HttpResponse.java����������֧����HttpClient�������ļ�
  ��      ��
  ��      ��HttpResultType.java��������֧����HttpClient���صĽ���ַ���ʽ���ļ�
  ��
  ��WebRoot����������������������������ҳ���ļ���
  ��  ��
  ��  ��alipayapi.jsp������������������֧�����ӿ�����ļ�
  ��  ��
  ��  ��index.jsp����������������������֧�����������ҳ��
  ��  ��
  ��  ��WEB-INF
  ��   	  ��
  ��      ��lib�����JAVA��Ŀ�а�����Щ�ܰ�������Ҫ���룩
  ��   	     ��
  ��   	     ��commons-codec-1.6.jar
  ��   	     ��
  ��   	     ��commons-httpclient-3.0.1.jar
  ��   	     ��
  ��   	     ��commons-logging-1.1.1.jar
  ��   	     ��
  ��   	     ��dom4j-1.6.1.jar
  ��   	     ��
  ��   	     ��jaxen-1.1-beta-6.jar
  ��
  ��readme.txt ������������������ʹ��˵���ı�

��ע���
��Ҫ���õ��ļ��ǣ�
alipay_config.java
alipayapi.jsp
������ʾ����demo����ģ���ȡԶ��HTTP��Ϣʹ�õ���commons-httpclient-3.0�汾�ĵ������ܰ�����֧������httpClient��װ�ࡣ
���������ʹ�ø÷�ʽʵ��ģ���ȡԶ��HTTP���ܣ���ô������������ʽ���棬��ʱ�������б�д���롣


������������������
 ���ļ������ṹ
������������������

AlipayCore.java

public static Map paraFilter(Map<String, String> sArray)
���ܣ���ȥ�����еĿ�ֵ��ǩ������
���룺Map<String, String> sArray Ҫǩ��������
�����Map<String, String> ȥ����ֵ��ǩ�����������ǩ��������

public static String createLinkString(Map<String, String> params)
���ܣ�����������Ԫ�أ����ա�����=����ֵ����ģʽ�á�&���ַ�ƴ�ӳ��ַ���
���룺Map<String, String> params ��Ҫƴ�ӵ�����
�����String ƴ������Ժ���ַ���

public static void logResult(String sWord)
���ܣ�д��־��������ԣ�����վ����Ҳ���Ըĳɴ������ݿ⣩
���룺String sWord Ҫд����־����ı�����

public static String getAbstract(String strFilePath, String file_digest_type) throws IOException
���ܣ������ļ�ժҪ
���룺String strFilePath �ļ�·��
      String file_digest_type ժҪ�㷨
�����String �ļ�ժҪ���

��������������������������������������������������������������

MD5.java

public static String sign(String text, String key, String input_charset)
���ܣ�MD5ǩ��
���룺String text ����
      String key ˽Կ
      String input_charset �����ʽ
�����String ǩ�����

public static boolean verify(String text, String sign, String key, String input_charset)
���ܣ�MD5��ǩ�����
���룺String text ����
      String sign ֧������ǩ��ֵ
      String key ˽Կ
      String input_charset �����ʽ
�����boolean ǩ�����

��������������������������������������������������������������




AlipayNotify.java

public static boolean verify(Map<String, String> params)
���ܣ����ݷ�����������Ϣ������ǩ�����
���룺Map<String, String>  Params ֪ͨ�������Ĳ�������
�����boolean ��֤���

private static boolean getSignVeryfy(Map<String, String> Params, String sign)
���ܣ����ݷ�����������Ϣ����֤ǩ��
���룺Map<String, String>  Params ֪ͨ�������Ĳ�������
      String sign ֧������ǩ��ֵ
�����boolean ǩ�����

private static String verifyResponse(String notify_id)
���ܣ���ȡԶ�̷�����ATN���,��֤����URL
���룺String notify_id ��֤֪ͨID
�����String ��֤���

private static String checkUrl(String urlvalue)
���ܣ���ȡԶ�̷�����ATN���
���룺String urlvalue ָ��URL·����ַ
�����String ������ATN����ַ���

��������������������������������������������������������������

AlipaySubmit.java

public static String buildRequestMysign(Map<String, String> sPara)
���ܣ�����ǩ�����
���룺Map<String, String> sPara Ҫǩ��������
�����String ǩ�����

private static Map<String, String> buildRequestPara(Map<String, String> sParaTemp)
���ܣ�����Ҫ�����֧�����Ĳ�������
���룺Map<String, String> sParaTemp ����ǰ�Ĳ�������
�����Map<String, String> Ҫ����Ĳ�������

public static String buildRequest(Map<String, String> sParaTemp, String strMethod, String strButtonName)
���ܣ����������Ա�HTML��ʽ���죨Ĭ�ϣ�
���룺Map<String, String> sParaTemp �����������
      String strMethod �ύ��ʽ������ֵ��ѡ��post��get
      String strButtonName ȷ�ϰ�ť��ʾ����
�����String �ύ��HTML�ı�

public static String buildRequest(Map<String, String> sParaTemp, String strMethod, String strButtonName, String strParaFileName)
���ܣ����������Ա�HTML��ʽ���죬���ļ��ϴ�����
���룺Map<String, String> sParaTemp �����������
      String strMethod �ύ��ʽ������ֵ��ѡ��post��get
      String strButtonName ȷ�ϰ�ť��ʾ����
      String strParaFileName �ļ��ϴ��Ĳ�����
�����String �ύ��HTML�ı�

public static String buildRequest(String strParaFileName, String strFilePath,Map<String, String> sParaTemp) throws Exception
���ܣ�����������ģ��Զ��HTTP��POST����ʽ���첢��ȡ֧�����Ĵ�����
���룺String strParaFileName �ļ����͵Ĳ�����
      String strFilePath �ļ�·��
      Map<String, String> sParaTemp �����������
�����String ֧����������

private static NameValuePair[] generatNameValuePair(Map<String, String> properties)
���ܣ�MAP��������ת����NameValuePair����
���룺Map<String, String> sParaTemp MAP��������
�����NameValuePair[] NameValuePair��������

public static String query_timestamp()
���ܣ����ڷ����㣬���ýӿ�query_timestamp����ȡʱ����Ĵ�����
�����String ʱ����ַ���

��������������������������������������������������������������

UtilDate.java

public  static String getOrderNum()
���ܣ��Զ����������ţ���ʽyyyyMMddHHmmss
�����String ������

public  static String getDateFormatter()
���ܣ���ȡ���ڣ���ʽ��yyyy-MM-dd HH:mm:ss
�����String ����

public static String getDate()
���ܣ���ȡ���ڣ���ʽ��yyyyMMdd
�����String ����

public static String getThree()
���ܣ������������λ��
�����String �����λ��

��������������������������������������������������������������


��������������������
 �������⣬��������
��������������������

����ڼ���֧�����ӿ�ʱ�������ʻ�������⣬��ʹ����������ӣ��ύ���롣
https://support.open.alipay.com/support/createOrEditProblem.htm
���ǻ���ר�ŵļ���֧����ԱΪ������




