提交 编码方式enctype
application/x-www-f
multipart/form-data  文件变成字节流
text/plan
 
表单提交 可以ajax 和iframe
 
form.submit()
onsubmit 提交前验证
 
 
autocomplete 表单输入记住历史 可选择
 
inPut 本地图片预览
onchange
accept
multiple
files
 
select optgroup 分组 multiple多选
 
级联下拉选择器
onchange
remove
add
 
textarea @输入提示
先拿到selectionStart的位置
获取element.selectionStart-1 的字符 如果==@ 增加列表
 
 
datalist元素
datalist元素规定输入域的选项列表。
列表是通过datalist内的option元素创建的。如需把datalist绑定到输入域，请用输入域的list 属性引用datalist的id。例如：
<!DOCTYPE HTML>
<html>
<body>
<form action="demo_form.php" method="get">
  <input type="url" list="url_list" name="link" />
  <datalist id="url_list">
    <option label="W3School" value="http://www.w3school.com.cn" />
    <option label="Google" value="http://www.google.com" />
    <option label="Microsoft" value="http://www.microsoft.com" />
  </datalist>
  <input type="submit" />
</form>
</body>
</html>