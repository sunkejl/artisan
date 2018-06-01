var car = new Object();
 
var car ={};
 
var car = {
        color : "red",
        run : function(){alert("run")}
};
car.color;     // "red"
car.run();     // alert("run")
car["color"]
car["run"]();
 
delete car.color
 
var num = new Number(123);
num.constructor; 获取对象的构造函数
 
obj.toString()  对象转成字符串
 
obj.valueOf() 获取对象的原始值
 
obj.hasOwenproperty() true | false  查看对象是不是有某个属性 属性是不是通过继承过来的


面向对象 是抽象（类）到具体（具体）
 
原型也是具体  具体到具体
 
1：object.create(对象)
 
2：构造函数 来构造对象
可以用new 来创建对象
function a(){this.log=123;} var b=new a();console.log(b.log);