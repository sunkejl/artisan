树
实例称为节点node，每个节点有多个子节点和父节点
最上层的节点叫根root节点，它没有父节点
最底层的没有子节点的节点叫叶leaf
中间的节点称为非叶noleaf

最常见的方案是添加parent_id字段
这种设计啊叫邻接表
邻接表 parent_id


为什么是反模式 因为它无法查询一个节点的所有后代

树的特性就是它可以任意深的扩展

解决方法
1
路径枚举
unix路径/usr/local/lib 就是路径枚举

path 1/4/5/6

通过like 来查询所有的父节点 和 所有的后台

插入一个子节点 先插入父节点 不包括当前id 利用LAST_INSERT_ID()来更新插入的ID
缺点 varchar长度 不支持无限扩展

2
闭包表
记录树中所有节点的关系
新建一张表 包含俩列 一个祖先 一个后代
1 1
1 2
1 3
2 2
2 3
3 3
3 4

改变节点关系时候 并不是真的删除，把关系路径存储独立开，使设计更加灵活

邻接表最方便 

枚举路径 直观展示 路径 不能确保完整性 脆弱 数据存储冗余

闭包 需要额外的表来记录


