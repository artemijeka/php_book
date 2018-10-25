<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 15:33
 */
/**
 * spl_autoload_register загружает автоматически классы которые объявляются в документе с помощью функции autoLoader
 */
spl_autoload_register('autoLoader');
function autoLoader(string $className)
{
    require_once __DIR__ . "/" . str_replace('\\', '/', $className) . ".php";
}