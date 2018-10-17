<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 12.10.18
 * Time: 9:50
 */
////////////////////////////////////////////////////////////////////////////////////////////////////
/**************************************** CLASS AUTOLOADER ****************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
function autoLoaderClass(string $className)
{
    require_once __DIR__ . "/../src/" . str_replace('\\', '/', $className) . ".php";
}

spl_autoload_register('autoLoaderClass');