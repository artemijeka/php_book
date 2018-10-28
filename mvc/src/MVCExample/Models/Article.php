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
     * @return int
     */
    public function getAuthorId(): int
    {
        return (int) $this->authorId;
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