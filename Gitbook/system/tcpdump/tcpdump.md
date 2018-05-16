网卡设置为混杂模式
让网卡抓取任何经过它的数据包，不管这个数据包是不是发给它或者是它发出的

ifconfig enp0s3 promisc  //网卡设置为混杂模式
tcpdump -i enp0s3   //tcpdump enp0s3网卡

