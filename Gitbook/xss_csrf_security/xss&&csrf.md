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
