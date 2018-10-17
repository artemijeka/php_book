<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 15:23
 */

namespace MVCExample\Controllers;


class MainController
{
    public function main()
    {
        echo 'Главная страница';
    }

    public function sayHello(string $name)
    {
        echo 'Привет, ' . $name;
    }

    public function sayBye(string $name)
    {
        echo 'Пока, ' . $name;
    }
}
/**
 * Публичные методы контроллера ещё называются action-ами (от англ. action - действие).
 */