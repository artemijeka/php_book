<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 15:27
 */
/**
 ***************************************** ФРОНТ КОНТРОЛЛЕР - FRONT CONTROLLER ****************************************
 * Чем же тогда является index.php? Это ведь и точка входа, и место,
 * где мы создаём сам контроллер и вызываем его методы.
 * Этот кусок кода называется фронт-контроллером.
 */
require_once '../config.php';
require_once '../src/autoLoader.php';

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/../src/routes.php';

$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
//    var_dump($matches);
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}
unset($matches[0]);

$controllerName = $controllerAndAction[0]; // '\MVCExample\Controllers\MainController'
$actionName = $controllerAndAction[1]; // 'main' или 'sayHello' или другое из массива в routes.php
/**
 * Да! Прямо вот так! Переменную можно использовать в качестве имени класса при создании объекта.
 */

$controller = new $controllerName();
/**
 * И даже вместо имени метода! $actionName()
 *
 * Остаётся только один вопрос – как элементы массива передать в аргументы метода? Для этого в PHP есть
 * специальный оператор троеточия: method(...$array)
 * Он передаст элементы массива в качестве аргументов методу в том порядке, в котором они находятся в массиве.
 */
$controller->$actionName(...$matches);



////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
/*********************************************** V ДЗ 3: ****************************************************************
 * В экшне ArticlesController::view() после получения статьи, добавьте ещё один запрос на получение автора
 * этой статьи из таблицы users. Выведите nickname автора в шаблоне.
 **********************************************************************************************************************/

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** V ДЗ 2: **********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * V Сделайте чтобы title для каждой страницы можно было задавать через переменную для шаблона.
 * В случае, когда title не передан, выводите заголовок по умолчанию - "Мой блог".
 * Для страницы /hello/username сделайте title "Страница приветствия".
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** V ДЗ 1: **********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Создайте еще один экшн в контроллере – sayBye(string $name), который будет выводить «Пока, $name».
 * Добавьте для него роут /bye/$name и убедитесь, что всё работает.
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
/********************************************** ЧПУ **********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
//var_dump($_GET['route']); // <--- .htaccess

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** РОУТИНГ ********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
//$route = $_GET['route'] ?? '';
//$pattern = '~^hello/(.*)$~';
/**
 * Обратите внимание – в качестве ограничителя шаблона регулярного выражения мы использовали тильду - ~.
 * Мы выбрали её вместо слэша, чтобы не экранировать слэш в адресной строке.
 * Напомню, что в качестве ограничителя может выступать вообще любой символ.
 */
//preg_match($pattern, $route, $matches);
//var_dump($matches);
/**
 * array (size=2)
 * 0 => string 'hello/username' (length=14) Нулевой элемент – полное совпадение по паттерну.
 * 1 => string 'username' (length=8) Первый элемент – значение, попавшее в маску (.*), то есть всё, что идёт после hello/.
 */