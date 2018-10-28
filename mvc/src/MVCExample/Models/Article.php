<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 11:22 AM
 */

namespace MVCExample\Models;

use \MVCExample\Services\Db;


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
     * @return Article[]
     *
     * Обратиться к сущности, не создавая её, но чтобы она при этом вернула нам созданные сущности.
     * Вспоминаем статические методы – их ведь можно вызывать, не создавая объекта. То, что нам нужно!
     */
    public static function findAll(): array
    {
        $db = new Db();
        /**
         * можно заменить Article::class на self::class – и сюда автоматически подставится класс, в котором этот метод
         * определен. А можно заменить его и вовсе на static::class – тогда будет подставлено имя класса,
         * у которого этот метод был вызван. В чём разница? Если мы создадим класс-наследник SuperArticle,
         * он унаследует этот метод от родителя. Если будет использоваться self:class, то там будет значение “Article”,
         * а если мы напишем static::class, то там уже будет значение “SuperArticle”. Это называется поздним статическим
         * связыванием – благодаря нему мы можем писать код, который будет зависеть от класса, в котором он вызывается,
         * а не в котором он описан.
         */
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    /**
     * А теперь давайте попробуем избавиться от зависимости от таблицы “articles”.
     * Вынесем получение названия таблицы в отдельный метод. Вот так:
     */
    private static function getTableName(): string
    {
        return 'articles';
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