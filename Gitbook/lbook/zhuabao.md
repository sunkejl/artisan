tcpdump -l -i enp0s3 -w - src or dst port 80 \| strings 



  -i  interface 在接口上监听 enp0s3   

-l使stdout行缓冲。如果您想在捕获数据时查看数据，则非常有用          

