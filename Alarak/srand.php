<?php
//srand()就是给rand()提供种子seed 如果srand每次输入的数值是一样的，那么每次运行产生的随机数也是一样的
srand(5);
echo(rand(1, 100));
srand(5);
echo(rand(1, 10));
srand(5);
echo(rand(1, 10));
