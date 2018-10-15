http://zhijia.io/essay/105250

vim /data/php-7.0.12/ext/say/say.c

这次，我们将演示如何在PHP扩展中接受传入的参数和输出返回值。

```
<?php
    function default_value ($type, $value = null) {
        if ($type == "int") {
            return $value ?? 0;
        } else if ($type == "bool") {
            return $value ?? false;
        } else if ($type == "str") {
            return is_null($value) ? "" : $value;
        }
        return null;
    }

    var_dump(default_value("int"));
    var_dump(default_value("int", 1));
    var_dump(default_value("bool"));
    var_dump(default_value("bool", true));
    var_dump(default_value("str"));
    var_dump(default_value("str", "a"));
    var_dump(default_value("array"));

```

我们将在扩展中实现default\_value方法。



# 代码





## 基础代码

这个扩展，我们将在say扩展上增加

`default_value`

方法。





## 实现default\_value方法

default\_value方法的PHP扩展源码：



```
PHP_FUNCTION(default_value)
{
    zend_string     *type;    
    zval            *value = NULL;

#ifndef FAST_ZPP
    /* Get function parameters and do error-checking. */
    if (zend_parse_parameters(ZEND_NUM_ARGS(), "S|z", &type, &value) == FAILURE) {
        return;
    }    
#else
    ZEND_PARSE_PARAMETERS_START(1, 2)
        Z_PARAM_STR(type)
        Z_PARAM_OPTIONAL
        Z_PARAM_ZVAL_EX(value, 0, 1)
    ZEND_PARSE_PARAMETERS_END();
#endif

    if (ZSTR_LEN(type) == 3 && strncmp(ZSTR_VAL(type), "int", 3) == 0 && value == NULL) {
        RETURN_LONG(0);
    } else if (ZSTR_LEN(type) == 3 && strncmp(ZSTR_VAL(type), "int", 3) == 0 && value != NULL) {
        RETURN_ZVAL(value, 0, 1); 
    } else if (ZSTR_LEN(type) == 4 && strncmp(ZSTR_VAL(type), "bool", 4) == 0 && value == NULL) {
        RETURN_FALSE;
    } else if (ZSTR_LEN(type) == 4 && strncmp(ZSTR_VAL(type), "bool", 4) == 0 && value != NULL) {
        RETURN_ZVAL(value, 0, 1); 
    } else if (ZSTR_LEN(type) == 3 && strncmp(ZSTR_VAL(type), "str", 3) == 0 && value == NULL) {
        RETURN_EMPTY_STRING();
    } else if (ZSTR_LEN(type) == 3 && strncmp(ZSTR_VAL(type), "str", 3) == 0 && value != NULL) {
        RETURN_ZVAL(value, 0, 1); 
    } 
    RETURN_NULL();
}

```



## 代码说明





### 获取参数

在PHP7中提供了两种获取参数的方法。

`zend_parse_parameters`

和FAST ZPP方式。





#### zend\_parse\_parameters

在PHP7之前一直使用

`zend_parse_parameters`

函数获取参数。这个函数的作用，就是把传入的参数转换为PHP内核中相应的类型，方便在PHP扩展中使用。 参数说明：



* 第一个参数，参数个数。一般就使用
  `ZEND_NUM_ARGS()`
  ，不需要改变。
* 第二个参数，格式化字符串。这个格式化字符串的作用就是，指定传入参数与PHP内核类型的转换关系。

代码中 S\|z 的含义就是：

* S 表示参数是一个字符串。要把传入的参数转换为zend\_string类型。
* \| 表示之后的参数是可选。可以传，也可以不传。
* z 表示参数是多种类型。要把传入的参数转换为zval类型。

除此之外，还有一些specifier，需要注意：

* ！如果接收了一个PHP语言里的null变量，则直接把其转成C语言里的NULL，而不是封装成IS\_NULL类型的zval。
* / 如果传递过来的变量与别的变量共用一个zval，而且不是引用，则进行强制分离，新的zval的is\_ref
  **gc==0, and refcount**
  gc==1.

更多格式化字符串的含义可以查看官方网站。[https://wiki.php.net/rfc/fast\_zpp](https://wiki.php.net/rfc/fast_zpp)



#### FAST ZPP

在PHP7中新提供的方式。是为了提高参数解析的性能。对应经常使用的方法，建议使用FAST ZPP方式。 使用方式： 以

`ZEND_PARSE_PARAMETERS_START(1, 2)`

开头。 第一个参数表示必传的参数个数，第二个参数表示最多传入的参数个数。 以

`ZEND_PARSE_PARAMETERS_END();`

结束。 中间是传入参数的解析。 值得注意的是，一般FAST ZPP的宏方法与zend\_parse\_parameters的specifier是一一对应的。如：



* Z\_PARAM\_OPTIONAL 对应 \|
* Z\_PARAM\_STR 对应 S

但是，Z\_PARAM\_ZVAL\_EX方法比较特殊。它对应两个specifier，分别是 ! 和 / 。! 对应宏方法的第二个参数。/ 对应宏方法的第三个参数。如果想开启，只要设置为1即可。

FAST ZPP相应的宏方法可以查看官方网站[https://wiki.php.net/rfc/fast\_zpp\#proposal](https://wiki.php.net/rfc/fast_zpp#proposal)



### 返回值

方法的返回值是使用

`RETURN_`

开头的宏方法进行返回的。常用的宏方法有：



```
RETURN_NULL()        返回null
RETURN_LONG(l)        返回整型
RETURN_DOUBLE(d) 返回浮点型
RETURN_STR(s)        返回一个字符串。参数是一个zend_string * 指针
RETURN_STRING(s)    返回一个字符串。参数是一个char * 指针
RETURN_STRINGL(s, l) 返回一个字符串。第二个参数是字符串长度。
RETURN_EMPTY_STRING()    返回一个空字符串。
RETURN_ARR(r)        返回一个数组。参数是zend_array *指针。
RETURN_OBJ(r)         返回一个对象。参数是zend_object *指针。
RETURN_ZVAL(zv, copy, dtor) 返回任意类型。参数是 zval *指针。
RETURN_FALSE        返回false
RETURN_TRUE            返回true
```

更多宏方法请查看 Zend/zend\_API.h中的相关代码。

