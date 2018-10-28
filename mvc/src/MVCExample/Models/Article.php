<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 11:22 AM
 */

namespace MVCExample\Models;

/**
 * Наследуемся от полученного класса и убираем лишнее. Обратите внимание, свойства теперь становятся не private,
 * а protected, чтобы к ним можно было достучаться из класса-родителя.
 */
use \MVCExample\Models\ActiveRecordEntity;

use \MVCExample\Models\User;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var string */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return User
     * Прямо в геттере просим сущность юзера выполнить запрос в базу и получить нужного пользователя, по id,
     * который хранится в статье. При этом запрос будет выполнен только если мы вызовем этот геттер.
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    /**
     * @return string А теперь давайте попробуем избавиться от зависимости от таблицы “articles”.
     * Вынесем получение названия таблицы в отдельный метод. Вот так:     *
     */
    protected static function getTableName(): string
    {
        return 'articles';
    }
}