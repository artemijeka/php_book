<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 8:35 AM
 */
/************************************************** ДОБАВЛЕНИЕ РОУТА **************************************************/
/**
 * Пусть наши статьи будут открываться по адресу типа: http://mvc/articles/1
 * где вместо 1 может быть любой другой id статьи.
 *
 * src/routes.php:+
 */
return [
    '~^articles/(\d+)$~' => [\MVCExample\Controllers\ArticlesController::class, 'view']
];
