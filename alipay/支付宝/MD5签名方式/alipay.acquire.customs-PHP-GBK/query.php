<?php
/* *
 * ���ܣ�֧�������ؽӿڽӿڵ������ҳ��
 * �汾��3.3
 * ���ڣ�2012-07-23
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>֧�������ؽӿڽӿ�</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style>
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
	font-family:'����';
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
<body text=#000000 bgColor=#ffffff leftMargin=0 topMargin=4>
	<div id="main">
		<div id="head">
            <dl class="alipay_link">
                <a target="_blank" href="http://www.alipay.com/"><span>֧������ҳ</span></a>|
                <a target="_blank" href="https://b.alipay.com/home.htm"><span>�̼ҷ���</span></a>|
                <a target="_blank" href="http://help.alipay.com/support/index_sh.htm"><span>��������</span></a>
            </dl>
            <span class="title">֧�������ؽӿڿ���ͨ��</span>
		</div>
        <div class="cashier-nav">
            <ol>
				<li class="current">1��ȷ����Ϣ ��</li>
				<li>2�����ȷ�� ��</li>
				<li class="last">3��ȷ�����</li>
            </ol>
        </div>
        <form name="alipayment" action="alipayapi.php" method="post" target="_blank">
		<input type="hidden" name="WIDapi_type" value="query" />
            <div id="body" style="clear:left">
                <dl class="content">
                    <dt>�����������</dt>
                    <dd>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDout_request_nos" />
                        <span></span>
                    </dd>     
					<dt></dt>
                    <dd>
                        <span class="new-btn-login-sp">
                            <button class="new-btn-login" type="submit" style="text-align:center;">ȷ ��</button>
                        </span>
                    </dd>
                </dl>
            </div>
		</form>
        <div id="foot">
			<ul class="foot-ul">
				<li><font class="note-help">����������ȷ�ϡ���ť������ʾ��ͬ��ôε�ִ�в����� </font></li>
				<li>
					֧������Ȩ���� 2011-2015 ALIPAY.COM 
				</li>
			</ul>
		</div>
	</div>
</body>
</html>