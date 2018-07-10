共同聊天
nc -l 1567
netcat 23.105.217.208 1567
 
netcat 192.168.9.79 31338
netcat -l -p 31338
 
netcat -v -w 30 -p 31338 -l <index.txt                                  178 发送txt
netcat -v -w 30   192.168.8.178 31338 > index.txt       79接收txt
 
 
 
193  wget https://sourceforge.net/projects/netcat/files/netcat/0.7.1/netcat-0.7.1.tar.gz
194  ll
195  tar -zxf netcat-0.7.1.tar.gz 
196  ll
197  cd netcat-0.7.1
198  ll
199  ./configure 
200  make
201  make install
 