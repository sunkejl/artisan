decoupled(解耦)

design patterns are primarily based on the following principles of object orientated design.
Program to an interface not an implementation
Favor object composition over inheritance


###Creational Patterns
These design patterns provide a way to create objects while hiding the creation logic, rather than instantiating objects directly using new operator.
This gives program more flexibility in deciding which objects need to be created for a given use case.
Factory pattern | Singleton(单例) pattern |  Prototype(原型) pattern



###Structural Patterns
These design patterns concern class and object composition.
Concept of inheritance is used to compose interfaces and define ways to compose objects to obtain new functionalities.
Adapter(适配器) pattern | Bridge(桥接) pattern | Filter(过滤器) pattern | Facade(外观) pattern | Flyweight(享元) pattern | Proxy(代理) pattern

###Behavioral Patterns
These design patterns are specifically concerned with communication between objects.
chainOfResponsibility(责任链) pattern | Command(命令) pattern | Interpreter(解释器) pattern |Mediator(中介者) pattern | Memento(备忘录) Pattern
| Observer(观察者) pattern | Null Object(空对象) pattern |Strategy(策略) pattern |Template(模板) pattern | Visitor(访问者) Pattern | MVC Pattern

创建型模式

工厂类 创建你需要的对象的类 后期更改 只需要更改工厂类中的代码

单例模式 保证在整个请求的声明周期内只有一个实例存在,应用场景是，当我们有一个全局的对象（比如配置类）或一个共享的资源（比如事件队列）时。

原型模式 通过复制已经存在的实例，而不是新建实例



结构型模式

适配器  通过适配器让不兼容的类一起工作

桥接  把对象的行为，特征分离开 各自可以独立变化

过滤器  对一组对象 用不同的方式进行校验

外观  对外提供统一的接口 把具体的实现隐藏起来

享元  减少对象的创建 把已创建的对象保存起来 供下次使用

代理  代理类作为其他类的接口提供服务


行为型模式




参考
https://zh.wikipedia.org/wiki/%E8%AE%BE%E8%AE%A1%E6%A8%A1%E5%BC%8F
http://www.tutorialspoint.com/design_pattern/
