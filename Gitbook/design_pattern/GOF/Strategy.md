Strategy策略
Intent目的
Define a family of algorithms算法, encapsulate封装 each one, and make them interchangeable可互换. 
Strategy lets the algorithm vary变化 independently独立 from clients that use it.

Also Known As
Policy政策

Motivation动机
Many algorithms exist for breaking a stream of text into lines. 
Hard-wiring all such algorithms into the classes that require them isn't desirable可取 for several reasons:

Clients that need line breaking get more complex复杂 if they include the line breaking code. 
That makes clients bigger and harder to maintain维护, especially if they support multiple line breaking algorithms. 
Different algorithms will be appropriate 适当 at different times. 
We don't want to support multiple line breaking algorithms if we don't use them all. 
It's difficult to add new algorithms and vary existing ones when line breaking is an integral积分 part of a client.
We can avoid these problems by defining classes that encapsulate封装 different line breaking algorithms.
An algorithm that's encapsulated in this way is called a strategy.

Suppose a Composition作品 class is responsible负责 for maintaining维护 and updating the line breaks of text displayed in a text viewer.
 Line breaking strategies策略 aren't implemented by the class Composition. 
 Instead, they are implemented separately by subclasses of the abstract Compositor class.
  Compositor subclasses implement different strategies:子类实现不同的策略 

SimpleCompositor implements a simple strategy that determines决定 line breaks one at a time. 
TeXCompositor implements the TeX algorithm for finding line breaks.
 This strategy tries to optimize line breaks globally, that is, one paragraph段 at a time. 
ArrayCompositor implements a strategy that selects breaks so that each row has a fixed number of items.
 It's useful for breaking a collection of icons into rows, for example.
A Composition maintains a reference to a Compositor object. Whenever a Composition reformats its text, 
it forwards this responsibility to its Compositor object. 
The client of Composition specifies which Compositor should be used by installing the Compositor it desires into the Composition.

Applicability 适用

Use the Strategy pattern when many related classes differ only in their behavior行为.
 Strategies provide a way to configure a class with one of many behaviors. 
you need different variants变体 of an algorithm. 
For example, you might define algorithms reflecting反映 different space/time trade-offs.
 Strategies can be used when these variants are implemented as a class hierarchy层次 of algorithms. 
an algorithm uses data that clients shouldn't know about.
 Use the Strategy pattern to avoid exposing暴露 complex复杂, algorithm-specific data structures. 
a class defines many behaviors, and these appear as multiple conditional statements in its operations.
 Instead of many conditionals, move related conditional branches into their own Strategy class.
 
Structure

Participants
Strategy (Compositor) 
declares an interface common to all supported algorithms. Context uses this interface to call the algorithm defined by a ConcreteStrategy.
ConcreteStrategy (SimpleCompositor, TeXCompositor, ArrayCompositor) 
implements the algorithm using the Strategy interface.
Context (Composition) 
is configured with a ConcreteStrategy object. 

maintains a reference to a Strategy object. 

may define an interface that lets Strategy access its data.

Collaborations 合作
Strategy and Context interact to implement the chosen algorithm. A context may pass all data required by the algorithm to the strategy when the algorithm is called. Alternatively, the context can pass itself as an argument to Strategy operations. That lets the strategy call back on the context as required. 
A context forwards requests from its clients to its strategy. Clients usually create and pass a ConcreteStrategy object to the context; thereafter, clients interact with the context exclusively. There is often a family of ConcreteStrategy classes for a client to choose from.
Consequences 后果
The Strategy pattern has the following benefits and drawbacks:

Families of related algorithms. 
Hierarchies of Strategy classes define a family of algorithms or behaviors for contexts to reuse.
 Inheritance can help factor out common functionality of the algorithms. 
An alternative to subclassing. 
Inheritance offers another way to support a variety of algorithms or behaviors. 
You can subclass a Context class directly to give it different behaviors. 
But this hard-wires the behavior into Context. 
It mixes the algorithm implementation with Context's, making Context harder to understand, maintain, and extend. 
And you can't vary the algorithm dynamically. 
You wind up with many related classes whose only difference is the algorithm or behavior they employ雇佣. 
Encapsulating the algorithm in separate Strategy classes lets you vary the algorithm independently of its context, 
making it easier to switch, understand, and extend. 
Strategies eliminate消除 conditional statements. 
The Strategy pattern offers an alternative替代 to conditional statements for selecting desired想要 behavior. 
When different behaviors are lumped集总 into one class, 
it's hard to avoid using conditional条件语句 statements to select the right behavior. 
Encapsulating the behavior in separate Strategy classes eliminates these conditional statements. 
For example, without strategies, the code for breaking text into lines could look like 
```php
void Composition::Repair () {
    switch (_breakingStrategy) {
    case SimpleStrategy:
        ComposeWithSimpleCompositor();
        break;
    case TeXStrategy:
        ComposeWithTeXCompositor();
        break;
    // ...
    }
    // merge results with existing composition, if necessary
}
```

The Strategy pattern eliminates消除 this case statement by delegating委托 the line breaking task to a Strategy object:

Code containing包含 many conditional statements often indicates表明 the need to apply the Strategy pattern.
出现条件语句就该考虑用策略模式

A choice of implementations. 
Strategies can provide different implementations of the same behavior.
相同的行为 不同的实现
 The client can choose among strategies with different time and space trade-offs. 
Clients must be aware意识到 of different Strategies策略. 
The pattern has a potential潜在 drawback缺点 in that a client must understand how Strategies differ before it can select the appropriate适当 one. 
Clients might be exposed暴露 to implementation issues. 
Therefore you should use the Strategy pattern only when the variation变异 in behavior is relevant有关 to clients. 
Communication overhead between Strategy and Context. 
The Strategy interface is shared by all ConcreteStrategy classes whether the algorithms they implement are trivial or complex. 
Hence it's likely that some ConcreteStrategies won't use all the information passed to them through this interface;
 simple ConcreteStrategies may use none of it! That means there will be times when the context creates and initializes parameters that never get used. 
 If this is an issue, then you'll need tighter coupling between Strategy and Context. 
Increased number of objects. Strategies increase the number of objects in an application.
 Sometimes you can reduce this overhead by implementing strategies as stateless objects that contexts can share. 
 Any residual state is maintained by the context, which passes it in each request to the Strategy object. 
 Shared strategies should not maintain state across invocations. The Flyweight (195) pattern describes this approach in more detail.
 
Implementation
Consider the following implementation issues:

Defining the Strategy and Context interfaces. The Strategy and Context interfaces must give a ConcreteStrategy efficient access to any data it needs from a context, and vice versa. 
One approach is to have Context pass data in parameters to Strategy operations—in other words, take the data to the strategy. This keeps Strategy and Context decoupled. On the other hand, Context might pass data the Strategy doesn't need.

Another technique has a context pass itself as an argument, and the strategy requests data from the context explicitly. Alternatively, the strategy can store a reference to its context, eliminating the need to pass anything at all. Either way, the strategy can request exactly what it needs. But now Context must define a more elaborate interface to its data, which couples Strategy and Context more closely.

The needs of the particular algorithm and its data requirements will determine the best technique.


Known Uses
Both ET++ [WGM88] and InterViews use strategies to encapsulate different linebreaking algorithms as we've described.

In the RTL System for compiler code optimization [JML92], strategies define different register allocation schemes (RegisterAllocator) and instruction set scheduling policies (RISCscheduler, CISCscheduler). This provides flexibility in targeting the optimizer for different machine architectures.

The ET++SwapsManager calculation engine framework computes prices for different financial instruments [EG92]. Its key abstractions are Instrument and YieldCurve. Different instruments are implemented as subclasses of Instrument. YieldCurve calculates discount factors, which determine the present value of future cash flows. Both of these classes delegate some behavior to Strategy objects. The framework provides a family of ConcreteStrategy classes for generating cash flows, valuing swaps, and calculating discount factors. You can create new calculation engines by configuring Instrument and YieldCurve with the different ConcreteStrategy objects. This approach supports mixing and matching existing Strategy implementations as well as defining new ones.

The Booch components [BV90] use strategies as template arguments. The Booch collection classes support three different kinds of memory allocation strategies: managed (allocation out of a pool), controlled (allocations/deallocations are protected by locks), and unmanaged (the normal memory allocator). These strategies are passed as template arguments to a collection class when it's instantiated. For example, an UnboundedCollection that uses the unmanaged strategy is instantiated as UnboundedCollection.

RApp is a system for integrated circuit layout [GA89, AG90]. RApp must lay out and route wires that connect subsystems on the circuit. Routing algorithms in RApp are defined as subclasses of an abstract Router class. Router is a Strategy class.

Borland's ObjectWindows [Bor94] uses strategies in dialogs boxes to ensure that the user enters valid data. For example, numbers might have to be in a certain range, and a numeric entry field should accept only digits. Validating that a string is correct can require a table look-up.

ObjectWindows uses Validator objects to encapsulate validation strategies. Validators are examples of Strategy objects. Data entry fields delegate the validation strategy to an optional Validator object. The client attaches a validator to a field if validation is required (an example of an optional strategy). When the dialog is closed, the entry fields ask their validators to validate the data. The class library provides validators for common cases, such as a RangeValidator for numbers. New client-specific validation strategies can be defined easily by subclassing the Validator class.

Related Patterns
Flyweight : Strategy objects often make good flyweights.

