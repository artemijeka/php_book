<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 15:23
 */

namespace MVCExample\Controllers;

use \MVCExample\Services\Db;
use \MVCExample\Models\Article;
use \MVCExample\Views\View;

class MainController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        /**
         * Чтобы не писать include __DIR__ . '/../../../templates/main/main.php';
         */
        $this->view = new View(__DIR__ . '/../../../templates/');
        /**
         * Cоздаем подключение к базе данных при вызове главного контроллера.
         */
        $this->db = new Db();
    }

    /**
     * Получаем статьи с помощью pdo из БД.
     */
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
    }

    public function sayBye(string $name)
    {
        /**
         * title не передан и по этому отрабатывает "<?=$title ?? 'Мой блог'?>" в header.php
         */
        $this->view->renderHtml('main/bye.php', ['name' => $name]);
    }
}
/**
 * Публичные методы контроллера ещё называются action-ами (от англ. action - действие).
 */