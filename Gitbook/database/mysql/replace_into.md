REPLACE INTO 原理的官方解释为：

REPLACE works exactly like INSERT, except that if an old row in the table has the same value as a new row for a PRIMARY KEY or a UNIQUE index, the old row is deleted before the new row is inserted.

如果新插入行的主键或唯一键在表中已经存在，则会删除原有记录并插入新行；如果在表中不存在，则直接插入


如AUTO_INCREMENT 为4  对 id 为1的进行replace into  会delete 1 然后insert  auto_increment变成5
binlog里会已update 记录上面的delete和insert俩次操作
主从同步时 主从切换可能会造成问题
