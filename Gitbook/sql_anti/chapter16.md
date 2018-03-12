select * from shop_goods_order ORDER BY RAND() limit 1

按序排列 可复用
rand 也会进行排序 不可复用

rand 没有索引 无法预测

数据小 没问题
数据大 就会变慢


解决方法
从1到最大的id  选择一个出来
可以用sql语言一条sql实现 也可以用程序 查询俩次





