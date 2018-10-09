<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.10.18
 * Time: 9:50
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
/********************************************* EXTEND *********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Пусть есть класс-родиель:
 */
class Post
{
    protected $title;
    protected $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////
/************************************ ПРИМЕНЕНИЕ НАСЛЕДОВАНИЯ: ************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Lesson - класс-наследник
 * Ключевое слово "extends" (расширять)
 */
class Lesson extends Post // Lesson называют классом-наследником, или дочерним классом. Класс Post – родительский класс.
{
    private $homework; // здесь уже приватное свойство

    public function __construct(string $title, string $text, string $homework)
    {
        /**
         * PARENT:: ВЫЗОВ РОДИТЕЛЬСКОГО МЕТОДА
         *
         * К методам классов обращаются через ::
         */
        parent::__construct($title, $text);
        /**
         * В момент вызова конструктора класса Lesson (при создании нового объекта), сначала произойдёт вызов метода
         * __construct из родительского класса, а затем задастся свойство homework. При этом этот метод из родительского
         * класса отработает для свойств класса-наследника. Можно представить, что мы просто скопировали сюда содержимое
         * этого метода из класса Post и вставили его сюда. Именно так и происходит, когда этот код выполняется.
         */
        $this->homework = $homework;
    }

    public function getHomework(): string
    {
        return $this->homework;
    }

    public function setHomework(string $homework): void
    {
        $this->homework = $homework;
    }
}

/**
 * В качестве родительского класса при помощи слова extends можно указать только один класс.
 * Однако, у класса Lesson, в свою очередь, тоже могут быть наследники.
 * Они унаследуют все свойства и методы всех своих родителей.
 * При этом доступными внутри объектов класса-наследника будут только свойства или методы, объявленные в родительском
 * классе как public или protected. Свойства и методы, с модификатором доступа private
 * не будут унаследованы дочерними классами.
 */

/**
 * При этом в объектах класса Lesson нам так же доступны все protected- и public-методы,
 * объявленные в родительском классе. Давайте убедимся, в этом.
 */
//$lesson = new Lesson('Заголовок', 'Текст', 'Домашка');
//echo 'Название урока: ' . $lesson->getTitle();

/**
 * НАСЛЕДНИК НАСЛЕДНИКА (внук)
 */
class PaidLesson extends Lesson
{
    private $price;

    public function __construct(string $title, string $text, string $homework, float $price)
    {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
