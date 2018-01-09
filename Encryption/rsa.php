<?php

$publicKey = <<<P
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv40GKz4pAYXqMrSS+u0a
cd2A42+KzsBYgX9nrZrHhGcZoeWYPjZjqH1msoCyVlT6iqFE0oTl3FUpkigMrloN
xeaAF7zRKqFLqsTZoXHbYc7NAH0buqzhYo+jiShliZsPNnNp5spETgkF7MtZi9qT
RkHfU9f94OxTD5IEhMu28DrXp2F0o+ncBu+Ko5wy7goOiQuj98xmo401N+Gz4Ld3
lden+ionmLZ1FHLsO2tWRoZh1LlnqbluvGfLmZOCAFNDRa7X7yLWPQ+eIMQSNLmX
4328w+RqhiRyBtEHYgPwIoOGprMNgaKa4And7P7POB60kBRsEI7TPYaf6L9BfLXM
LQIDAQAB
-----END PUBLIC KEY-----
P;
$privateKey = <<<P
-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC/jQYrPikBheoy
tJL67Rpx3YDjb4rOwFiBf2etmseEZxmh5Zg+NmOofWaygLJWVPqKoUTShOXcVSmS
KAyuWg3F5oAXvNEqoUuqxNmhcdthzs0AfRu6rOFij6OJKGWJmw82c2nmykROCQXs
y1mL2pNGQd9T1/3g7FMPkgSEy7bwOtenYXSj6dwG74qjnDLuCg6JC6P3zGajjTU3
4bPgt3eV16f6KieYtnUUcuw7a1ZGhmHUuWepuW68Z8uZk4IAU0NFrtfvItY9D54g
xBI0uZfjfbzD5GqGJHIG0QdiA/Aig4amsw2BoprgCd3s/s84HrSQFGwQjtM9hp/o
v0F8tcwtAgMBAAECggEAOKlEm+IFSzgLsPgNSkB8xBXbnGtQShxHkfbX+liAkD/X
Kza5NB3umNaPXFoJZtQ4UG2n6AX74JMoet1x8tkcnd+zIFJwJQYVVexo3ALL/ECq
D2zymOOuv/LxUw8qCexeMaMuPmCyl8q/f+4fDOmZCv1NTIXlyXTelQqCX63K7YBW
7RJC2FhEwOG2ug09wCyF6jCZWYcq30UguIeWU0cwW/0/Cu5rTgV1+WWXSuZHyIJh
s0WuqrWZhitq48GJXZbTsrSeo3485403NnlqqlfPlJQYOY/boviawIoXrplPC/Rb
rOiYW8nYyyMw4D6McdKQ1K+VY9gas6cTiSS9HCrp2QKBgQDxk61P4kq36ErpC2/I
hSbARdpaoJwmk8hfCqWzOslHCZqJlxupHgbJ5hZ7Kb6uORgc5IKT6urwx6yRH64a
hVU8Efhs+FHdEuLFrMh+gBzxHAcmX4+EeNSRw0IzmpcQUhaVqsjx08wpbEr4M0JV
kkFzLJ96QxRHwMoshddp+T9rswKBgQDK/Lys5WTCOd3Q2LIOlkjT5EqsYSN2TbqJ
Wie1LllDjEv5b5UbWoi9PBm4B0YzLJfj1JH4veDzORi1be0neOB73V8V/8ILwr+0
uSu1djJm3B7rXCtq93eTPCAVdBzNJsU2DtjzZcKFkG2UC1pt3SD20HLiLM1PJEoM
wEOkedJ4nwKBgQDehQf8cFYg5tCxrz4tNzEFpJJILm8HPdMwcG9HE5w5WghGOrFY
6vaX3N/SXRZuBttGKdp5g8cbOOGk38iQV0a2yVrKjUVi3LWUHd6kXz/Je+a+GwHo
pSAwj+oX/Iqvlt2EyUbFMjF56m14CEdO6SRugaj4hndUzKmtry9IRzV67wKBgBk3
2QDp5uCya7pckZJ6XUXl4NkVoGA8O+aAitpZjcF0lqPAlxe04bQQ2WkhjjkhWyV0
7UWn4WCWQVmY9JOo0srQr9V91s+7PDHpp2J98rkQs86tvr8lS3fBSoMfz8w0+t9C
bPWgONB7JwHzfyKTDFtdfkhXJJKmgYSgBkdS0zElAoGBAJNF6bv2aRaF+McuDysr
09bR1eTamv0lKSCb27hhYg9yX+Ies25wGwCaSxOAQXPSR5n4mORtr+LWy9++zb9C
w0XM1HBHiPrYGeAqos61y060JfA0zhJsaDB3wEUVakLU61yWTdUmnDsh6X4CUmTR
RQCtVllhLQT/wfIyz7+zFpL4
-----END PRIVATE KEY-----
P;
//和openssl 命令产生一样

//如果是资源类型就是合法的密钥
$verifyPublicKey = openssl_pkey_get_public($publicKey);
$verifyPrivateKey = openssl_pkey_get_private($privateKey);
if (is_resource($verifyPrivateKey) && is_resource($verifyPrivateKey)) {
    //
}

//公钥加密
openssl_public_encrypt("hello", $after, $publicKey);

//base64加密 避免乱码 不加密 输出会有乱码
$afterBase = base64_encode($after);
var_dump($afterBase);

//公钥加密 私钥解密
openssl_public_decrypt($after, $publicStr, $publicKey);
openssl_private_decrypt($after, $privateStr, $privateKey);
var_dump($publicStr);
var_dump($privateStr);

//私钥加密 公钥解密
openssl_private_encrypt("world", $after, $privateKey);
openssl_public_decrypt($after, $str, $publicKey);
var_dump($str);



//签名用私钥
openssl_sign("world", $sign, $verifyPrivateKey,OPENSSL_ALGO_SHA1);
var_dump($sign);

//验签 用公钥
$ok = openssl_verify("world", $sign, $verifyPublicKey, OPENSSL_ALGO_SHA1);
var_dump($ok);//1 valid ; 0 invalid
exit;
//公钥与私钥是配对的，用公钥加密的文件，只有对应的私钥才能解密，反过来，用私钥加密，用对应的公钥进行解密。

//签名：发送方用一个哈希函数从报文文本中生成报文摘要，
//然后用自己的私钥对摘要进行加密，得到的就是这个报文对应的数字签名，
//通常来说，发送方会将数字签名和报文原文一并发送接收者，方便接收者进行验签。

//验签：接收方得到原始报文和数字签名后，用同一个哈希函数从报文中生成报文摘要A，
//另外，用发送方提供的公钥对数字签名进行解密，得到摘要B，对比A和B是否相同，就可得知报文有没有被篡改过。

