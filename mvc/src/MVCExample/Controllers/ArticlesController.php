<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 8:27 AM
 */

namespace MVCExample\Controllers;

use \MVCExample\Services\Db;
use \MVCExample\Views\View;
use \MVCExample\Models\Article;

class ArticlesController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = new Db();
    }

    public function view(int $articleId) // http://mvc/articles/1 - число с id статьи
    {
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId],
            Article::class
        );

        /**
         * Если result пустой то страницу ошибки выводим.
         */
        if ($result === []) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        /**
         * $result[0] - здесь будет массив с ключами и индексами с их содержимым из БД.
         */
        $this->view->renderHtml('articles/view.php', ['article' => $result[0]]);
        /**
         * После передачи в renderHtml происходит разбор этого массива
         * на переменные и значения с помощью extract($vars);
         * $id = 1;
         * $name = 'Заголовок статьи';
         * $text = 'Текст статьи Текст статьи Текст статьи';
         */
    }
}