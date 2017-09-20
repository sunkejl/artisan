# web 应用

内容和业务逻辑分开
<?php 
if(true){
  $var=1;
}else{
  $var=2;
}
?>
<?php echo $var?>


$_REQUEST 里包含$_GET $_POST $_COOKIE 中的数据 如果有重复 会覆盖  
默认写入时EGPCS 依次覆盖
E $_ENV
G $_GET
P $_POST
C $_COOKIE
S $_SERVER

$_GET $_POST 超全局数组 在任何一个函数中都能访问 不用加global全局关键词声明

if(file_exist($module.'.php')){
  inclue $module.'.php';
}
避免include一个 远程.php文件 

addslashes() 在特殊字符前加上转义 特殊字符有 ' " \ \0

5.5.1 自定义过滤函数 对输入进行过滤

5.5.2 5.5.3 建立无序散列 防止篡改URL

error_reporting E_ALL 
$_POST 前不能加& 引用
php.ini log_errors =1 错误记录到一个文件中

ob_start(） 放在脚本的第一行 打开输出缓冲 如果没有 将从html行开始输出数据到浏览器 导致无法发送任何头部

cookie 服务器发送给浏览器 浏览器 负责发送cookie 通过请求头发送到连续的页面
删除cookie 设置时间为过去的时间 值为空 即可

session PHP会为每一个会话创建一个sessionID 它是通过 MD5 对远程IP 当前时间 随机数据进行散列处理的一个显示为16进制的字符串
可以通过cookie和Url (?PHP_SESSID=) 来传递

ini_set('session.use_coolies',1);cookie作为存放机制
ini_set('session.use_only_coolies',1);禁止url传递 检测流量时或者可以通过看日志http_referer找到session cookie数据
通过 session.save_path()设置存储文件路径

session_start() 初始化session模块 设置头信息 要在输出到浏览器数据之前运行

通过session_name('NAME')来改变sessionID 在cookie 中的值

$_SESSION['uid']="a";来赋值
unset($_SESSION['uid'])来删除
通过(!isset($_SESSION['uid']||!$_SESSION['uid']))来检查是否存在并且非零

文件上传
html:
form enctype="multipart/form-data" 
input type="hidden" name="MAX_FILE_SIZE" value="16000"
input type="file"

php:
move_uploaded_file()移动文件到目的地

单一脚本响应 所有请求
1 switch 参数
2 参数多的话switch过于庞大 动态加载 









