<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11.10.18
 * Time: 6:05
 */

class User
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Cat
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Article
{
    private $title;
    private $text;
    private $author;
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    /********************************* КЛАСС КАК ТИП ВХОДЯЩИХ ДАННЫХ *********************************/
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Здесь передается в качестве типа автора статьи экземпляр класса User:
     */
    public function __construct(string $title, string $text, User $author)
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
     * Здесь в качестве полученного объекта ожидается объект класса User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }
}

$author = new User('Иван');
$cat = new Cat('Барсик');
/**
 * Ахтунг!
 * Это, разумеется, приведет к ошибке. Третий аргумент должен быть с типом User, а передан Cat:
 */
$article = new Article('Заголовок', 'Текст', $cat);

/**
 * Давайте создадим класс Admin, который будет наследником класса User.
 * И попробуем передать его в качестве автора статьи:
 */
class Admin extends User
{
}

$author = new Admin('Пётр');
$article = new Article('Заголовок', 'Текст', $author);
/**
 * Такой код корректно отработает, потому что Admin – это тоже User. Обратное, разумеется, неверно.
 * Если мы в конструкторе статьи разрешим в качестве автора передавать только объекты класса Admin,
 * то если туда передадим объект класса User, то скрипт упадёт с ошибкой, потому что не всякий User является Admin-ом.
 */
