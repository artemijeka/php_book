<?php
////////////////////////////////////////////////////////////////////////////////////////////////////
/****************************************** ПЕРЕМЕННЫЕ: ******************************************/
/**
 * Явное определение типа переменной.
 */
// ЯВНОЕ ЗАДАНИЕ ТИПА ПЕРЕМЕННОЙ:
(int)$var = 5; // тип переменной указывается перед переменной в скобках через пробел
/* Имя класса */
// 5.0.0 Должен быть экземпляром класса.
/* array */
// 5.1.0 Должен быть массивом.
/* callable */
// 5.4.0 Должен быть чем-то, представляющим функцию или метод, которые можно вызвать.
/* bool */
// 7.0.0 Должен быть логическим значением true или false.
/* float */
// 7.0.0 Должен быть числом с плавающей точкой.
/* int */
// 7.0.0 Должен быть целым числом.
/* string */
// 7.0.0 Должен быть символьной строкой.
/**
 * Глобальные переменные.
 */
$GLOBALS["any_var"];// через глобальный массив $GLOBALS без $ - рекомендуемый способ обращения
// ИЛИ
global $any_var;// через ключевое слово global - тоже самое по действию (ссылка на глобальную переменную, все изменения будут происходит с глобальной переменной в любой функции)
// ДОСТУП К НЕСКОЛЬКИМ ГЛОБАЛЬНЫМ ПЕРЕМЕННЫМ
global $dinner, $lunch, $breakfast;// через запятую
// УНИЧТОЖЕНИЕ ПЕРЕМЕННОЙ
unset($var);// удалить переменную

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** ФУНКЦИИ ********************************************/
/**
 * Задание конкретных типов аргументов в функциях.
 */
function example(int $number) // можно указывать явно тип аргумента такие как int float string boolean array и т.п.
{
    return $number;
}

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** ССЫЛКИ: ********************************************/
// ОБРАЩЕНИЕ К ПЕРЕМЕННОЙ ПО ССЫЛКИ ДЛЯ ЕЕ НЕПОСРЕДСТВЕННОГО ИЗМЕНЕНИЯ
foreach ($array as $key => &$value) {
    /**
     * Для того, чтобы напрямую изменять элементы массива внутри цикла,
     *переменной $value должен предшествовать знак &.
     */
}

////////////////////////////////////////////////////////////////////////////////////////////////////
/**************************************** ПРЕОБРАЗОВАНИЯ: ****************************************/
// СТРОКИ В ЧИСЛО
(int)"6 pack";// 6

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************* ОПЕРАТОРЫ: *******************************************/
// ОТРИЦАНИЕ !
!true === false;// не истина === лжи

// ЛОГИЧЕСКИЕ ОПЕРАЦИИ && и ||
true && true;// true
false || true;// true

// НУЛЕОБЪЕДЕНЯЮЩАЯ ОПЕРАЦИЯ
print $_POST['category'] ?? ''; // начиная с php 7; после оператора ?? идет то, что должно вывестись если до оператора значение не определено или ошибочно, чтобы избежать сообщения об ошибке

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************* СРАВНЕНИЯ: *******************************************/
// СТРОК strcmp() или strcasecmp()
strcmp("abs", "ABS");// -1 так как ABS (верхний регистр) идет раньше, а abs позже, в символьной таблице PHP.
strcasecmp("abs", "ABS");// 0 так как abs === abs. Так как strcasecmp() - регистроНЕЗАВИСИМАЯ функция.

// СРАВНЕНИЯ СОСТАВНОЙ ОПЕРАЦИЕЙ <=> (PHP>7)
1 <=> 2;// -1 левое меньше правого.
"charlie" <=> "bob";// 1 левое больше правого, так как "c" идет после "b" в лексиграфической таблице PHP.

////////////////////////////////////////////////////////////////////////////////////////////////////
/*                                      РАБОТА С КАТАЛОГАМИ:                                      */
////////////////////////////////////////////////////////////////////////////////////////////////////
// ЧТЕНИЕ ИМЕН ФАЙЛОВ И КАТАЛОГОВ
scandir("catalog/");// отдаст также . и .. первыми двумя элементами массива

////////////////////////////////////////////////////////////////////////////////////////////////////
/********************************************* ЦИКЛЫ: *********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
// FOR (для условия) for();

// WHILE (пока верно условие) while();

// FOREACH
foreach ($array as $key => $value) {
}

// FOREACH ВТОРОЙ ВАРИАНТ ЗАПИСИ
foreach ($array as $element):
#do something
endforeach;

////////////////////////////////////////////////////////////////////////////////////////////////////
/******************************************** МАССИВЫ: ********************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
// УДАЛИТЬ ПОСЛЕДОВАТЕЛЬНОСТЬ ЭЛЕМЕНТОВ МАССИВА И ЗАМЕНИТЬ ЕЁ ДРУГОЙ ПОСЛЕДОВАТЕЛЬНОСТЬЮ
array_slice($array, 0, 5, true);
/**
 * array_slice() возвращает последовательность элементов массива array, определённую параметрами
 * offset и length. Если параметр offset положителен, последовательность начнётся на расстоянии
 * offset от начала array. Если offset отрицателен, последовательность начнётся на расстоянии offset
 * от конца array. Если в эту функцию передан положительный параметр length, последовательность
 * будет включать length элементов. Если в эту функцию передан отрицательный параметр length, в
 * последовательность войдут все элементы исходного массива, начиная с позиции offset и заканчивая
 * позицией, отстоящей на length элементов от конца array. Если этот параметр будет опущен, в
 * последовательность войдут все элементы исходного массива array, начиная с позиции offset.
 * Обратите внимание, что array_slice() сбрасывает ключи массива. Начиная с PHP 5.0.2 вы можете
 * переопределить это поведение, установив
 */

// УДАЛИТЬ ЭЛЕМЕНТ МАССИВА
unset($array['var']);// удалить элемент массива

// ПРОВЕРКА НА КОНЕЦ МАССИВА
!next($array);// если нет следующего элемента то это конец массива

// ПОЛУЧИТЬ ТЕКУЩИЙ ЭЛЕМЕНТ МАССИВА
current($array);// получить текущий элемент массива
next($array);// перевод указателя на следующий элемент
current($array);// получить слудующий элемент массива

// ПОЛУЧИТЬ КЛЮЧ ТЕКУЩЕГО ЭЛЕМЕНТА В МАССИВЕ
key($array);// ключ текущего элемента массива
next($array);// перевод указателя на следующий элемент
key($array);// получение следующего ключа

// УЗНАТЬ ЕСТЬ ЛИ В МАССИВЕ КЛЮЧ
array_key_exists(mixed($key), $array);// ОТДАСТ TRUE или FALSE в зависимости от того есть ли такой КЛЮЧ в массиве

// ПРОВЕРКА СУЩЕСТВОВАНИЯ ЭЛЕМЕНТА В МАССИВЕ С КОНКРЕТНЫМ ЗНАЧЕНИЕМ
in_array(mixed($value), $array);// ОТДАСТ TRUE или FALSE в зависимости от того есть ли такое ЗНАЧЕНИЕ в массиве

// ПОЛУЧИТЬ КЛЮЧ ИСКОМОГО ЗНАЧЕНИЯ ЭЛЕМЕНТА В МАССИВЕ

// УДАЛИТЬ ЭЛЕМЕНТ МАССИВА
unset($var['Example']);
array_search(mixed($value), $array);// ОТДАСТ КЛЮЧ если такое ЗНАЧЕНИЕ есть в массиве

// ВЫВОД МАССИВА В СТРОКУ ЧЕРЕЗ РАЗДЕЛИТЕЛЬ
implode(', ', $array);

// СОРТИРОВКА ЗНАЧЕНИЙ МАССИВА
sort($array);// сортирует значения элементов по алфавиту и возрастанию чисел, при этом сбрасывает ключи на индексы если это ассоциативный массив
rsort($array);// реверсивная сортировка

// СОРТИРОВКА ЗНАЧЕНИЙ АССОЦИАТИВНОГО МАССИВА
asort($assoc_array);// сортирует значения массива по алфавиту и возрастанию цифр, при этом НЕ СБРАСЫВАЕТ ключи ассоциативного массива
arsort($assoc_array);// реверсивная сортировка

// СОРТИРОВКА ПО КЛЮЧАМ МАССИВА
ksort($assoc_array);// сортирует ключи массива по алфавиту и возрастанию цифр
krsort($assoc_array);// реверсивная сортировка

////////////////////////////////////////////////////////////////////////////////////////////////////
/*************************************** ОБРАБОТЧИК ОШИБОК: ***************************************/
// http://php.net/set_error_handler
?>

<?php namespace \Tiny\Eating; // пространство имен, теперь все имена идущие после этого пространства будут относиться только к этому пространству (это полезно при внедрении постороннего кода в свою программу, чтобы имена не конфликтовали)
////////////////////////////////////////////////////////////////////////////////////////////////////
/*************************************** ПРОСТРАНСТВА ИМЕН: ***************************************/
// ЗАДАНИЕ ПРОСТРАНСТВА ИМЁН
class Fruit
{
    public static function munch($bite)
    {
        print"Here is a tiny munch of $bite.";
    }

    public function anyMethod()
    {
        return true;
    }
}

// ВОСПОЛЬЗОВАТЬСЯ КЛАССОМ В ПРОСТРАНСТВЕ ИМЕН
\Tiny\Fruit::munch("banana"); // сначала указывается корень пространства имен \ потом имя пространства Tiny, затем снова разделитель \ и далее имя класса Fruit, после имя статичного метода через :: munch();

// ПРИМЕНЕНИЕ КЛЮЧЕВОГО СЛОВА use ДЛЯ СОКРАЩЕНИЯ ОБРАЩЕНИЯ К ПРОСТРАНСТВУ ИМЕН
use \Tiny\Eating\Fruit as Snack;

Snack::munch("strawberry"); // вместо \Tiny\Eating\Fruit::munch();
Fruit::munch("orange"); // вместо \Tiny\Fruit::munch();

// СОЗДАНИЕ ОБЪЕКТА
use \Tiny\Eating as small;

$obj = new small\Fruit;
?>

<?php
////////////////////////////////////////////////////////////////////////////////////////////////////
/*************************************** ВСТРОЕННЫЕ ФУНКЦИИ ***************************************/
isset($_GET['name']); // определяет установленная ли переменная или чтобы то нибыло еще

strlen("some string"); // отдает длину строки

// ПОЛУЧИТЬ ЧАСТЬ СТРОКИ В UTF-8 mb_substr("СТРОКА какая-то", 0, 2); // 2 первых символа ("СТ")
mb_substr("СТРОКА какая-то", 0, 2);// 2 первых символа "СТ"
mb_substr("СТРОКА какая-то", -2, 2);// 2 последних символа "то"
mb_substr("СТРОКА какая-то", 5, -3);// начиная с 5ого символа и обрезать с конца 3 симола "А какая"
mb_substr("СТРОКА какая-то", -5, -2);// начиная с конца с 5ого символа и 2 символа обрезав с конца "ая-"
