<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 8:27 AM
 */

namespace MVCExample\Controllers;

use \MVCExample\Models\Article;
use \MVCExample\Models\User;
use \MVCExample\Views\View;

class ArticlesController
{
    /** @var View */
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $articleId) // http://mvc/articles/1 - число с id статьи
    {
        $article = Article::getById($articleId);

        /**
         * Если $article пустой то страницу ошибки выводим.
         */
        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        /**
         * Добавляем получение нужного юзера:
         */
        $articleAuthor = User::getById($article->getAuthorId());

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'author' => $articleAuthor
        ]);

        /**
         * После передачи в renderHtml происходит разбор этого массива
         * на переменные и значения с помощью extract($vars);
         * $id = 1;
         * $name = 'Заголовок статьи';
         * $text = 'Текст статьи Текст статьи Текст статьи';
         */
    }
}