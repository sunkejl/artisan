<?php
$sql = sprintf("INSERT INTO `shop_goods_order_global` (`orderid`, `globalinfo`, `ispay`,`issplit`,`valid`,`paytime`) VALUES ('%s', '%s', '%s', '%s','%s','%s')",
    "123", "", "1", "0", "1", time());
echo $sql;exit;
$data=array("idcard"=>array(array("name"=>123,"id"=>22),array("name"=>333,"id"=>444)));
$obj=json_decode(json_encode($data));
var_dump(current($obj->idcard)->name);
var_dump(current($obj->idcard)->id);
var_dump($obj);
exit;
$input = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-Type: text/html; charset=utf-8');


echo sprintf('The %2$s contains %1$.9f monkeys%1$.8f other %1$x', 123.2222,1);

$sql = sprintf("INSERT INTO `shop_goods_order_global` (`orderid`, `globalinfo`, `ispay`, `paytime`) VALUES ('%2\$s', '222', '1', '111')", 111,333);

echo $sql;


//http://php.net/manual/zh/function.sprintf.php
//http://www.w3school.com.cn/php/func_string_sprintf.asp
//必需。规定字符串以及如何格式化其中的变量。
//可能的格式值：
//%% - 返回一个百分号 %
//%b - 二进制数
//%c - ASCII 值对应的字符
//%d - 包含正负号的十进制数（负数、0、正数）
//%e - 使用小写的科学计数法（例如 1.2e+2）
//%E - 使用大写的科学计数法（例如 1.2E+2）
//%u - 不包含正负号的十进制数（大于等于 0）
//%f - 浮点数（本地设置）
//%F - 浮点数（非本地设置）
//%g - 较短的 %e 和 %f
//%G - 较短的 %E 和 %f
//%o - 八进制数
//%s - 字符串
//%x - 十六进制数（小写字母）
//%X - 十六进制数（大写字母）
//附加的格式值。必需放置在 % 和字母之间（例如 %.2f）：
//+ （在数字前面加上 + 或 - 来定义数字的正负性。默认情况下，只有负数才做标记，正数不做标记）
//' （规定使用什么作为填充，默认是空格。它必须与宽度指定器一起使用。例如：%'x20s（使用 "x" 作为填充））
//- （左调整变量值）
//[0-9] （规定变量值的最小宽度）
//.[0-9] （规定小数位数或最大字符串长度）
//注释：如果使用多个上述的格式值，它们必须按照以上顺序使用。