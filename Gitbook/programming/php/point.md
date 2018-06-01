框架是约束 类库是自由
 
循环处理数组 array_map array_walk 
 
array_walk()    对数组中的每个成员应用用户函数。不改变值
array_walk($array, function(&$value, $key) {
    $value++;
}); 加引用可以改变数组元素的值
提示：如需操作更深的数组（一个数组中包含另一个数组），请使用 array_walk_recursive() 函数。
 
array_map()     把数组中的每个值发送到用户自定义函数，返回新的值。
 
array_filter()  用回调函数过滤数组中的元素。
 
array_flip()    交换数组中的键和值。
 
range('a', 'i') 返回a-i的数组
 
构造方法 父类中有构造方法 子类中没有的话 在new 子类时可以传到父类中
 
xdebug_time_index(); xdebug返回执行时间
 
Xdebug同样提供了一个函数xdebug_memory_usage()来实现这样的功能，另外xdebug还提供了一个xdebug_peak_memory_usage()函数来查看内存占用的峰值。
 
memory_get_usage 返回分配给 PHP 的内存量
 
func_get_args  返回一个包含函数参数列表的数组 取代function($a,$b)不用写$a $b
 
ob_start() — 打开输出控制缓冲   如果没有 会从html行开始输出到浏览器 导致无法发送任何头部信息 setcookie(),header()报cannot modify header information
 
filemtime('index.php') 返回创建的时间
 
异步请求的几种方式 放在img的source里 ajax curl fsockopen 
 
return new static(); 返回当前实例化的那个类
 
return new self(); 返回自己的那个类 如果是被继承 也是返回自己
 
unlink()          删除文件
 
ignore_user_abort(true);
关闭网页后，程序在后台执行而不立即中断
 
ignore_user_abort(TRUE); //如果客户端断开连接，不会引起脚本abort.
set_time_limit(0);//取消脚本执行延时上限
以上俩个要同时才能保证
 
filter_var($email,FILTER_VALIDATE_EMAIL); 验证函数
 
file_put_contents("test.txt","Hello World. Testing!");  写入test.txt
 
 
redis 6379
持久化 RDB 可设置几个小时备份 AOF 可设置每秒备份
 
mysql_num_fields($result);  #返回结果集中字段的数目
 
strcmp                #如果 str1 小于 str2 返回 < 0； 如果 str1 大于 str2 返回 > 0；如果两者相等，返回 0。正负为相差的倍数
 
final                #如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。属性不能被定义为 final，只有类和方法才能被定义为 final。
 
const 和 define()       #const必须在最前面定义 define() 可以在函数中 可定义是否区分大小写
 
抽象类                                               #支持抽象类和抽象方法。定义为抽象的类不能被实例化。任何一个类，如果它里面至少有一个方法是被声明为抽象的，那么这个类就必须被声明为抽象的。被定义为抽象的方法只是声明了其调用方                    式（参数），不能定义其具体的功能实现。 继承一个抽象类的时候，子类必须定义父类中的所有抽象方法；
                          
构造方法                              #除了使用function __construct()定义构造方法外，还可以使用function 类名()
 
get_class()           #获得实例化对象所属类名字的函数
 
PDO_OCI              #PHP中使用Oracle数据库作为数据库服务器，应该在PDO中加载下面哪个驱动程序
 
PDO->exec()           #方法主要是针对没有结果集合返回的操作，比如 INSERT、UPDATE、DELETE 等操作，它返回的结果是当前操作影响的列数。
 
PDO 报错             #PDO中一共提供了三种不同的错误处理模式① PDO::ERRMODE_SILENT:不报错误② PDO::ERRMODE_WARNING:以警告的方式报错③ PDO::ERRMODE_EXCEPTION：以异常的方式报错
 
INSERT INTO `admins` (`username`) VALUES ('23')
 
UPDATE `admins` SET `username`='2344', `type`='1', `ip`='2' WHERE (`id`='13')
 
&引用               #$a 和 $b 在这里是完全相同的，这并不是 $a 指向了 $b 或者相反，而是 $a 和 $b 指向了同一个地方。
 
mysql 防注入函数      # addslashes 特殊符号前加转义的/
 
合并数组           array_merge
 
php              改最大连接数
 
nginx            改最大连接数
 
mysql            改最大连接数
 
date('Y-m-d h:i:s',strtotime('-1'));
 
chmod -R 777 744 
r=4，w=2，x=1
若要rwx属性则4+2+1=7
若要rw-属性则4+2=6；
若要r-x属性则4+1=5。 
 
header("HTTP/1.0 404 Not Found");
 
$str1 = 'yabadabadoo';
$str2 = 'yaba';
if (strpos($str1,$str2)) {  
    echo 1;
} else {
    echo 2;
}
strpos 返回字符串首次出现的位置  是0  所以输出2
 
xss“跨站脚本”
1.htmlspecialchars函数
2.htmlentities函数
在输出html时，加上Content Security Policy的Http Header
在设置Cookie时，加上HttpOnly参数
 
CSRF “跨站请求伪造”
 
 
mysql 
 
Laravel 查询构造器使用 PDO 参数绑定，以保护应用程序免于 SQL 注入，因此传入的参数不需额外转义特殊字符。
 
禁止PHP本地转义而交由MySQL Server转义
使用PDO或mysqli预编译处理SQL
 
这次PHP是将SQL模板和变量是分两次发送给MySQL的，由MySQL完成变量的转义处理，既然变量和SQL模板是分两次发送的，那么就不存在SQL注入的问题了，但需要在DSN中指定charset属性，如：
$pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root');
 
addslashes()
 
function setcookie ($name, $value = null, $expire = null, $path = null, $domain = null, $secure = null, $httponly = null) {}
session的保存目录可以在php.ini里设置
服务器在响应时会自动把cookie带上
 
mysql 水平分割 和 垂直分割
 
水平分割就是 每个子表列数相同
 
垂直分割 就是 一条记录分开多个地方保存
 
vim ctrl+f 下翻页、ctrl+b上翻页
 
“高内聚，低耦合”
模块与模块尽可能独立，继承是紧耦合的，解耦，解除模块间的依赖
各个类需要职责分离的思想。 
每一个类完成特定的独立的功能，这个就是高内聚。耦合就是类之间的互相调用关系，如果耦合很强，互相牵扯调用很多，那么会牵一发而动全身，不利于维护和扩展。
 
 
protected 
只能被继承的函数内部调用  不能被实例化后调用
 
匿名函数（Anonymous functions），也叫闭包函数（closures），允许 临时创建一个没有指定名称的函数。最经常用作回调函数（callback）参数的值。当然，也有其它应用的情况。
 
连接闭包和外界变量的关键字：USE
 
闭包可以保存所在代码块上下文的一些变量和值。PHP在默认情况下，匿名函数不能调用所在代码块的上下文变量，而需要通过使用use关键字。
 
数据冗余发生在数据库系统中，指的是一个字段在多个表里重复出现。
举个例子，如果每条客户购买商品的信息里都连带记录了客户自身的信息，这样的数据冗余可能造成不一致
，因为客户自身的信息可能不一样。
数据冗余会导致数据异常和损坏，一般来说设计上应该被避免。
数据库规范化防止了冗余而且不浪费存储容量。
适当的使用外键可以使得数据冗余和异常降到最低。
但是，如果考虑效率和便利，有时候也会设计冗余数据，而不考虑数据被破坏的风险。
 
要实现一个接口，使用 implements 操作符。类中必须实现接口中定义的所有方法，否则会报一个致命错误。类可以实现多个接口，用逗号来分隔多个接口的名称。
 
一个扩充类总是依赖一个单独的基类，也就是说，不支持多继承。使用关键字“extends”来扩展一个类。
 
当使用if去判断type时 试着往上加interface  interface 只能写public 方法 无法定义方法内容
 
抽象类中不是abstract方法可以定义内容供子类修改'
 
属性不能被定义为 final，只有类和方法才能被定义为 final。
 
php的变量名只能A-Za-z或者_开始
 
isset($var1,$var2,$var3）可同时接受三个参数
 
双引号 可以直接把变量嵌入使用 "aaa$a"
 