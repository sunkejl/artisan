 the performance of the ternary operator
 三元操作符  5.3以前 5.6测试 速度相差不大
 ```
 // snippet 1
 $tmp = isset($context['test']) ? $context['test'] : '';
 
 // snippet 2
 if (isset($context['test'])) {
     $tmp = $context['test'];
 } else {
     $tmp = '';
 }
 ```
大部分时间它们的速度是一样的,但如果$context['test'] 包含非常大的数组,第二块代码比第一块快

artisan\Alarak\ternary.php

php用了copy-on-write,当分配给变量一个值时，php会在变量发生修改时时，才会创建a copy

$tmp = $context['test']; $tmp只是引用，但你修改了这就变量，引用就变成了复制，复制在原变量改变时也会发生

如果php5.3以上，就支持$tmp = $context['test'] ?: ''; 这种表达式,就能解释上面的问题

写时拷贝（copy-on-write）和引用计数（refcount）


ref http://gywbd.github.io/posts/2015/4/php-variable-in-memory.html

http://fabien.potencier.org/the-php-ternary-operator-fast-or-not.html





