decoupled(解耦)

>design patterns are primarily based on the following principles of object orientated design.
Program to an interface not an implementation
用接口而不是实现
Favor object composition over inheritance
用组合而不是继承



###Creational Patterns创建型模式
>These design patterns provide a way to create objects while hiding the creation logic, rather than instantiating objects directly using new operator.
This gives program more flexibility in deciding which objects need to be created for a given use case.
>>Factory pattern | Singleton(单例) pattern |  Prototype(原型) pattern
>工厂模式 创建你需要的对象的类 后期更改 只需要更改工厂类中的代码
>
>单例模式 保证在整个请求的声明周期内只有一个实例存在,应用场景是，当我们有一个全局的对象（比如配置类）或一个共享的资源（比如事件队列）时。
>
>原型模式 通过复制已经存在的实例，而不是新建实例


###Structural Patterns结构型模式
>These design patterns concern class and object composition.
Concept of inheritance is used to compose interfaces and define ways to compose objects to obtain new functionalities.
>>Adapter(适配器) pattern | Bridge(桥接) pattern | Filter(过滤器) pattern | Facade(外观) pattern | Flyweight(享元) pattern | Proxy(代理) pattern
>适配器模式  通过适配器让不兼容的类一起工作
>
>桥接模式  把对象的行为，特征分离开 各自可以独立变化
>
>过滤器模式  对一组对象 用不同的方式进行校验
>
>外观模式  对外提供统一的接口 把具体的实现隐藏起来
>
>享元模式  减少对象的创建 把已创建的对象保存起来 供下次使用
>
>代理模式  代理类作为其他类的接口提供服务


###Behavioral Patterns行为型模式
>These design patterns are specifically concerned with communication between objects.
>>chainOfResponsibility(责任链) pattern | Command(命令) pattern | Interpreter(解释器) pattern |Mediator(中介者) pattern | Memento(备忘录) Pattern
| Observer(观察者) pattern | Null Object(空对象) pattern |Strategy(策略) pattern |Template(模板) pattern | Visitor(访问者) Pattern | MVC Pattern
>责任链模式 解耦一个请求中的发送和接收，每个接收对象含有下一个接受对象,处理的命令对象传递给该链中的下一个处理对象
>
>命令模式 把对象包装起来传给执行的对象像命令一样的执行，命令对象可以把行动(action) 及其参数封装起来，于是这些行动可以被重复多次,取消（如果该对象有实现的话),取消后又再重做
>
>解释器模式 定义语言的语法，并由解释器来解释语言中的语句 常用于sql解析
>
>中介者模式  中间对象处理不同对象间的方法，使达到松散偶合。当某些对象之间的作用发生改变时，不会立即影响其他的一些对象之间的作用，保证这些作用可以彼此独立的变化。
>
>备忘录模式  备忘录对象是一个用来存储另外一个对象内部状态的快照的对象。在不破坏封装的条件下，将一个对象的状态捉住,存储起来，从而可以在将来合适的时候把这个对象还原到存储起来的状态。
>
>观察者模式  在对象间定义一个一对多的联系性，由此当一个对象改变了状态，所有其他相关的对象会被通知并且自动刷新。
>
>空对象模式  通过提供默认对象来避免空引用。
>
>策略模式   对象的某个行为在不同的场景中，该行为有不同的实现。给对象的方法传递不同的对象来实现
>
>模板模式   定义一个抽象类 里面有一些抽象方法 子类继承 从而是子类必须实现这些抽象方法
>
>访问者模式 在对象结构的一次访问过程中，我们遍历整个对象结构, 从而使访问者得以处理对象结构的每一个元素 它把数据结构和作用于结构上的操作之间的耦合解脱开，使得操作集合可以相对自由的演化。

参考
>https://zh.wikipedia.org/wiki/%E8%AE%BE%E8%AE%A1%E6%A8%A1%E5%BC%8F
>http://www.tutorialspoint.com/design_pattern/
