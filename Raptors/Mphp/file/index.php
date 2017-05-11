<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 11:23
 */
$fp = fopen("lock.txt", "a+");

if (flock($fp,LOCK_EX|LOCK_NB)) {  // 进行排它型锁定 不写LOCK_NB则是堵塞  如果不希望 flock() 在锁定时堵塞，则是 LOCK_NB  不能单独写LOCK_NB)
    ob_start();
    echo "lock_ex";
    ob_flush();
    ftruncate($fp, 0);      // truncate file
    fwrite($fp, "Write something here\n");
    fflush($fp);            // flush output before releasing the lock
    sleep(10);
    flock($fp, LOCK_UN);    // 释放锁定
} else {
    echo "Couldn't get the lock!";
}

fclose($fp);