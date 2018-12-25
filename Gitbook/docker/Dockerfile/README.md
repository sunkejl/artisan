vim /dockerfile_dir/Dockerfile


docker build -t MY_IMAGE_NAME DOCKERFILE_DIR





FROM n1
ENTRYPOINT ["/home/www/s.sh"]


s.sh

  1 #! /bin/bash
  2 nohup /usr/sbin/nginx >>/tmp/a.out 2>&1 &
  3 #tail -f /dev/null
  4 /bin/bash


