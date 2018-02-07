<%@ Page Language="C#" AutoEventWireup="true" CodeFile="query.aspx.cs" Inherits="_query" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
    <title>֧�������ز�ѯ�ӿ�</title>
    <style type="text/css">
*{
	margin:0;
	padding:0;
}
ul,ol{
	list-style:none;
}
.title{
    color: #ADADAD;
    font-size: 14px;
    font-weight: bold;
    padding: 8px 16px 5px 10px;
}
.hidden{
	display:none;
}

.new-btn-login-sp{
	border:1px solid #D74C00;
	padding:1px;
	display:inline-block;
}

.new-btn-login{
    background-color: #ff8c00;
	color: #FFFFFF;
    font-weight: bold;
	border: medium none;
	width:82px;
	height:28px;
}
.new-btn-login:hover{
    background-color: #ffa300;
	width: 82px;
	color: #FFFFFF;
    font-weight: bold;
    height: 28px;
}
.bank-list{
	overflow:hidden;
	margin-top:5px;
}
.bank-list li{
	float:left;
	width:153px;
	margin-bottom:5px;
}

#main{
	width:750px;
	margin:0 auto;
	font-size:14px;
	font-family:'΢���ź�';
}
#logo{
	background-color: transparent;
    background-image: url("images/new-btn-fixed.png");
    border: medium none;
	background-position:0 0;
	width:166px;
	height:35px;
    float:left;
}
.red-star{
	color:#f00;
	width:10px;
	display:inline-block;
}
.null-star{
	color:#fff;
}
.content{
	margin-top:5px;
}

.content dt{
	width:160px;
	display:inline-block;
	text-align:right;
	float:left;
	
}
.content dd{
	margin-left:100px;
	margin-bottom:5px;
}
#foot{
	margin-top:10px;
}
.foot-ul li {
	text-align:center;
}
.note-help {
    color: #999999;
    font-size: 12px;
    line-height: 130%;
    padding-left: 3px;
}

.cashier-nav {
    font-size: 14px;
    margin: 15px 0 10px;
    text-align: left;
    height:30px;
    border-bottom:solid 2px #CFD2D7;
}
.cashier-nav ol li {
    float: left;
}
.cashier-nav li.current {
    color: #AB4400;
    font-weight: bold;
}
.cashier-nav li.last {
    clear:right;
}
.alipay_link {
    text-align:right;
}
.alipay_link a:link{
    text-decoration:none;
    color:#8D8D8D;
}
.alipay_link a:visited{
    text-decoration:none;
    color:#8D8D8D;
}
</style>
</head>
<body>
    <form id="Form1" runat="server">
        <div id="main">
            <div id="head">
                <dl class="alipay_link">
                    <a target="_blank" href="http://www.alipay.com/"><span>֧������ҳ</span></a>| 
                    <a target="_blank" href="https://b.alipay.com/home.htm"><span>�̼ҷ���</span></a>| 
                    <a target="_blank" href="https://openhome.alipay.com/platform/home.htm"><span>����ƽ̨</span></a>
                </dl>
                <span class="title">֧�������ز�ѯ�ӿڿ���ͨ��</span>
            </div>
            <div class="cashier-nav">
                <ol>
                    <li class="current">1��ȷ����Ϣ ��</li>
                    <li>2�����ȷ�� ��</li>
                    <li class="last">3��ȷ�����</li>
                </ol>
            </div>
            <div id="body" style="clear: left">
                <dl class="content">
                    <dt>��������ţ�</dt>
                    <dd>
                        <span class="null-star">*</span>
                        <asp:TextBox ID="WIDout_request_nos" name="WIDout_request_nos" runat="server"></asp:TextBox>
                        <span></span>
                    </dd>        
                    <dt></dt>
                    <dd>
                        <span class="new-btn-login-sp">
                            <asp:Button ID="BtnAlipay" name="BtnAlipay" class="new-btn-login" Text="ȷ ��" Style="text-align: center;"
                                runat="server" OnClick="BtnAlipay_Click"/></span></dd></dl>
            </div>
            <div id="foot">
                <ul class="foot-ul">
                    <li><font class="note-help">����������ȷ�ϡ���ť������ʾ��ͬ��ôε�ִ�в����� </font></li>
                    <li>֧������Ȩ���� 2011-2016 ALIPAY.COM </li>
                </ul>
            </div>
        </div>
    </form>
</body>
    <script type="text/javascript">
        var out_request_nos = document.getElementById("WIDout_request_nos");
         //�趨ʱ���ʽ������
         Date.prototype.format = function (format) {
               var args = {
                   "M+": this.getMonth() + 1,
                   "d+": this.getDate(),
                   "h+": this.getHours(),
                   "m+": this.getMinutes(),
                   "s+": this.getSeconds(),
               };
               if (/(y+)/.test(format))
                   format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
               for (var i in args) {
                   var n = args[i];
                   if (new RegExp("(" + i + ")").test(format))
                       format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? n : ("00" + n).substr(("" + n).length));
               }
               return format;
           };
           
         out_request_nos.value = 'test' + new Date().format("yyyyMMddhhmmss");
</script>
</html>