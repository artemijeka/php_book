<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 17.10.18
 * Time: 9:37
 */

namespace MVCExample\Views;

class View
{
    private $templatesPath;

    /**
     * В конструкторе этого класса мы будем принимать путь до папки с шаблонами:
     */
    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    /**
     * Давайте добавим метод, в который будем передавать имя конкретного шаблона и массив с переменными.
     */
    public function renderHtml(string $templateName, array $vars)
    {
        /**
         * Функция extract извлекает массив в переменные. То есть она делает следующее:
         * в неё передаётся массив ['key1' => 1, 'key2' => 2],
         * а после её вызова у нас имеются переменные $key1 = 1 и $key2 = 2.
         */
        extract($vars);

        /**
         * Пока просто вывод из буфера БЕЗ обработки ошибок.
         */
        ob_start(); // out buffer start
        include $this->templatesPath . '/' . $templateName;
        $buffer = ob_get_contents(); // out buffer get contents which is upstairs (вверх по лестнице)
        ob_end_clean(); // out buffer end and clean

        echo $buffer;
    }
}