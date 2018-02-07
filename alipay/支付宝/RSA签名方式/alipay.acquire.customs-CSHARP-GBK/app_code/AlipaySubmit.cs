using System.Web;
using System.Text;
using System.IO;
using System.Net;
using System;
using System.Collections.Generic;
using System.Xml;

namespace Com.Alipay
{
    /// <summary>
    /// ������Submit
    /// ���ܣ�֧�������ӿ������ύ��
    /// ��ϸ������֧�������ӿڱ�HTML�ı�����ȡԶ��HTTP����
    /// �汾��3.3
    /// �޸����ڣ�2011-07-05
    /// ˵����
    /// ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
    /// �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο�
    /// </summary>
    public class Submit
    {
        #region �ֶ�
        //֧�������ص�ַ���£�
        private static string GATEWAY_NEW = "https://mapi.alipay.com/gateway.do?";
        //�̻���˽Կ
        private static string _private_key = "";
        //�����ʽ
        private static string _input_charset = "";
        //ǩ����ʽ
        private static string _sign_type = "";
        #endregion

        static Submit()
        {
            _private_key = Config.Private_key;
            _input_charset = Config.Input_charset.Trim().ToLower();
            _sign_type = Config.Sign_type.Trim().ToUpper();
        }

        /// <summary>
        /// ��������ʱ��ǩ��
        /// </summary>
        /// <param name="sPara">�����֧�����Ĳ�������</param>
        /// <returns>ǩ�����</returns>
        private static string BuildRequestMysign(Dictionary<string, string> sPara)
        {
            //����������Ԫ�أ����ա�����=����ֵ����ģʽ�á�&���ַ�ƴ�ӳ��ַ���
            string prestr = Core.CreateLinkString(sPara);

            //�����յ��ַ���ǩ�������ǩ�����
            string mysign = "";
            switch (_sign_type)
            {
                case "RSA":
                    mysign = RSAFromPkcs8.sign(prestr, _private_key, _input_charset);
                    break;
                default:
                    mysign = "";
                    break;
            }

            return mysign;
        }

        /// <summary>
        /// ����Ҫ�����֧�����Ĳ�������
        /// </summary>
        /// <param name="sParaTemp">����ǰ�Ĳ�������</param>
        /// <returns>Ҫ����Ĳ�������</returns>
        private static Dictionary<string, string> BuildRequestPara(SortedDictionary<string, string> sParaTemp)
        {
            //��ǩ�������������
            Dictionary<string, string> sPara = new Dictionary<string, string>();
            //ǩ�����
            string mysign = "";

            //����ǩ����������
            sPara = Core.FilterPara(sParaTemp);

            //���ǩ�����
            mysign = BuildRequestMysign(sPara);

            //ǩ�������ǩ����ʽ���������ύ��������
            sPara.Add("sign", mysign);
            sPara.Add("sign_type", _sign_type);

            return sPara;
        }

        /// <summary>
        /// ����Ҫ�����֧�����Ĳ�������
        /// </summary>
        /// <param name="sParaTemp">����ǰ�Ĳ�������</param>
        /// <param name="code">�ַ�����</param>
        /// <returns>Ҫ����Ĳ��������ַ���</returns>
        private static string BuildRequestParaToString(SortedDictionary<string, string> sParaTemp, Encoding code)
        {
            //��ǩ�������������
            Dictionary<string, string> sPara = new Dictionary<string, string>();
            sPara = BuildRequestPara(sParaTemp);

            //�Ѳ�����������Ԫ�أ����ա�����=����ֵ����ģʽ�á�&���ַ�ƴ�ӳ��ַ��������Բ���ֵ��urlencode
            string strRequestData = Core.CreateLinkStringUrlencode(sPara, code);

            return strRequestData;
        }

        /// <summary>
        /// ���������Ա�HTML��ʽ���죨Ĭ�ϣ�
        /// </summary>
        /// <param name="sParaTemp">�����������</param>
        /// <param name="strMethod">�ύ��ʽ������ֵ��ѡ��post��get</param>
        /// <param name="strButtonValue">ȷ�ϰ�ť��ʾ����</param>
        /// <returns>�ύ��HTML�ı�</returns>
        public static string BuildRequest(SortedDictionary<string, string> sParaTemp, string strMethod, string strButtonValue)
        {
            //�������������
            Dictionary<string, string> dicPara = new Dictionary<string, string>();
            dicPara = BuildRequestPara(sParaTemp);

            StringBuilder sbHtml = new StringBuilder();

            sbHtml.Append("<form id='alipaysubmit' name='alipaysubmit' action='" + GATEWAY_NEW + "_input_charset=" + _input_charset + "' method='" + strMethod.ToLower().Trim() + "'>");

            foreach (KeyValuePair<string, string> temp in dicPara)
            {
                sbHtml.Append("<input type='hidden' name='" + temp.Key + "' value='" + temp.Value + "'/>");
            }

            //submit��ť�ؼ��벻Ҫ����name����
            sbHtml.Append("<input type='submit' value='" + strButtonValue + "' style='display:none;'></form>");

            sbHtml.Append("<script>document.forms['alipaysubmit'].submit();</script>");

            return sbHtml.ToString();
        }


        /// <summary>
        /// ����������ģ��Զ��HTTP��POST����ʽ���첢��ȡ֧�����Ĵ�����
        /// </summary>
        /// <param name="sParaTemp">�����������</param>
        /// <returns>֧����������</returns>
        public static string BuildRequest(SortedDictionary<string, string> sParaTemp)
        {
            Encoding code = Encoding.GetEncoding(_input_charset);

            //��������������ַ���
            string strRequestData = BuildRequestParaToString(sParaTemp,code);

            //������ת�������������ֽ���������
            byte[] bytesRequestData = code.GetBytes(strRequestData);

            //���������ַ
            string strUrl = GATEWAY_NEW + "_input_charset=" + _input_charset;

            //����Զ��HTTP
            string strResult = "";
            try
            {
                //����HttpWebRequest������Ϣ
                HttpWebRequest myReq = (HttpWebRequest)HttpWebRequest.Create(strUrl);
                myReq.Method = "post";
                myReq.ContentType = "application/x-www-form-urlencoded";

                //���POST����
                myReq.ContentLength = bytesRequestData.Length;
                Stream requestStream = myReq.GetRequestStream();
                requestStream.Write(bytesRequestData, 0, bytesRequestData.Length);
                requestStream.Close();

                //����POST�������������
                HttpWebResponse HttpWResp = (HttpWebResponse)myReq.GetResponse();
                Stream myStream = HttpWResp.GetResponseStream();

                //��ȡ������������Ϣ
                StreamReader reader = new StreamReader(myStream, code);
                StringBuilder responseData = new StringBuilder();
                String line;
                while ((line = reader.ReadLine()) != null)
                {
                    responseData.Append(line);
                }

                //�ͷ�
                myStream.Close();

                strResult = responseData.ToString();
            }
            catch (Exception exp)
            {
                strResult = "����"+exp.Message;
            }

            return strResult;
        }

        /// <summary>
        /// ����������ģ��Զ��HTTP��POST����ʽ���첢��ȡ֧�����Ĵ����������ļ��ϴ�����
        /// </summary>
        /// <param name="sParaTemp">�����������</param>
        /// <param name="strMethod">�ύ��ʽ������ֵ��ѡ��post��get</param>
        /// <param name="fileName">�ļ�����·��</param>
        /// <param name="data">�ļ�����</param>
        /// <param name="contentType">�ļ���������</param>
        /// <param name="lengthFile">�ļ�����</param>
        /// <returns>֧����������</returns>
        public static string BuildRequest(SortedDictionary<string, string> sParaTemp, string strMethod, string fileName, byte[] data, string contentType, int lengthFile)
        {

            //�������������
            Dictionary<string, string> dicPara = new Dictionary<string, string>();
            dicPara = BuildRequestPara(sParaTemp);

            //���������ַ
            string strUrl = GATEWAY_NEW + "_input_charset=" + _input_charset;

            //����HttpWebRequest������Ϣ
            HttpWebRequest request = (HttpWebRequest)HttpWebRequest.Create(strUrl);
            //��������ʽ��get��post
            request.Method = strMethod;
            //����boundaryValue
            string boundaryValue = DateTime.Now.Ticks.ToString("x");
            string boundary = "--" + boundaryValue;
            request.ContentType = "\r\nmultipart/form-data; boundary=" + boundaryValue;
            //����KeepAlive
            request.KeepAlive = true;
            //�����������ݣ�ƴ�ӳ��ַ���
            StringBuilder sbHtml = new StringBuilder();
            foreach (KeyValuePair<string, string> key in dicPara)
            {
                sbHtml.Append(boundary + "\r\nContent-Disposition: form-data; name=\"" + key.Key + "\"\r\n\r\n" + key.Value + "\r\n");
            }
            sbHtml.Append(boundary + "\r\nContent-Disposition: form-data; name=\"bptb_pay_file\"; filename=\"");
            sbHtml.Append(fileName);
            sbHtml.Append("\"\r\nContent-Type: " + contentType + "\r\n\r\n");
            string postHeader = sbHtml.ToString();
            //�����������ַ������͸��ݱ����ʽת�����ֽ���
            Encoding code = Encoding.GetEncoding(_input_charset);
            byte[] postHeaderBytes = code.GetBytes(postHeader);
            byte[] boundayBytes = Encoding.ASCII.GetBytes("\r\n" + boundary + "--\r\n");
            //���ó���
            long length = postHeaderBytes.Length + lengthFile + boundayBytes.Length;
            request.ContentLength = length;

            //����Զ��HTTP
            Stream requestStream = request.GetRequestStream();
            Stream myStream;
            try
            {
                //�����������������
                requestStream.Write(postHeaderBytes, 0, postHeaderBytes.Length);
                requestStream.Write(data, 0, lengthFile);
                requestStream.Write(boundayBytes, 0, boundayBytes.Length);
                HttpWebResponse HttpWResp = (HttpWebResponse)request.GetResponse();
                myStream = HttpWResp.GetResponseStream();
            }
            catch (WebException e)
            {
                return e.ToString();
            }
            finally
            {
                if (requestStream != null)
                {
                    requestStream.Close();
                }
            }

            //��ȡ֧�������ش�����
            StreamReader reader = new StreamReader(myStream, code);
            StringBuilder responseData = new StringBuilder();

            String line;
            while ((line = reader.ReadLine()) != null)
            {
                responseData.Append(line);
            }
            myStream.Close();
            return responseData.ToString();
        }

        /// <summary>
        /// ���ڷ����㣬���ýӿ�query_timestamp����ȡʱ����Ĵ�����
        /// ע�⣺Զ�̽���XML������IIS�����������й�
        /// </summary>
        /// <returns>ʱ����ַ���</returns>
        public static string Query_timestamp()
        {
            string url = GATEWAY_NEW + "service=query_timestamp&partner=" + Config.Partner + "&_input_charset=" + Config.Input_charset;
            string encrypt_key = "";

            XmlTextReader Reader = new XmlTextReader(url);
            XmlDocument xmlDoc = new XmlDocument();
            xmlDoc.Load(Reader);

            encrypt_key = xmlDoc.SelectSingleNode("/alipay/response/timestamp/encrypt_key").InnerText;

            return encrypt_key;
        }
    }
}