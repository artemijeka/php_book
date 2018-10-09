<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 08.10.18
 * Time: 17:53
 */

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************* INTERFACE *******************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Интерфейс – это описание public методов, которые представляют собой только название метода,
 * описание их аргументов и возвращаемый тип. Тело метода в интерфейсе не описывается.
 */
interface CalculateSquare
{
    public function calculateSquare(): float;
}

/**
 * Что ещё стоит сказать об интерфейсах – один интерфейс может содержать требования по реализации нескольких методов.
 * Они просто перечисляются один за другим, вот так:
 */
//interface CalculateSquare
//{
//    public function calculateSquare(): float;
//
//    public function getId(): int;
//}

/**
 * Круг.
 *
 * Чтобы обязать класс реализовать этот интерфейс нужно использовать слово implements после имени класса.
 */
class Circle implements CalculateSquare
{
    /**
     * Константы принято задавать в самом начале класса и называть их CAPS-ом с подчеркушками.
     * Вот примеры того, как могут называться константы:
     * DB_NAME, COUNT_OF_OBJECTS.
     */
    const PI = 3.1416;
    private $r;

//    public $name = 'Circle';

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float
    {
        ////////////////////////////////////////////////////////////////////////////////////////////////////
        /********************************************* SELF: *********************************************/
        ////////////////////////////////////////////////////////////////////////////////////////////////////
        /**
         * SELF - ключевое слово
         * ОБРАЩЕНИЕ К ТЕКУЩЕМУ КЛАССУ
         *
         * Для того, чтобы обратиться к константе, нужно использовать конструкцию self::ИМЯ_КОНСТАНТЫ,
         * или ИмяКласса::ИМЯ_КОНСТАНТЫ.
         *
         * Ключевое слово self – это обращение к текущему классу (как $this – обращение к текущему объекту,
         * не путайте эти понятия). Константы принадлежат классу, а не его объектам.
         */
        return self::PI * ($this->r ** 2);
    }
}

/**
 * Один класс может реализовывать сразу несколько интерфейсов, в таком случае они просто перечисляются через запятую.
 */
//class Circle implements CalculateSquare, Interface2, Interface3
//{
//}

/**
 * Прямоугольник.
 */
class Rectangle
{
    private $x;
    private $y;

//    public $name = 'Rectangle';

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}

/**
 * Квадрат.
 */
class Square implements CalculateSquare
{
    private $x;

//    public $name = 'Square';

    public function __construct(float $x)
    {
        $this->x = $x;
    }

    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////
/****************************************** INSTANCEOF: ******************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * INSTANCEOF - конструкция.
 * С её помощью можно понять, является ли объект экземпляром класса, или реализует интерфейс.
 */
//$circle1 = new Circle(2.5);
//var_dump($circle1 instanceof Circle); // boolean true
//var_dump($circle1 instanceof Rectangle); // boolean false
//var_dump($circle1 instanceof CalculateSquare); // boolean true реализует interface CalculateSquare

//$objects = [
//    new Square(5),
//    new Rectangle(2, 4),
//    new Circle(5)
//];
//
//foreach ($objects as $object) {
//    if ($object instanceof CalculateSquare) {
//        echo 'Объект "' . get_class($object) . '" реализует интерфейс CalculateSquare. Площадь: ' . $object->calculateSquare();
//        echo '<br>';
//    } else {
//        echo 'Объект класса "' . get_class($object) . '" не реализует интерфейс CalculateSquare.';
//        echo '<br>';
//    }
//}

