Bridge
Intent
目的
Decouple an abstraction from its implementation so that the two can vary independently.
解耦一个抽象从它的实现里，使他们俩个可以独立的改变

Also Known As Handle/Body
也称 柄/体（handle/body）模式

Motivation诱因
When an abstraction can have one of several possible implementations,
一个抽象可能有多个实现
the usual way to accommodate them is to use inheritance.
常用的方法是用继承
An abstract class defines the interface to the abstraction,
一个抽象类定义接口
and concrete subclasses implement it in different ways.
 集体的子类通过不同方式实现它

But this approach isn't always flexible enough. 
这种方法不够灵活
Inheritance binds an implementation to the abstraction permanently,
通过继承
which makes it difficult to modify, extend, and reuse abstractions and implementations independently.
 难以修改 扩展 重用 抽象 和 独立的执行

Consider the implementation of a portable Window abstraction in a user interface toolkit.
 实现工具包里的一个窗口
 This abstraction should enable us to write applications that work on both the X Window System and IBM's Presentation Manager (PM), 
 应用需要跑在俩个窗口系统中
 for example. Using inheritance, we could define an abstract class Window and subclasses XWindow and PMWindow that implement the Window interface for the different platforms. 
 通过继承，我们可以定义一个抽象了窗口类和俩个子类 来执行接口用在不同的平台
 But this approach has two drawbacks:
这个方法有俩个缺点
It's inconvenient to extend the Window abstraction to cover different kinds of windows or new platforms.
 不方便继承抽象的窗口去覆盖(代替)不同的窗口或者新的平台
 Imagine an IconWindow subclass of Window that specializes the Window abstraction for icons.
  想象一个窗口图标子类是窗口专门的抽象为了图标
  To support IconWindows for both platforms,
   为了支持图标窗口对应俩个平台
   we have to implement two new classes, XIconWindow and PMIconWindow.
    我们需要实现俩个新类
    Worse, we'll have to define two classes for every kind of window.
     更糟糕的是 我们需要定义俩个类来应对每一种窗口
     Supporting a third platform requires yet another new Window subclass for every kind of window. 
     要支持第三个平台，需要另一个子类来对应所有的窗口
 

It makes client code platform-dependent. 
它使客户端代码 平台依赖
Whenever a client creates a window,
 一个客户端创造了一个窗口
 it instantiates a concrete class that has a specific implementation.
 一个具体的实现
  For example, creating an XWindow object binds the Window abstraction to the X Window implementation, 
  创造一个xWindow对象绑定window抽象
  which makes the client code dependent on the X Window implementation. 
  使得客户端代码依赖xWindow的实现
  This, in turn, makes it harder to port the client code to other platforms. 
 使客户端的代码很难面向别的平台
Clients should be able to create a window without committing to a concrete implementation. 
客户端应该可以创造一个窗口不需要看一个具体的实现
Only the window implementation should depend on the platform on which the application runs.
 
 Therefore client code should instantiate windows without mentioning specific platforms.
 客户端实例化窗口不需要提到具体的平台

The Bridge pattern addresses these problems by putting the Window abstraction and its implementation in separate class hierarchies.
 桥接模式 把窗口的抽象和实现 放在分开的类里
 There is one class hierarchy for window interfaces (Window, IconWindow, TransientWindow) and a separate hierarchy for platform-specific window implementations,  with WindowImp as its root.
 一个类负责窗口接口如图标窗口，临时窗口，一个类用来定义窗口平台
 The XWindowImp subclass, for example, provides an implementation based on the X Window System.

All operations on Window subclasses are implemented in terms of abstract operations from the WindowImp interface. 
This decouples the window abstractions from the various platform-specific implementations.
 从窗口平台声明实现中解耦
 We refer to the relationship between Window and WindowImp as a bridge, 
 window 和windowImp 之间的关系类似一个桥
 because it bridges the abstraction and its implementation, letting them vary independently.
抽象和实现 可以独立的变化

Applicability 适用性

Use the Bridge pattern when you want to avoid a permanent binding between an abstraction and its implementation. 
这个模式可以解决永久的绑定 存在于抽象特征和它的实现执行
This might be the case, for example, when the implementation must be selected or switched at run-time. 
both the abstractions and their implementations should be extensible by subclassing. 
抽象特征和实现都可以通过增加子类来进行扩展
In this case, the Bridge pattern lets you combine联合 the different abstractions and implementations and extend them independently独立地. 

changes in the implementation of an abstraction should have no impact影响 on clients;

that is, their code should not have to be recompiled再编译. 
you want to hide the implementation of an abstraction completely from clients.

Structure



The Bridge pattern has the following consequences结果:

Decoupling interface and implementation.
An implementation is not bound被束缚的 permanently永久地 to an interface. 

The implementation of an abstraction can be configured at run-time. 

It's even possible for an object to change its implementation at run-time. 

Decoupling Abstraction and Implementor also eliminates忽略 compile-time dependencies on the implementation.
 
 Changing an implementation class doesn't require recompiling the Abstraction class and its clients.
  
  This property is essential非常重要 when you must ensure binary compatibility between different versions of a class library.

Furthermore, this decoupling encourages鼓励 layering分层 that can lead to a better-structured system. 

The high-level part of a system only has to know about Abstraction and Implementor.

Improved改进 extensibility展开性. 
You can extend the Abstraction and Implementor hierarchies等级制度 independently. 
Hiding implementation details from clients. 
You can shield clients from implementation details, 
like the sharing of implementor objects and the accompanying reference count mechanism (if any).

Implementation
Consider the following implementation issues when applying the Bridge pattern:

Only one Implementor. In situations where there's only one implementation, 
creating an abstract Implementor class isn't necessary.
 
This is a degenerate退化 case of the Bridge pattern;
 there's a one-to-one relationship between Abstraction and Implementor. 
 Nevertheless, this separation is still useful when a change in the implementation of a class must not affect its existing clients—that is,
  they shouldn't have to be recompiled, just relinked. 
Carolan  uses the term "Cheshire Cat" to describe this separation. 

Creating the right Implementor object.
 How, when, and where do you decide which Implementor class to instantiate when there's more than one? 
 
If Abstraction knows about all ConcreteImplementor classes, 
then it can instantiate one of them in its constructor; 
it can decide between them based on parameters passed to its constructor.
 
 If, for example, a collection class supports multiple implementations, 
 the decision can be based on the size of the collection. 
 
 A linked list implementation can be used for small collections and a hash table for larger ones.

Another approach is to choose a default implementation initially and change it later according to usage. 
For example, if the collection grows bigger than a certain threshold, 
then it switches its implementation to one that's more appropriate for a large number of items.

It's also possible to delegate the decision to another object altogether.
 In the Window/WindowImp example, we can introduce采用 a factory object (see Abstract Factory )
whose sole duty is to encapsulate platform-specifics. The factory knows what kind of WindowImp object to create for the platform in use; a Window simply asks it for a WindowImp, and it returns the right kind. A benefit of this approach is that Abstraction is not coupled directly to any of the Implementor classes.


Related Patterns相关的设计模式
An Abstract Factory can create and configure a particular特定 Bridge.

The Adapter pattern is geared搭配 toward making unrelated classes work together.
 It is usually applied to systems after they're designed. 
 
 Bridge, on the other hand, is used up-front in a design to let abstractions and implementations vary independently.
 抽象特征 和 具体实现 相互独立变化

 
