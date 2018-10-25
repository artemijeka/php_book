<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 11:22 AM
 */
namespace MVCExample\Models;

use \MVCExample\Models\User;

class Article
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $text;

    /** @var string */
    private $authorId;

    /** @var string */
    private $createdAt;

    /************************** __set - Метод для отлова несуществующих свойст с значениями **************************/
    /**
     * Проблему с несоответствием имён легко решить с помощью магического метода __set($name, $value) –
     * если этот метод добавить в класс и попытаться задать ему несуществующее свойство,
     * то вместо динамического добавления такого свойства, будет вызван этот метод. При этом в первый аргумент $name,
     * попадёт имя свойства, а во второй аргумент $value – его значение. А внутри этого метода мы уже сможем решить,
     * что с этими данными делать.
     * В качестве примера давайте добавим в класс Article этот метод. Всё, что он будет делать – это говорить о том,
     * что он был вызван и какие аргументы были в него переданы.
     */
    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

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
     * Функция ucwords() делает первые буквы в словах большими, первым аргументом она принимает строку со словами,
     * вторым аргументом – символ-разделитель (то, что стоит между словами).
     *
     * После этого строка string_with_smth преобразуется к виду String_With_Smth
     * Функция strreplace() заменяет в получившейся строке все символы ‘’ на пустую строку
     * (то есть она просто убирает их из строки). После этого мы получаем строку StringWithSmth
     *
     * Функция lcfirst() просто делает первую букву в строке маленькой. В результате получается строка stringWithSmth.
     * И это значение возвращается этим методом.
     */
    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
    /**
     * Таким образом, если мы передадим в этот метод строку «created_at», он вернёт нам строку «createdAt»,
     * если передадим «author_id», то он вернёт «authorId». Именно то, что нам нужно!
     */
}