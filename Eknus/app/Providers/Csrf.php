<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 11:51
 */

namespace App\Providers;


use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManager;

class Csrf
{
    public function getCsrfTokenManager()
    {
        return new CsrfTokenManager();
    }

    public function refreshToken($tokenName)
    {
        return $this->getCsrfTokenManager()->refreshToken($tokenName)->getValue();
    }

    public function getToken($tokenName)
    {
        return $this->getCsrfTokenManager()->getToken($tokenName)->getValue();
    }

    public function isTokenValid($tokenName, $tokenValue)
    {
        return $this->getCsrfTokenManager()->isTokenValid(new CsrfToken($tokenName, $tokenValue));
    }

}