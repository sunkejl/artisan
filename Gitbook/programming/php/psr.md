# PHP标准

旧的框架是单独开发 不能和其他框架共享代码 没有考虑到和其他框架共享代码

改进框架内的通信 提升效率

日志类monolog
请求响应类httpfoundation

php-fig指定推荐规范 实现框架的互操作性 通过接口 自动加载和标准的风格 让框架相互合作

PSR PHP standards recommendation PHP推荐标准

PSR-0
废弃 并且被PSR-4取代
PSR-1
PHP标签
编码 UTF-8
目的 一个文件可以定义符号（类 性状 函数 常量等） 或者 执行操作（生成结果 处理数据）但不能同时做俩件事
类的名称 CamelCase 首字母大写
常量 全部大写LET_OUR
方法名称 camelCase 首字母小写

PSR-2
推荐使用4个空格缩进 原因不同编辑器制表符渲染效果不一致
不能使用关闭标签 ?> 关闭标签后面如果有空格会被当作输出 导致错误
关键词 true false null 必须小写
命名空间后面必须加空格
abstract或final必须放在如pulbic关键字之前
static 必须放在关键词之后

PSR-3
规定PHP日志组件可以实现的方法
必须实现Psr\Log\LoggerInterface 的接口 实现里面的9个方法
每个方法必须接受俩个参数 第一个$message必须是字符串 第二个可选 是数组$context关联数组 键是占位符名称 值 是替换文本中的占位符

PSR-4
PSR-4会把命名空间的前缀和文件系统的目录对应起来
建议如何使用文件目录结构和命名空间组织代码
composer会自动生成PSR-4自动加载器





