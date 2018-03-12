select id,AVG(cast),SUM(cast),COUNT(cast) from shop_goods_order  GROUP BY uid

min()

DISTINCT

用这些聚合函数
查询出来不符合单值规则

mysql有不可靠数据，返回这一组的第一条记录

解决办法
把不需要的字段剔除掉
只查询功能依赖的字段

对额外的列使用聚合函数
max()来控制

连接同组所有的值
GROUP_CONCAT





