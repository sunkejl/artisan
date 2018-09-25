Object Pool Design Pattern
###Intent
Object pooling can offer a significant performance boost;
it is most effective in situations where the cost of initializing a class instance is high, 
the rate of instantiation of a class is high, 
and the number of instantiations in use at any one time is low.

###Problem
Object pools (otherwise known as resource pools) are used to manage the object caching. 
A client with access to a Object pool can avoid creating a new Objects 
by simply asking the pool for one that has already been instantiated instead. 
Generally the pool will be a growing pool, i.e. 
the pool itself will create new objects if the pool is empty, or we can have a pool, which restricts the number of objects created.

It is desirable to keep all Reusable objects that are not currently in use in the same object pool 
so that they can be managed by one coherent policy. 
To achieve this, the Reusable Pool class is designed to be a singleton class.

###Discussion
The Object Pool lets others "check out" objects from its pool, 
when those objects are no longer needed by their processes, 
they are returned to the pool in order to be reused.

However, we don't want a process to have to wait for a particular object to be released, 
so the Object Pool also instantiates new objects as they are required, 
but must also implement a facility to clean up unused objects periodically.

###Example
Object pool pattern is similar to an office warehouse. 
When a new employee is hired, office manager has to prepare a work space for him. 
She figures whether or not there's a spare equipment in the office warehouse. 
If so, she uses it. If not, she places an order to purchase new equipment from Amazon. 
In case if an employee is fired, his equipment is moved to warehouse, 
where it could be taken when new work place will be needed.

###Check list
Create ObjectPool class with private array of Objects inside
Create acquire and release methods in ObjectPool class
Make sure that your ObjectPool is Singleton

###Rules of thumb
The Factory Method pattern can be used to encapsulate the creation logic for objects. 
However, it does not manage them after their creation, 
the object pool pattern keeps track of the objects it creates.
Object Pools are usually implemented as Singletons.


```php
<?php

class ObjectPool
{
    /** @var array Instances of reusable objects */
    private $instances = [];

    /**
     * Get object from instances.
     *
     * @param string $key Key for retrieving the instance.
     *
     * @return ReusableObject
     */
    public function get($key)
    {
        return $this->instances[$key];
    }

    /**
     * Add object to list of instances.
     *
     * @param ReusableObject
     */
     public function add($object, $key)
     {
         if(empty($this->instances[$key])){
         $this->instances[$key] = $object;
         }
     }
}

class ReusableObject
{
    /**
     * Do something.
     */
    public function doSomething()
    {
        // ...
    }
}

// Client code
$pool = new ObjectPool();
$reusableObject = new ReusableObject();
$pool->add($reusableObject, 'reusable_object_key');

$reusableObject = $pool->get('reusable_object_key');
$reusableObject->doSomething();
```
上述例子只是大概
对象池采用单例
对象池就意味着开发者开始自己管理内存
对象不可变是最好的
不再使用的对象要回收
对象池大小要做限制

参考公司工位，员工入职，员工离职
参考gym更衣室
