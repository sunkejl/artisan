php代码比C慢30-100倍
C直接操作底层，硬件
修改php内核行为
安装工具
1 gcc
2 make 
3 autoconf

ext_skel 自动为我们创建扩展的脚本

cd php-src/ext

./ext_skel   显示帮助信息

./ext_skel --extname=test  新的扩展名称


ext下多了test目录
config.m4 配置文件



开发扩张 第一步  修改config.m4 启用扩展
打开config.m4 


//dnl 是autoconf的注释
PHP_ARG_WITH(test, for test support,
dnl Make sure that the comment is aligned: 这行是注释
[  --with-test             Include test support])


sudo apt-get install php5-dev

phpize     php根据config.m4 生成config的脚本

./configure shell脚本 检测头文件 ，环境 ，特性 执行它
 

多了Makefile
make的配置文件 对C源文件的编译

启动一个扩展
make

make install

php -i|grep php.ini

extension=test.so

php -m test即出现在里面


打开test.c 里面有confirm_test_compiled函数
php test2.php  echo confirm_test_compiled("222222");
会执行
以上为php自己生产的测试函数


头文件
先声明函数
php_test.h  
写在 PHP_MINFO_FUNCTION(test);后  找不到就随便写
add 
PHP_FUNCTION(test_hello);  不需要引号

test.c 
add

注册到zend
const zend_function_entry test_functions[] = {
	PHP_FE(test_hello,	NULL)
	//PHP_FE(confirm_test_compiled,	NULL)		/* For testing, remove later. */
	PHP_FE_END	/* Must be the last line in test_functions[] */
};

实现函数
PHP_FUNCTION(test_hello)
{
	long a;
	long b;
	char *c;
	int c_len;
	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "lls", &a, &b,&c,&c_len) == FAILURE) {
			return;
		}
	char *str;
	int len = spprintf(&str,0,"%s:%d\n",c,a*b);
	RETURN_STRINGL(str, len, 0);


}

#zend_parse_parameters zend API接受php参数的函数  lls 整形 整形 字符串
make install 编译 


extension=test.so


 php --rf "test_hello"
 查看函数存不存在


