<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 12.10.18
 * Time: 7:00
 */

namespace Models\Articles;
////////////////////////////////////////////////////////////////////////////////////////////////////
/***************************************** USE NAMESPACES *****************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Добавить возможность использовать класс User в текущем классе.
 *
 * use Path\To\Some\NameClass; - все слова с главной по стандарту PSR.
 */
use \Models\Users\User;

class Article
{
    private $title;
    private $text;
    private $author;

    /**
     * Вместо use можно непосредственно указывать в коде к какому классу мы обращемся.
     * Например:
     * Вместо User можно написать \Models\Users\User
     */
    public function __construct(string $title, string $text, User $author) // или вместо use можно "\Models\Users\User"
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Чтобы конкретно сказать какого класса должен быть вывод можно указать:
     * : \Models\Users\User - сразу после имени метода
     */
    public function getAuthor() // вместо use можно ": \Models\Users\User"
    {
        return $this->author;
    }
}
