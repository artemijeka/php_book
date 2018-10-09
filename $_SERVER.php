<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.09.18
 * Time: 11:56
 */

/**
 * ПОЛУЧИТЬ АБСОЛЮТНЫЙ ПУТЬ ДО ТЕКУЩЕГО СКРИПТА
 */
$_SERVER['REQUEST_URI'];

/**
 * Абсолютный путь к исполняемому скрипту. От корня сервера.
 */
$_SERVER['SCRIPT_FILENAME']; // '/home/artem/Dropbox/WebMaster/Projects/webshake/24/index.php'

/**
 * Имя исполняемого скрипта, относящегося к корню документа.
 * От корня домена.
 */
$_SERVER['PHP_SELF']; // '/24/index.php'

// Get HTTP/HTTPS (the possible values for this vary from server to server)
$myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
// Get domain portion
$myUrl .= '://'.$_SERVER['HTTP_HOST'];
// Get path to script
$myUrl .= $_SERVER['REQUEST_URI'];
// Add path info, if any
if (!empty($_SERVER['PATH_INFO'])) $myUrl .= $_SERVER['PATH_INFO'];
// Add query string, if any (some servers include a ?, some don't)
if (!empty($_SERVER['QUERY_STRING'])) $myUrl .= '?'.ltrim($_SERVER['REQUEST_URI'],'?');

echo $myUrl;