这次，我们将演示如何在PHP扩展中如何对类型进行一些操作。如，判断变量类型。要实现的PHP代码如下：

```

    <?php
        function get_size ($value) {
            if (is_string($value)) {
                return "string size is ". strlen($value);
            } else if (is_array($value)) {
                return "array size is ". sizeof($value);
            } else {
                  return "can not support";
            }
        }

        var_dump(get_size("abc"));
        var_dump(get_size(array(1,2)));
    ?>

```

分别获取string 和 array的长度。

代码

基础代码

这个扩展，我们将在say扩展上增加 get\_size 方法。

实现get\_size方法

get\_size方法的PHP扩展源码：

```
PHP_FUNCTION(get_size)
{
    zval *val;
    size_t size;
    zend_string *result;
    HashTable *myht;

    if (zend_parse_parameters(ZEND_NUM_ARGS(), "z", &val) == FAILURE) {
        return;
    }   

    if (Z_TYPE_P(val) == IS_STRING) {
        result = strpprintf(0, "string size is %d", Z_STRLEN_P(val));
    } else if (Z_TYPE_P(val) == IS_ARRAY) {
        myht = Z_ARRVAL_P(val);
        result = strpprintf(0, "array size is %d", zend_array_count(myht));
    } else {
        result = strpprintf(0, "can not support");
    }   

    RETURN_STR(result);
}

```

代码说明

zval变量相关的宏方法大部分定义在Zend/zend\_types.h文件中。

类型相关宏方法

Z\_TYPE\_P\(zval \*\) 获取zval变量的类型。常见的类型都有：

\#define IS\_UNDEF                    0

\#define IS\_NULL                     1

\#define IS\_FALSE                    2

\#define IS\_TRUE                     3

\#define IS\_LONG                     4

\#define IS\_DOUBLE                   5

\#define IS\_STRING                   6

\#define IS\_ARRAY                    7

\#define IS\_OBJECT                   8

\#define IS\_RESOURCE                 9

\#define IS\_REFERENCE                10

Z\_STRLEN\_P\(zval \*\) 获取字符串的长度。

数组

在 Zend/zend\_hash.c文件中包含一些array处理的方法。 zend\_array\_count\(HashTable \*\) 获取数组的元素个数。 zend\_array 和 HashTable其实是相同的数据结构。在Zend/zend\_types.h文件中有定义。

typedef struct \_zend\_array HashTable;

字符串拼接

strpprintf是PHP为我们提供的字符串拼接的方法。第一个参数是最大字符数。

PHP7变量相关资料

在PHP7中对于zval变量的结构有了不小的改动。大家可以查看下面三篇文章。介绍的比较详细。

[https://github.com/laruence/php7-internal/blob/master/zval.md](https://github.com/laruence/php7-internal/blob/master/zval.md)

[http://0x1.im/blog/php/Internal-value-representation-in-PHP-7-part-1.html](http://0x1.im/blog/php/Internal-value-representation-in-PHP-7-part-1.html)

[http://0x1.im/blog/php/Internal-value-representation-in-PHP-7-part-2.html](http://0x1.im/blog/php/Internal-value-representation-in-PHP-7-part-2.html)

