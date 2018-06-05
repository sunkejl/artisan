FROM centos
RUN yum -y update
RUN mkdir -p /data/shadow
RUN cd /data/shadow
RUN curl "https://bootstrap.pypa.io/get-pip.py" -o "get-pip.py"
RUN python get-pip.py

RUN pip install --upgrade pip
RUN pip install shadowsocks

RUN yum install -y wget
RUN wget "http://7xsqmn.com1.z0.glb.clouddn.com/shadowsocks.json" -O /etc/shadowsocks.json
RUN echo "#!/bin/bash" >/data/shadow/ss.sh
RUN echo "nohup ssserver -c /etc/shadowsocks.json >/data/shadow/access.log 2>&1 &" >>/data/shadow/ss.sh
RUN chmod +x /data/shadow/ss.sh
RUN echo "docker run -it -d -p 8723:8388 sk_ss"

CMD bash
