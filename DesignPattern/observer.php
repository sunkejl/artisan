<?php
/**
 * 观察者 在对象间定义一个一对多的联系性，由此当一个对象改变了状态，所有其他相关的对象会被通知并且自动刷新。
 * observer pattern is used when there is one-to-many relationship between objects such as if one object is modified,
 * its dependent objects are to be notified automatically.
 */

namespace Dp\observer;

class Subject
{
    public $list = array();
    public $status;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->notifyAllObserver();
    }

    public function notifyAllObserver()
    {
        foreach ($this->list as $v) {
            $v->update();
        }
    }

    function attach(Observer $observer)
    {
        array_push($this->list, $observer);
    }
}

abstract class Observer
{
    public $subject;

    abstract public function update();
}

class BinaryObserver extends Observer
{
    public function __construct(Subject $subject)
    {
        //对象的 = 是引用传递
        $this->subject = $subject;
        $this->subject->attach($this);
    }

    function update()
    {
        echo __CLASS__ . "update to {$this->subject->getStatus()}\n";
    }
}

class OctalObserver extends Observer
{
    public function __construct(Subject $subject)
    {
        //对象的 = 是引用传递
        $this->subject = $subject;
        $this->subject->attach($this);
    }

    function update()
    {
        echo __CLASS__ . "update to {$this->subject->getStatus()}\n";
    }
}

$subject = new Subject();
new BinaryObserver($subject);
new OctalObserver($subject);
$subject->setStatus(1);
$subject->setStatus(2);
