# css_文本

[课程地址](http://mooc.study.163.com/learn/NEU-1000054000?tid=2001251001#/learn/content?type=detail&id=2001491007)

font-size :length | percentage
font-size :12px;
font-size :2em;  
font-size :200%; 参照物 父元素的字体大小

font-family 
font-family:arial; 直接设置字体 font-family:arial,Verdana,sans-serif; 多个值

font-weight:normal | bold 

font-style:normal | italic（斜体 一般用这个）| oblique(倾斜 字体没斜体 强制倾斜 效果不太好 如果有斜体 还是斜体)

line-height : normal (不固定 浏览器决定)|number|length|percentage
line-height:40px;
line-height:3em; 1em当前字体的大小
line-height:300%;
line-height:3; 直接继承 3×里面元素的行高、

font: 简写 font-size 和font-family 必填项

color:red;
color:#ff0000;
color:rgb(255,0,0);
color:rgba(255,0,0,1);a半透明 1为不透明 0为透明 0.5为0.5的透明度
color:transparent;全透明

text-align : left right center justify(俩端对其) 

virtical-align 垂直对齐 baseline （基线）  sub(下标) super（上标） top(最高点) text-top middle bottom（底部） text-botton <percentage> <length>（20px 以baseline往上走20px 往下 写负号）

text-indent 首行缩进  :2em(em以文字大小为参照物) | 10px(不常用) |percentage 容器的宽度 | 
-2em 反方向缩进  -9999px 整行不见

white-space 设置换行 要不要保留 是否自动换行 空格要不要合并
normal(浏览器决定)  nowrap （不换行） pre(换行保留 空格和tabs 保留 没换行符不换行 保留代码格式)
pre-wrap(nowrap 的基础上 自动换行 常用) pre-line(只保留换行 自动换行 空格合并)


word-wrap 单词换行 normal(长单词超出) | break-word (长单词自动换行) 

word-break:  normal  kepp-all(单词不做break)  break-all（单词在最后换行输出）

text-shadow none | <length{2,3}  <color>> 
:1px 2px #f00  x轴 y轴偏移 像素 红色阴影
:1px 2px 3px #f00  x轴 y轴偏移 像素 模糊半径  红色阴影

text-decoration  none| underline | overline | line-through  可以写多个下划线 上划线 

text-overflow clip（默认） | ellipsis (加点点点) 与overflow:hidden;white-space:nowrap 与这俩个一起使用 

cursor 定义鼠标形状 url(自定义图片) pointer（手） auto default


inherit 强制继承父元素的值     文本属性都可以font-size:inherit 强制和父元素一样 不关心父元素是什么




