都是用回调函数

array_map()
返回回调函数处理后的值组成的数组

array_walk()
返回boole值 成功时返回 TRUE， 或者在失败时返回 FALSE。
如需要改变原数组 传引用

array_filter()
返回过滤后的数组。
如果 callback 函数返回 true，则 array 数组的当前值会被包含在返回的结果数组中。数组的键名保留不变。
如果返回 false 当前值丢弃

array_values()
返回数组中所有的值并给其建立数字索引。
重置索引

array_map("array_value",$array);//重置二维数组内部的索引