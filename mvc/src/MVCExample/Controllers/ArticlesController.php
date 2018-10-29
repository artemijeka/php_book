<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 8:27 AM
 */

namespace MVCExample\Controllers;

use \MVCExample\Models\Article;
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

        /********************************** PHP Reflection API ***********************************
         *
         */
        $reflector = new \ReflectionObject($article);
        $properties = $reflector->getProperties();
        $propertiesNames = [];
        foreach ($properties as $property) {
            $propertiesNames[] = $property->getName();
        }
        var_dump($propertiesNames);
        return;

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
        $this->view->renderHtml('articles/view.php', [
            'article' => $article
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