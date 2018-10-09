<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 04.09.18
 * Time: 11:55
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
/************************************** ПОДКЛЮЧЕНИЕ ФАЙЛОВ: **************************************/
/**
 * include позволяет выполнять код с удаленных серверов.
 */
include('file.php'); // запрос и подключение кажый раз снова
include_once('file.php'); // запрос и подключение однажды
require('file.php'); // затребование и подключение кажый раз снова
require_once('file.php'); // затребование и подключение однажды

// не сработает, интерпретируется как include(('vars.php') == TRUE), то есть include('')
if (include('vars.php') == TRUE) {
    echo 'OK';
}

// сработает
if ((include 'vars.php') == TRUE) {
    echo 'OK';
}

/**
 * So you can move script anywhere in web-project tree without changes.
 */
include $_SERVER['DOCUMENT_ROOT']."/lib/sample.lib.php";