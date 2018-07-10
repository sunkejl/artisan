# HTML
hyper text markup language
<!DOCTYPE html> 文档声明 首行 顶格 新的h5标准
文档头部 
文档主体


[html标签图](http://odbta1gf7.bkt.clouddn.com/html.PNG)


头部<header>     
导航<nav>     
侧边栏<aside>    
文章 独立的内容<article> <section>            

标题h1-h6 <h1>最大

div#nav>ul>li     

 
meta charset="utf-8"//写在第一行 字符编码
 
meta name="viewport" content="width=device-width"//手机浏览器
 
link 俩个
1 favicon.ico  不加浏览器会默认读取根目录下的图标 
2 css

**文本相关标签**
段落用p标签

a 标签加title 当鼠标Hover上时显示 

a href="#id"                                   
打开到对应的ID位置  锚点 target="_self"当前窗口 | "_blank"新窗口           

a href="mailto:sunke@huou.com?cc=admin@**.com&subject=***&body=...."  打开邮箱

a href="tel:13612345678"                打开电话

强调 em斜体  strong粗体  strong比em更强

格式化 <b>粗体 <i>斜体

span 无语意 通过class编辑样式

br 换行

引用 <cite>斜体 书名   <q> 比如引用别的文章内容  加上引号

代码 code
 
 
 **组合内容标签**
 h5之前 没header 用div 做容器
 
 <pre> 保留空格 换行
 <blockquote>大块引用
 
html语义化
h heading 标题
ul unordered lists 
ol ordered lists
li list items
 
ol   有序列表 type="a" start="2" 以abc,从b开始
 
ul   无序列表
 
dl      自定义列表
dt列表项 dd类表内容 一个dt 多个dd   默认会有缩进
 
 
***嵌入内容*
<img> alt 图片加载不出来时显示的文字
<iframe src=""> </frame> 嵌入页面 比如页面播放器 切换页面不刷新
object embed 嵌入外部资源 flash播放器

 
video 
可以加多个视频 source 浏览器自己选择合适的视频播放
标签 可控制播放器封面图poster 进度条controls 字幕 浏览选择支持的视频播放 autoplay 自动播放 循环播放 加loop属性

audio 和video 类似
 
 
canvas 基于像素 提供绘制函数 复杂的  或者 svg 矢量 图形       嵌入图像
 
map     或者 area     热点区域?? [图片示例](http://odbta1gf7.bkt.clouddn.com/map.PNG)
 
 
**表格标签**
table [图片实例](http://odbta1gf7.bkt.clouddn.com/form.PNG)
表格里的标题
caption
 
表格头部放在thead里面

表格内容放在tbody
每一行用tr标签标识 
表头单元格 可以用th标识 也可以在每一列的第一行

表格尾部放在tfoot

跨栏colspan=3
跨行rowspan=2
 
**form ** 
[图片示例](http://odbta1gf7.bkt.clouddn.com/form_action.PNG)
action="" method="post"
分区  fieldset
fieldset =>legend 分区标题
input 默认text 属性
提交type="submit" 重置type="reset"  更好的显示 可以用button标签 <button type="submit">
optgroup 对select 下面option分组  默认选中加selected 
label for属性的值 对应下一个输入框的id 提示信息
placeholder 显示提示信息
readonly  只读属性
hidden    隐藏属性
选中加 checked 即可 不需要加等号 不能选中加display  
 
H5新的input type类型 如下 会自动检验类型
email
url
number
tel
tel
search
range 范围数据
color
date picker(date,month,week,time,datetime,datetime-local)

——————————————————————————————————

语义化的作用
为了SEO优化 search engine optimization

实体字符
&nbsp；&#160； 空格 浏览器会把多个空格当作一个空格来显示

&quot; %#34;  引号 

> &gt;
< &lt;

版权符号 &copy;

&amp; &







 
 