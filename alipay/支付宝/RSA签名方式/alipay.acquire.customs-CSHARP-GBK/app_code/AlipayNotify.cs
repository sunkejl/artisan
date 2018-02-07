using System.Web;
using System.Text;
using System.IO;
using System.Net;
using System;
using System.Collections.Generic;

namespace Com.Alipay
{
    /// <summary>
    /// ������Notify
    /// ���ܣ�֧����֪ͨ������
    /// ��ϸ������֧�������ӿ�֪ͨ����
    /// �汾��3.3
    /// �޸����ڣ�2011-07-05
    /// '˵����
    /// ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
    /// �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
    /// 
    /// //////////////////////ע��/////////////////////////////
    /// ����֪ͨ����ʱ���ɲ鿴���дlog��־��д��TXT������ݣ������֪ͨ�����Ƿ����� 
    /// </summary>
    public class Notify
    {
        #region �ֶ�
        private string _partner = "";               //���������ID
        private string _public_key = "";            //֧�����Ĺ�Կ
        private string _input_charset = "";         //�����ʽ
        private string _sign_type = "";             //ǩ����ʽ

        //֧������Ϣ��֤��ַ
        private string Https_veryfy_url = "https://mapi.alipay.com/gateway.do?service=notify_verify&";
        #endregion


        /// <summary>
        /// ���캯��
        /// �������ļ��г�ʼ������
        /// </summary>
        /// <param name="inputPara">֪ͨ���ز�������</param>
        /// <param name="notify_id">֪ͨ��֤ID</param>
        public Notify()
        {
            //��ʼ������������Ϣ
            _partner = Config.Partner.Trim();
            _public_key = Config.Public_key.Trim();
            _input_charset = Config.Input_charset.Trim().ToLower();
            _sign_type = Config.Sign_type.Trim().ToUpper();
        }
		
		/// <summary>
        /// ���ļ���ȡ��Կת��Կ�ַ���
        /// </summary>
        /// <param name="Path">��Կ�ļ�·��</param>
        public static string getPublicKeyStr(string Path)
        {
            StreamReader sr = new StreamReader(Path);
            string pubkey = sr.ReadToEnd();
            sr.Close();
            if (pubkey != null)
            {
                pubkey = pubkey.Replace("-----BEGIN PUBLIC KEY-----", "");
                pubkey = pubkey.Replace("-----END PUBLIC KEY-----", "");
                pubkey = pubkey.Replace("\r", "");
                pubkey = pubkey.Replace("\n", "");
            }
            return pubkey;
        }

        /// <summary>
        ///  ��֤��Ϣ�Ƿ���֧���������ĺϷ���Ϣ
        /// </summary>
        /// <param name="inputPara">֪ͨ���ز�������</param>
        /// <param name="notify_id">֪ͨ��֤ID</param>
        /// <param name="sign">֧�������ɵ�ǩ�����</param>
        /// <returns>��֤���</returns>
        public bool Verify(SortedDictionary<string, string> inputPara, string notify_id, string sign)
        {
            //��ȡ����ʱ��ǩ����֤���
            bool isSign = GetSignVeryfy(inputPara, sign);
            //��ȡ�Ƿ���֧�����������������������֤���
            string responseTxt = "false";
            if (notify_id != null && notify_id != "") { responseTxt = GetResponseTxt(notify_id); }

            //д��־��¼����Ҫ���ԣ���ȡ����������ע�ͣ�
            //string sWord = "responseTxt=" + responseTxt + "\n isSign=" + isSign.ToString() + "\n ���ػ����Ĳ�����" + GetPreSignStr(inputPara) + "\n ";
            //Core.LogResult(sWord);

            //�ж�responsetTxt�Ƿ�Ϊtrue��isSign�Ƿ�Ϊtrue
            //responsetTxt�Ľ������true����������������⡢���������ID��notify_idһ����ʧЧ�й�
            //isSign����true���밲ȫУ���롢����ʱ�Ĳ�����ʽ���磺���Զ�������ȣ��������ʽ�й�
            if (responseTxt == "true" && isSign)//��֤�ɹ�
            {
                return true;
            }
            else//��֤ʧ��
            {
                return false;
            }
        }

        /// <summary>
        /// ��ȡ��ǩ���ַ����������ã�
        /// </summary>
        /// <param name="inputPara">֪ͨ���ز�������</param>
        /// <returns>��ǩ���ַ���</returns>
        private string GetPreSignStr(SortedDictionary<string, string> inputPara)
        {
            Dictionary<string, string> sPara = new Dictionary<string, string>();

            //���˿�ֵ��sign��sign_type����
            sPara = Core.FilterPara(inputPara);

            //��ȡ��ǩ���ַ���
            string preSignStr = Core.CreateLinkString(sPara);

            return preSignStr;
        }

        /// <summary>
        /// ��ȡ����ʱ��ǩ����֤���
        /// </summary>
        /// <param name="inputPara">֪ͨ���ز�������</param>
        /// <param name="sign">�Աȵ�ǩ�����</param>
        /// <returns>ǩ����֤���</returns>
        private bool GetSignVeryfy(SortedDictionary<string, string> inputPara, string sign)
        {
            Dictionary<string, string> sPara = new Dictionary<string, string>();

            //���˿�ֵ��sign��sign_type����
            sPara = Core.FilterPara(inputPara);
            
            //��ȡ��ǩ���ַ���
            string preSignStr = Core.CreateLinkString(sPara);

            //���ǩ����֤���
            bool isSgin = false;
            if (sign != null && sign != "")
            {
                switch (_sign_type)
                {
                    case "RSA":
                        isSgin = RSAFromPkcs8.verify(preSignStr, sign, _public_key, _input_charset);
                        break;
                    default:
                        break;
                }
            }

            return isSgin;
        }

        /// <summary>
        /// ��ȡ�Ƿ���֧�����������������������֤���
        /// </summary>
        /// <param name="notify_id">֪ͨ��֤ID</param>
        /// <returns>��֤���</returns>
        private string GetResponseTxt(string notify_id)
        {
            string veryfy_url = Https_veryfy_url + "partner=" + _partner + "&notify_id=" + notify_id;

            //��ȡԶ�̷�����ATN�������֤�Ƿ���֧��������������������
            string responseTxt = Get_Http(veryfy_url, 120000);

            return responseTxt;
        }

        /// <summary>
        /// ��ȡԶ�̷�����ATN���
        /// </summary>
        /// <param name="strUrl">ָ��URL·����ַ</param>
        /// <param name="timeout">��ʱʱ������</param>
        /// <returns>������ATN���</returns>
        private string Get_Http(string strUrl, int timeout)
        {
            string strResult;
            try
            {
                HttpWebRequest myReq = (HttpWebRequest)HttpWebRequest.Create(strUrl);
                myReq.Timeout = timeout;
                HttpWebResponse HttpWResp = (HttpWebResponse)myReq.GetResponse();
                Stream myStream = HttpWResp.GetResponseStream();
                StreamReader sr = new StreamReader(myStream, Encoding.Default);
                StringBuilder strBuilder = new StringBuilder();
                while (-1 != sr.Peek())
                {
                    strBuilder.Append(sr.ReadLine());
                }

                strResult = strBuilder.ToString();
            }
            catch (Exception exp)
            {
                strResult = "����" + exp.Message;
            }

            return strResult;
        }
    }
}