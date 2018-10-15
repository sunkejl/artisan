正则
/123/.test('123'); test 只要字符串里包含前面的正则
 
锚点
^起始位置
$结尾位置
 
字符类
[abc] [^0-9] 非
[0-9]
[a-z]
.任意字符
\d [0-9]        \D 取反
\s 空白符            \S
\w [A-Za-z0-9]  \W
 
量词 
出现的次数
{m,n} m-n次
* {0,}
? {0,1}
+ {1,}
 
转义
\
 
多选分支
/thi(c|n)k/
 
捕获
()
 
获取匹配里的每一个值
var url='https://segmentfault.com/n/1330000005595475/edit';
var reg=/  /;
var arr= url.match(reg);
var protocol=arr[1];
var pathname=arr[3];
 
var str="ada1,2"
str.replace(/(\d+)/g,'$1.00'); g 全局 $1保存查到的元素
