select case when password = "123" then 1 else 0 end as p from accounts where id =1;

单向哈希函数对密码加密


哈希是指把输入字符串转化成新的，不可识别的字符串的函数

使用哈希函数后，原始长度也难以猜测 因为哈希返回的字符串的长度是固定的

每个密码配上不同的随机字符串，增加字典破解的难度

使用https 防止在http传输中 数据被截获

