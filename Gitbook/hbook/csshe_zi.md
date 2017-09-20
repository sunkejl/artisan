# css_盒模型

[课程地址](http://mooc.study.163.com/learn/NEU-1000054000?tid=2001219007#/learn/content?type=detail&id=2001408131&cid=2001395292)

https://developer.mozilla.org/zh-CN/docs/Web/CSS/CSS_Box_Model

每个盒子都有 边距 边框 填充 内容 四个属性

margin border padding content  

width length percentage 只对块级元素设置宽度 宽度   行级元素不能设置宽度 高度

max-width min-width

height 和宽度一样  html.body{height:100%;}

padding T R B L 

margin  T R B L


相邻元素的外边距 会合并 取最大的

margin:0 auto  上下是0 左右auto  (auto 自动分配空间) 水平居中

border: 1px dotted red

border-radius 圆角边框 最多可以设置8个值 前四个为水平方向的半径 后四个为垂直方向的半径

border-radius:50%; 圆

overflow: visible (超出还是显示 默认的)|hidden|scroll|auto

content-box width height设置的是内容盒子的宽高
 
border-box 宽高通过box-sizing:content-box | border-box 来设置 改变

box-shadow 外阴影  4px 6px 3px 3px red; 水平偏移 垂直偏移 模糊半径 阴影大小  负值 左上方阴影
内阴影 加inset 

outline 不占空间 border外 描边

关于CSS属性的浏览器兼容性 http://caniuse.com/




