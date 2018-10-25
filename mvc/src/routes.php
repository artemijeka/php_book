<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 19:01
 */

/**
 * То есть это просто массив, у которого ключи – это регулярка для адреса,
 * а значение – это массив с двумя значениями – именем контроллера и названием метода.
 */
return [
    /**
     * Обязательно сообщаем, что MainController является (статическим) классом с помощью ::class
     */
    '~^hello/(.*)$~' => [\MVCExample\Controllers\MainController::class, 'sayHello'],
    '~^articles/(\d+)$~' => [\MVCExample\Controllers\ArticlesController::class, 'view'],
    '~^bye/(.*)$~' => [\MVCExample\Controllers\MainController::class, 'sayBye'],
    '~^$~' => [\MVCExample\Controllers\MainController::class, 'main']
];