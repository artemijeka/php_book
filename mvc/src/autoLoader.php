<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 15:33
 */
function autoLoader(string $className)
{
    require_once __DIR__ . "/../src/" . str_replace('\\', '/', $className) . ".php";
}

spl_autoload_register('autoLoader');