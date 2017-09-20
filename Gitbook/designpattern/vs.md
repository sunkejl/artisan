过程式代码（使用数据结构）便于在不改动数据结构的前提下添加新函数 面向对象的代码便于在不改动既有函数的前提下添加新类

过程式代码难以添加新的数据结构，因为必须修改所有函数，而面向对象代码难以添加新函数，因为必须修改所有的类。

面向对象难的事 过程式比较容易，反之一样

过程式代码 添加函数 类不受影响 添加新形状 修改所有函数

```
<?php
    class Square{
        public $topLeft=1;
        public $silde=2;
    }
    class Circle{
        public $center=3;
        public $radius=4;
    }
    function add($foo){
        if($foo instanceof Square ){
            return $foo->topLeft*$foo->silde;
        }elseif($foo instanceof Circle){
            return $foo->center+$foo->radius;
        }
    }

    $foo=new Square();
    $result=add($foo);
    var_dump($result);


```

面向对象 添加新形状 函数不受影响 添加函数 所有形状都要修改

```
interface Shape{
    public function add();
}
class Square implements Shape{
    public $side=1;
    public $top=2;
    public function add(){
        return $this->side*$this->top;
    }
}
class Circle implements Shape{
    public $center=3;
    public $radius=4;
    public function add()
    {
        return $this->center+$this->radius;
    }
}
$foo=new Square();
$result=$foo->add();
var_dump($result);
```



