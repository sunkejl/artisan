FROM sunke/memcache_1_4_15
RUN mkdir -p /data1/tmp
RUN echo "#! /bin/bash" >> /data1/start_memcache.sh
RUN echo "/usr/bin/memcached -u sk -d">>/data1/start_memcache.sh
RUN echo "/bin/bash">>/data1/start_memcache.sh
RUN chmod +x  /data1/start_memcache.sh
ENTRYPOINT ["/data1/start_memcache.sh"]
