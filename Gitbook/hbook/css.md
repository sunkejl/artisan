# css 选择器

Cascading Style Sheet  层叠样式表

<link rel="stylesheet" href="base.css">

<style></style>

style=""; 内嵌样式



###CSS选择器





属性选择器 [disable]{color:blue;}  [type=button]{color:blue;}
h1[class]{}
img[alt]{}
a[href][title]{} 多属性选择器
根据属性值选择
a[href="http://.."]{}
p[class~="warning"]{}部分属性选择器 含有这个属性 属性之间用空格分开

id选择器 #idname{color:blue;}其实就是属性选择器 [id=idname]{color:blue;}
 
伪类选择器
a:link{color:gray}  a:visited{color:red;} a:hover{color:green;} a:active{color:orange;}

li:nth-child(even){color:red} 奇偶相见的列表格式

伪元素选择器 俩个冒号
p:first-letter{} 块级元素首字母的样式
p:first-line{} 第一个文本行

::berfore{content:"before"} ::after{content:"after"}
::selection{color:red} 用于被用户选中内容

选择器分组 使用，分割 h1,h2,h3{} h1 h2 h3 并列

 组合选择器
 后代选择器 
 .main h2{color:red;}  main里面所有h2
 
 子选择器
  .main h2{color:red;}  main里面第一级的h2
  选择子元素
  p>a 
 
 p.warning{} p标签中含有waring的类 可以忽略通配选择器*.warning{} 写成.warning{}
  
相邻兄弟选择器
h2+p{color:red;} 和h2相邻的p元素
通用兄弟选择器
h2~p{color:red} h2后面所有的兄弟节点 前面的兄弟不会被选中

选择器分组 逗号分开
h1,h2,h3{color:gary;}

CSS继承
body{font-family:"Microsoft Yahei";} 
能自动继承的属性 color font text-align list-style  ... 文档属性inherited:yes
不是所有的属性都能继承 非继承属性background border position ...文档属性inherited:no

CSS优先级 依次降低
a 行内样式
b ID选择器
c 类 伪类和属性选择器
d 标签选择器和伪元素选择器


 CSS层叠
 优先级一样的后面的覆盖前面的
 优先级大的胜出

改变优先级的方法
1改变位置


2提升选择器的优先级
比如 
<p class="tip special">
p.special{color:red} 比.tip{color:red}高


3 加!important  一般最后才用
.tip{color:blue !important;}

