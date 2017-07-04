$server=$container->getServer("serverName");
$server获取的是闭包
$server()返回的是实例化的对象
只有实际调用才会去实例化具体的类。
