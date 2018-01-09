<?php
//高级加密标准（英语：Advanced Encryption Standard，缩写：AES） 对称加密

//mcrypt 扩展已经过时了大约10年，并且用起来很复杂。因此它被废弃并且被 OpenSSL 所取代。 从PHP 7.2起它将被从核心代码中移除并且移到PECL中。
//http://php.net/manual/zh/migration71.deprecated.php
//http://php.net/manual/zh/function.mcrypt-encrypt.php

//(PHP 5 >= 5.3.0, PHP 7) openssl_encrypt
//http://php.net/manual/en/function.openssl-encrypt.php
/**
 * if (!isset($_SESSION['pwd'])) {$_SESSION['pwd'] = md5(rand(0, 100000000));}$pwd = $_SESSION['pwd'];$key = $_SERVER['REMOTE_ADDR'] . time() . $pwd;
 *  $sign = base64_encode($this->encrypt($key, 123));
 * @param $decrypted
 * @param $password
 * @param string $salt
 * @return bool|string
 */
function encrypt($decrypted, $password, $salt = '!kQm*fF3pXe1Kbm%9')
{
    //密钥应该是随机的二进制数据
    $key = hash('SHA256', $salt . $password, true);
    srand();
    //初始向量
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
    if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22) {
        return false;
    }
    //加密的时候原值上加md5
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
    return $iv_base64 . $encrypted;
}

/**
 * $decrypt = $this->decrypt(base64_decode($sign), 123);$md5pwd = substr($decrypt, -32);
 * @param $encrypted
 * @param $password
 * @param string $salt
 * @return bool|string
 */
function decrypt($encrypted, $password, $salt = '!kQm*fF3pXe1Kbm%9')
{
    //密钥应该是随机的二进制数据
    $key = hash('SHA256', $salt . $password, true);
    //使用 MIME base64 对数据进行编码 减少33%空间,也可重新写
    $iv = base64_decode(substr($encrypted, 0, 22) . '==');#
    $encrypted = substr($encrypted, 22);
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0\4");
    //算出md5加密的后32位字符
    $hash = substr($decrypted, -32);
    $decrypted = substr($decrypted, 0, -32);
    if (md5($decrypted) != $hash) {
        return false;
    }

    return $decrypted;
}
