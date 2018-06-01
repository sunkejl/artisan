document object model
 
节点类型
element_node html标签 元素节点 firstElementChild
text_node 文字
 
创建节点
element=document.createElement(tagName)
 
element.textContent=123 获取文本内容
等价于element.innerText
 
element.appendChild('ul');追加节点
 
li=document.getElementById;
ul=
ement.insertBefore (li,ul.firstChild)
 
innerHTML 所有Html元素
 
input maxlength="10"
 
读取属性
var attribute=element.getAttribute(attributeName);
设置属性
input.setAttribute("value","123");
button.disable=true;属性访问符设置
 
dataset
自定义数据属性
data-id="123" data-name="abc"
var data=user.dataset;
console.log(data.id);
 
 
设置css属性 内嵌样式表
element.style.borderColor="red" |单个属性设定
element.style.cssText="border-color:red;color:red";
 
更新class来改变属性
element.className+="invalid";
 
更换样式表
element.href="skin.css"
 
window.getComputedStyle().color;可以获取外部样式表样式
 
DOM事件
事件流 一般 capture phase =>target phase => bubble phase
 
事件注册
var elem=document.getElementById();
var clickHandler=function(){}
elem.addEventLister('click',clickHander,false)         ==          onclick=clickHander
 
取消事件注册
elem.removeEventListener('click',clickHandle,false)
 
事件对象 event就事件对象 记录了当前鼠标位置等等
var clickHandler=function(event){}
 
事件对象 属性
type 有click 等等
target 
currentTarget 
方法 
stopPropagation 阻止冒泡
preventDefault 阻止默认行为
 
事件分类
MouseEvent
 
FocusEvent
blur 失去焦点
focus 获得焦点
 
InputEvent
beforeinput 触发时内容还没输入
input
 
KeyboardEvent
keydown
keyup
 
window
load
unload 关闭当前页面
error
abort
 
image 事件
load 
error
abort
当图片加载失败时 <image src="..." onerror="this.src='http://www....png'">
 
UIevent
resize 窗口大小发生改变
scroll 滚动