using System.Web;
using System.Text;
using System.Security.Cryptography;
using System.IO;
using System.Net;
using System;
using System.Collections.Generic;
using System.Xml;

namespace Com.Alipay
{
    /// <summary>
    /// ������Core
    /// ���ܣ�֧�����ӿڹ��ú�����
    /// ��ϸ������������֪ͨ���������ļ������õĹ��ú������Ĵ����ļ�������Ҫ�޸�
    /// �汾��3.3
    /// �޸����ڣ�2012-07-05
    /// ˵����
    /// ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
    /// �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
    /// </summary>
    public class Core
    {

        public Core()
        {
        }

        /// <summary>
        /// ��ȥ�����еĿ�ֵ��ǩ������������ĸa��z��˳������
        /// </summary>
        /// <param name="dicArrayPre">����ǰ�Ĳ�����</param>
        /// <returns>���˺�Ĳ�����</returns>
        public static Dictionary<string, string> FilterPara(SortedDictionary<string, string> dicArrayPre)
        {
            Dictionary<string, string> dicArray = new Dictionary<string, string>();
            foreach (KeyValuePair<string, string> temp in dicArrayPre)
            {
                if (temp.Key.ToLower() != "sign" && temp.Key.ToLower() != "sign_type" && temp.Value != "" && temp.Value != null)
                {
                    dicArray.Add(temp.Key, temp.Value);
                }
            }

            return dicArray;
        }

        /// <summary>
        /// ����������Ԫ�أ����ա�����=����ֵ����ģʽ�á�&���ַ�ƴ�ӳ��ַ���
        /// </summary>
        /// <param name="sArray">��Ҫƴ�ӵ�����</param>
        /// <returns>ƴ������Ժ���ַ���</returns>
        public static string CreateLinkString(Dictionary<string, string> dicArray)
        {
            StringBuilder prestr = new StringBuilder();
            foreach (KeyValuePair<string, string> temp in dicArray)
            {
                prestr.Append(temp.Key + "=" + temp.Value + "&");
            }

            //ȥ������һ��&�ַ�
            int nLen = prestr.Length;
            prestr.Remove(nLen-1,1);

            return prestr.ToString();
        }

        /// <summary>
        /// ����������Ԫ�أ����ա�����=����ֵ����ģʽ�á�&���ַ�ƴ�ӳ��ַ��������Բ���ֵ��urlencode
        /// </summary>
        /// <param name="sArray">��Ҫƴ�ӵ�����</param>
        /// <param name="code">�ַ�����</param>
        /// <returns>ƴ������Ժ���ַ���</returns>
        public static string CreateLinkStringUrlencode(Dictionary<string, string> dicArray, Encoding code)
        {
            StringBuilder prestr = new StringBuilder();
            foreach (KeyValuePair<string, string> temp in dicArray)
            {
                prestr.Append(temp.Key + "=" + HttpUtility.UrlEncode(temp.Value, code) + "&");
            }

            //ȥ������һ��&�ַ�
            int nLen = prestr.Length;
            prestr.Remove(nLen - 1, 1);

            return prestr.ToString();
        }

        /// <summary>
        /// д��־��������ԣ�����վ����Ҳ���ԸĳɰѼ�¼�������ݿ⣩
        /// </summary>
        /// <param name="sWord">Ҫд����־����ı�����</param>
        public static void LogResult(string sWord)
        {
            string strPath = HttpContext.Current.Server.MapPath("log");
            strPath = strPath + "\\" + DateTime.Now.ToString().Replace(":", "") + ".txt";
            StreamWriter fs = new StreamWriter(strPath, false, System.Text.Encoding.Default);
            fs.Write(sWord);
            fs.Close();
        }

        /// <summary>
        /// ��ȡ�ļ���md5ժҪ
        /// </summary>
        /// <param name="sFile">�ļ���</param>
        /// <returns>MD5ժҪ���</returns>
        public static string GetAbstractToMD5(Stream sFile)
        {
            MD5 md5 = new MD5CryptoServiceProvider();
            byte[] result = md5.ComputeHash(sFile);
            StringBuilder sb = new StringBuilder(32);
            for (int i = 0; i < result.Length; i++)
            {
                sb.Append(result[i].ToString("x").PadLeft(2, '0'));
            }
            return sb.ToString();
        }

        /// <summary>
        /// ��ȡ�ļ���md5ժҪ
        /// </summary>
        /// <param name="dataFile">�ļ���</param>
        /// <returns>MD5ժҪ���</returns>
        public static string GetAbstractToMD5(byte[] dataFile)
        {
            MD5 md5 = new MD5CryptoServiceProvider();
            byte[] result = md5.ComputeHash(dataFile);
            StringBuilder sb = new StringBuilder(32);
            for (int i = 0; i < result.Length; i++)
            {
                sb.Append(result[i].ToString("x").PadLeft(2, '0'));
            }
            return sb.ToString();
        }
    }
}