XSS

XSS (Cross-Site Scripting)攻击者传入js让打开者执行
That's one of the reasons why using a template engine like Twig, where auto-escaping is enabled by default
```php
printf(htmlspecialchars($input));
```

The htmlspecialchars() may be used in order to prevent XSS related attacks.

用户提交的信息里有链接，导致别人点了跳转，获取到别人浏览器的cookie，从而模拟登录

输出用户输入时加 htmlspecialchars() 过滤


csrf
有人伪造按钮 让有session的用户去点击 提交数据
解决方法加token
页面加载时写入session
表单提交时验证
验证通过 销毁session

csrf
诱导用户点击修改过参数  实现修改的功能
解决方法
验证码
请求中加入随机token  与服务端验证
GET方式不能用于更新资源的操作
POST方式请求加上随机token验证


