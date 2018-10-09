<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 04.09.18
 * Time: 12:21
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************* КОНСТАНТЫ *******************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * const - ключевое слово.
 *
 * Константы принято задавать в самом начале класса и называть их CAPS-ом с подчеркушками.
 * Вот примеры того, как могут называться константы: DB_NAME, COUNT_OF_OBJECTS.
 */
const PI = 3.1416;

/**
 * Cтарый метод записи:
 */
define('PI', 3.1416);

////////////////////////////////////////////////////////////////////////////////////////////////////
/************************************** ВСТРОЕННЫЕ КОНСТАНТЫ **************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * http://php.net/manual/ru/language.constants.predefined.php
 */
/**
 * Директория файла. Если используется внутри подключаемого файла, то возвращается директория этого файла.
 * Это эквивалентно вызову dirname(__FILE__). Возвращаемое имя директории не оканчивается на слеш,
 * за исключением корневой директории.
 */
__DIR__;
require __DIR__ . '/header.php'; // пример

/**
 * PHP_EOL (string)
 * Корректный символ конца строки, используемый на данной платформе. Доступно с PHP 5.0.2
 */
PHP_EOL;