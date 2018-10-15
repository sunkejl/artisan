https://legacy.gitbook.com/book/llh911001/mostly-adequate-guide-chinese/details

https://github.com/MostlyAdequate/mostly-adequate-guide

http://taobaofed.org/blog/2017/03/16/javascript-functional-programing/

http://www.ruanyifeng.com/blog/2012/04/functional_programming.html


实参 形参
可以不传形参 通过argument去取
 
参数为原始类型 int string 布尔 传递的值不改变 add(a);
 
参数为对象类型 是引用传递 值改变
 
函数作用域
 
如果函数内没声明变量 对函数外变量改变
 
构造函数 
var p= new Point(1,2); 相当于return this
 
Point.prptpyype.move=function(){} 原型属性 隐藏属性
 
 
 
函数声明   函数调用模式this指向 全局对象
function add(){
}
 
函数表达式  方法调用模式 this 指向调用者
var add=function(){
}
 
函数实例化 |不常用 构造函数调用模式 this 指向被构造的对象
var add= new Function()
 
js是脚本语言 不需要编译
 
执行前 会预解析
 
函数声明 会被与解析要顶部 ，其他不会
 
俩个相同的函数声明 只有最后一个有效
 
apply(call)调用模式
this 指向第一个参数
 
函数的传递
 
按值传递   原始类型
 
按引用传递  并没有按类型是这种方式
 
按共享传递 对象类型参数的传递模式 获取到的是副本
 
闭包 colosure
函数内部子函数用到了父函数的变量
下面这个匿名函数
(function(){
var a=1231;
(function(){
console.log(a);
debugger;
})()
})();
保存函数的执行状态
封装
性能优化 不需要保存状态的函数放到闭包里
 
 
 