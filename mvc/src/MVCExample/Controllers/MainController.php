<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 15:23
 */

namespace MVCExample\Controllers;

use \MVCExample\Views\View;

class MainController
{
    private $view;

    public function __construct()
    {
        /**
         * Чтобы не писать include __DIR__ . '/../../../templates/main/main.php';
         * В front controller (index.php) мы подключили config.php(в корневой дирректории),
         * в котором BASE = __DIR__ то есть корню веб прилодения.
         */
        $this->view = new View(__DIR__ . '/../../../templates/');
    }

    public function main()
    {
        $articles = [
            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
            ['name' => 'Статья 2', 'text' => 'Текст статьи 2'],
        ];
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        echo 'Привет, ' . $name;
        $this->view->renderHtml('main/hello.php', ['name' => $name]);
    }

    public function sayBye(string $name)
    {
        echo 'Пока, ' . $name;
    }
}
/**
 * Публичные методы контроллера ещё называются action-ами (от англ. action - действие).
 */