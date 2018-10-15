文件锁
http://php.net/manual/zh/function.flock.php
 
<?php
 
$fp = fopen("/tmp/lock.txt", "r+");
 
if (flock($fp, LOCK_EX)) {  // 进行排它型锁定
    ftruncate($fp, 0);      // truncate file
    fwrite($fp, "Write something here\n");
    fflush($fp);            // flush output before releasing the lock
    flock($fp, LOCK_UN);    // 释放锁定
} else {
    echo "Couldn't get the lock!";
}
 
fclose($fp);
 
?>
