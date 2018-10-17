<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 17:55
 */
/**
 * Домашка:
 * У вас есть переменная $url = '/post/892';
 *
 * С помощью регулярных выражений выдерните из этой переменной 2 значения и положите их в переменные:
 * $controller - сюда положите строку 'post'
 * $id - сюда положите число 892
 */
$preg = '/\/(?P<controller>[a-z]{1,99})\/(?P<id>[0-9]{1,99})/';
$url = '/post/892';
preg_match($preg, $url, $match);

$controller = $match['controller'];
$id = $match['id'];
var_dump($controller, $id);
