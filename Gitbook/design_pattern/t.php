<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/2
 * Time: 18:16
 * /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/
 */
var_dump(preg_match("/(^\d{15}$)|(^\d{17}([0-9]|X)$)/", trim("321282198710160031")));
var_dump(preg_match("/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/", trim("321282198710160031")));
