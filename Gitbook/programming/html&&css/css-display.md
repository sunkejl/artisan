display 设置元素的显示方式 
block  div p h1-h6 ul form 默认是block 块级元素 是换行显示的 
 
inline 默认宽度是内容的宽度 不可设置宽高  行级元素 同行显示   span a label cite em
 
inline-block  默认宽度为内容宽度 可以设置宽高的 同行显示 整块换行 input textarea select button
 
none  设置元素不显示   | visibility:hidden  隐藏 位置还在
 
 
div margin:0 auto 水平居中
 
position 定位 元素叠加
设置定位方式 
relative 相对定位 参照物是元素本身  
absolute 绝对定位 脱离文档流 默认是内容宽度 参照物是第一个根元素
fixed   固定定位 脱离文档流    参照物是视窗  定在窗口上方 无论滚动条滚动
 
遮罩效果 fixed top:0left:0 z-index:999 width:100% height:100%
 
 
 
top right bottom left  距离边缘的距离
z-index  1 0 -1 
 
 
float    块级元素同行显示 在文档流中  
 
clear    both left right 应用于float的后续元素 块级元素
 
display  flex 弹性布局
 
flex-direction row row-reverse column column-reverse 
 
flex-wrap  wrap 换行   
 
flex-flow 
 
order 0 1 2
 
flex-grow 分配剩余空间比例
 
flex-shrink 分配负的剩余空间
 
justify-content  主轴对齐方式
 
align-items   
 
align-self 
 
align-content  辅轴 对齐方式
