using System.Web;
using System.Text;
using System.IO;
using System.Net;
using System;
using System.Collections.Generic;

namespace Com.Alipay
{
    /// <summary>
    /// ������Config
    /// ���ܣ�����������
    /// ��ϸ�������ʻ��й���Ϣ������·��
    /// �汾��3.3
    /// ���ڣ�2012-07-05
    /// ˵����
    /// ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
    /// �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
    /// 
    /// ��λ�ȡ��ȫУ����ͺ��������ID
    /// 1.������ǩԼ֧�����˺ŵ�¼֧������վ(www.alipay.com)
    /// 2.������̼ҷ���(https://b.alipay.com/order/myOrder.htm)
    /// 3.�������ѯ���������(PID)��������ѯ��ȫУ����(Key)��
    /// </summary>
    public class Config
    {
        #region �ֶ�
        private static string partner = "";
        private static string private_key = "";
        private static string public_key = "";
        private static string input_charset = "";
        private static string sign_type = "";
        #endregion

        static Config()
        {
            //�����������������������������������Ļ�����Ϣ������������������������������

            //���������ID����2088��ͷ��16λ��������ɵ��ַ���
            partner = "";

            //�̻���˽Կ
            private_key = "";

            //֧�����Ĺ�Կ�������޸ĸ�ֵ
            public_key = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB";

            //�����������������������������������Ļ�����Ϣ������������������������������



            //�ַ������ʽ Ŀǰ֧�� gbk �� utf-8
            input_charset = "gbk";

            //ǩ����ʽ��ѡ���RSA��DSA��MD5
            sign_type = "RSA";
        }

        #region ����
        /// <summary>
        /// ��ȡ�����ú��������ID
        /// </summary>
        public static string Partner
        {
            get { return partner; }
            set { partner = value; }
        }

        /// <summary>
        /// ��ȡ�������̻���˽Կ
        /// </summary>
        public static string Private_key
        {
            get { return private_key; }
            set { private_key = value; }
        }

        /// <summary>
        /// ��ȡ������֧�����Ĺ�Կ
        /// </summary>
        public static string Public_key
        {
            get { return public_key; }
            set { public_key = value; }
        }

        /// <summary>
        /// ��ȡ�ַ������ʽ
        /// </summary>
        public static string Input_charset
        {
            get { return input_charset; }
        }

        /// <summary>
        /// ��ȡǩ����ʽ
        /// </summary>
        public static string Sign_type
        {
            get { return sign_type; }
        }
        #endregion
    }
}