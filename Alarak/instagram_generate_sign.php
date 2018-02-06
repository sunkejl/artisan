<?php
function generate_sig($endpoint, $params, $secret)
{
    $sig = $endpoint;
    ksort($params);
    foreach ($params as $key => $val) {
        $sig .= "|$key=$val";
    }
    return hash_hmac('sha256', $sig, $secret, false);
}

$endpoint = '/media/657988443280050001_25025320';
$params = array(
    'access_token' => 'fb2e77d.47a0479900504cb3ab4a1f626d174d2d',
    'count' => 10,
);
$secret = '6dc1787668c64c939929c17683d7cb74';

$sig = generate_sig($endpoint, $params, $secret);
echo $sig;
//https://www.instagram.com/developer/secure-api-requests/
