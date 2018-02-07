using System;
using System.Data;
using System.Configuration;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Collections.Generic;
using System.Text;
using System.IO;
using System.Xml;
using Com.Alipay;

/// <summary>
/// ���ܣ����ؽӿڽ���ҳ
/// �汾��3.3
/// ���ڣ�2012-07-05
/// ˵����
/// ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
/// �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
/// 
/// /////////////////ע��///////////////////////////////////////////////////////////////
/// ������ڽӿڼ��ɹ������������⣬���԰��������;�������
/// 1���̻��������ģ�https://b.alipay.com/support/helperApply.htm?action=consultationApply�����ύ���뼯��Э�������ǻ���רҵ�ļ�������ʦ������ϵ��Э�����
/// 2���̻��������ģ�http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9��
/// 3��֧������̳��https://openclub.alipay.com/��
/// 
/// �������ʹ����չ���������չ���ܲ�������ֵ��
/// </summary>
public partial class _query : System.Web.UI.Page 
{
    protected void Page_Load(object sender, EventArgs e)
    {
    }

    protected void BtnAlipay_Click(object sender, EventArgs e)
    {
        ////////////////////////////////////////////�������////////////////////////////////////////////

        //���������
        string out_request_nos = WIDout_request_nos.Text.Trim();

        


        ////////////////////////////////////////////////////////////////////////////////////////////////

        //������������������
        SortedDictionary<string, string> sParaTemp = new SortedDictionary<string, string>();
        sParaTemp.Add("partner", Config.Partner);
        sParaTemp.Add("_input_charset", Config.Input_charset.ToLower());
        sParaTemp.Add("service", "alipay.overseas.acquire.customs.query");
        sParaTemp.Add("out_request_nos", out_request_nos);


        //��������
        string sHtmlText = Submit.BuildRequest(sParaTemp,"get","");
        Response.Write(sHtmlText);

        //������������̻���ҵ���߼��������

        //�������������ҵ���߼�����д�������´�������ο�������

        //XmlDocument xmlDoc = new XmlDocument();
        //try
        //{
        //    xmlDoc.LoadXml(sHtmlText);
        //    string strXmlResponse = xmlDoc.SelectSingleNode("/alipay").InnerText;
        //    Response.Write(strXmlResponse);
        //}
        //catch (Exception exp)
        //{
        //    Response.Write(sHtmlText);
        //}

        //�������������ҵ���߼�����д�������ϴ�������ο�������

    }
}