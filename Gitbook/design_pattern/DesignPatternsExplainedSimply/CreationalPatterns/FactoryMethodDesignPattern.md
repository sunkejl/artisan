Factory Method Design Pattern

###Intent
Define an interface for creating an object, 
but let subclasses decide which class to instantiate. 
Factory Method lets a class defer instantiation to subclasses.
延迟子类的实例化
Defining a "virtual" constructor.
The new operator considered harmful.

###Problem
A framework needs to standardize the architectural model for a range of applications, 
but allow for individual applications to define their own domain objects and provide for their instantiation.

###Discussion
Factory Method is to creating objects as Template Method is to implementing an algorithm. 
A superclass specifies all standard and generic behavior 
(using pure virtual "placeholders" for creation steps), 
and then delegates the creation details to subclasses that are supplied by the client.

Factory Method makes a design more customizable and only a little more complicated. 
Other design patterns require new classes, 
whereas Factory Method only requires a new operation.

People often use Factory Method as the standard way to create objects; 
but it isn't necessary if: 
the class that's instantiated never changes, 
or instantiation takes place in an operation that subclasses can easily override (such as an initialization operation).

Factory Method is similar to Abstract Factory but without the emphasis on families.

Factory Methods are routinely specified by an architectural framework, and then implemented by the user of the framework.

###Structure
The implementation of Factory Method discussed in the Gang of Four (below) largely overlaps with that of Abstract Factory. 
For that reason, the presentation in this chapter focuses on the approach that has become popular since.

An increasingly popular definition of factory method is: 
a static method of a class that returns an object of that class' type. 
But 
unlike a constructor, the actual object it returns might be an instance of a subclass. 
Unlike a constructor, an existing object might be reused, instead of a new object created. 
Unlike a constructor, factory methods can have different and more descriptive names 
(e.g. Color.make_RGB_color(float red, float green, float blue) and Color.make_HSB_color(float hue, float saturation, float brightness)

The client is totally decoupled from the implementation details of derived classes. Polymorphic creation is now possible.

###Example
The Factory Method defines an interface for creating objects, 
but lets subclasses decide which classes to instantiate. 
Injection molding presses demonstrate this pattern. 
Manufacturers of plastic toys process plastic molding powder, 
and inject the plastic into molds of the desired shapes. 
The class of toy (car, action figure, etc.) is determined by the mold.

###Check list
If you have an inheritance hierarchy that exercises polymorphism, 
consider adding a polymorphic creation capability by defining a static factory method in the base class.
Design the arguments to the factory method. 
What qualities or characteristics are necessary and sufficient to identify the correct derived class to instantiate?
Consider designing an internal "object pool" that will allow objects to be reused instead of created from scratch.
Consider making all constructors private or protected.


###Rules of thumb
Abstract Factory classes are often implemented with Factory Methods, 
but they can be implemented using Prototype.
Factory Methods are usually called within Template Methods.
Factory Method: creation through inheritance. 
Prototype: creation through delegation.
Often, designs start out using Factory Method 
(less complicated, more customizable, subclasses proliferate) 
and evolve toward Abstract Factory, Prototype, or Builder (more flexible, more complex) 
as the designer discovers where more flexibility is needed.
Prototype doesn't require subclassing, 
but it does require an Initialize operation. 
Factory Method requires subclassing, but doesn't require Initialize.
The advantage of a Factory Method is that it can return the same instance multiple times, 
or can return a subclass rather than an object of that exact type.
Some Factory Method advocates recommend that as a matter of language design 
(or failing that, as a matter of style) absolutely all constructors should be private or protected. 
It's no one else's business whether a class manufactures a new object or recycles an old one.
The new operator considered harmful. 
There is a difference between requesting an object and creating one. 
The new operator always creates an object, and fails to encapsulate object creation. 
A Factory Method enforces that encapsulation, 
and allows an object to be requested without inextricable coupling to the act of creation.



工厂方法模式 定义一个创建对象的接口，但让实现这个接口的类来决定实例化哪个类。工厂方法让类的实例化推迟到子类中进行

通过接口,多个工厂来生产，不限制创造的对象的种类

工厂模式 当类的依赖发生改变时，工厂模式更容易修改 
Polymorphic 多态

工厂方法 和抽象工厂一样把工厂抽象出来，但限制比抽象工厂宽松
