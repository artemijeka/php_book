<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.10.18
 * Time: 7:40
 */
////////////////////////////////////////////////////////////////////////////////////////////////////
/********************************************* TRAITS *********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
trait SayYourClass
{
    public function sayYourClass(): string
    {
        /**
         * ИмяКласса::class
         * В PHP можно получить имя класса с помощью конструкции ИмяКласса::class. Например:
         *
         * echo Box::class;
         */
        return 'My class is ' . self::class . '<br>';
    }
}

/**
 * Опционально:
 * Давайте добавим интерфейс, который будет обязывать классы иметь метод sayYourClass().
 */
interface ISayYourClass
{
    public function sayYourClass(): string;
}

////////////////////////////////////////////////////////////////////////////////////////////////////
/*************************************** ПРИМЕНЕНИЕ TRAITS ***************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////

class Man implements ISayYourClass
{
    /**
     * USE TraitName;
     */
    use SayYourClass;
}

class Box implements ISayYourClass
{
    use SayYourClass;
}

$man = new Man();
$box = new Box();

echo $man->sayYourClass(); // My class is Man
echo $box->sayYourClass(); // My class is Box
