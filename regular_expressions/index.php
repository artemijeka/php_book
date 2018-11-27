<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.10.18
 * Time: 15:55
 */
////////////////////////////////////////////////////////////////////////////////////////////////////
/************************************** REGULAR EXPRESSIONS **************************************/
////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Сервис для теста регулярок https://regex101.com/
 * В качестве ограничителя может выступать вообще любой символ.
 */
/**
 * Чтобы найти в строке какое-то совпадение, достаточно просто записать это совпадение внутри двух слэшей.
 */
preg_match('/шаблон для поиска/', 'строка, в которой ищем совпадения по "шаблон для поиска"', $matches);
var_dump($matches);

/**
 * Второй пример:
 */
$pattern = '/век/';
$string = 'человек';
preg_match($pattern, $string, $matches2);
var_dump($matches2);

/**
 * "." - это подразумевает абсолютно любой символ. (Для нахождения точки её нужно экранировать так: "\.")
 *
 *************************************************** Квантификаторы: ***************************************************
 * "{1,3}" - от скольки и до скольки совпадений выражения.
 *      Пример: "\.{1,3}" - точка встречающаяся от 1 и до 3 точек к ряду.
 * "{2}" - конкретное количесво совпадений.
 *      Пример: "П{1}" - кол-во совпадений одной большой буквы "П" к ряду.
 *
 * "?" - (знак вопроса) - предшествующий символ либо есть, либо его может не быть. Аналог - {0, 1}.
 *      Пример: "\??!" - знак вопроса "\?" может быть, а может и не быть "?",
 *          а после него обязательно знак восклицания "!"
 *          В строке найдутся все "?!" и "!".
 *
 * "*" - (знак звёздочки) - предшествующий символ повторяется от 0 (его нет) до бесконечности раз. Аналог - {0, бесконечность}.
 *
 * "+" - (знак плюса) - предшествующий символ повторяется от 1 до бесконечности раз. Аналог - {1, бесконечность}.
 *
 **************************************************** Модификаторы: ****************************************************
 * "/выражение/g" - "g" - модификатор, который говорит о том,
 *      что не стоит останавливаться при нахождении первого совпадения. В PHP при этом для поиска как бы с
 *      модификатором g используется функция preg_match_all(), а без этого модификатора - preg_match().
 *
 * "/выражение/gm" - multi line режим, чтобы каждая новая строка обрабатывалась выражением заново.
 *
 * "/выражение/gU" - "U" - нежадный поиск совпадения в строке.
 *      * жадный поиск захватывает максимально возможную подстроку;
 *      * нежадный - минимально возможную;
 *      * по умолчанию включен жадный поиск;
 *      * нежадный включается с помощью модификатора U, идущего после ограничителей регулярки.
 *      Вообще, все остальные модификаторы как и "U" указываются после слеша,
 *      это только для модификатора g пришлось сделать две разные функции preg_match_all() и preg_match().
 *
 *************************************************** Классы символов: **************************************************
 * [a,b,c] - буква a, b или c; https://regex101.com/r/1BTFCw/1
 * [0-9] - цифры от 0 до 9; https://regex101.com/r/CzzyKi/1
 * [a-zA-Z-] - английские буквы от a до Z и знак "-" (если его добавляют в класс, то всегда в самый конец).
 *      https://regex101.com/r/BHiYSi/2
 *      "Когда вы используете такой класс в шаблоне, это соответствует одному из символов из этого шаблона.
 *      Не нескольким, а одному из них! Чтобы было несколько, нужно использовать квантификаторы."
 * \d - любое число (\d+ - от одной цифры до бесконечности). https://regex101.com/r/ZDHPbj/1/
 *
 **************************************************** Отрицание "^": ***************************************************
 * [^0-3] - всё, кроме чисел от 0 до 3;
 * [^a-zA-Z] - что угодно, кроме английских букв.
 * [^a-zA-z0-3]+ - последовательность чего угодно, кроме английских букв и цифр от 0 до 3
 *
 ******************************************************** Якоря: *******************************************************
 * "$" - проверяет оканчиваниется ли строка на указанный символ, например на точку: "\.$" https://regex101.com/r/yFX1o5/1
 * "^" - ищет указанное выражение в начале строки... https://regex101.com/r/eNm4p4/1
 *
 ******************* Проверка на российский номер телефона с якорями https://regex101.com/r/5IcHkC/1 *******************
 *
 ********************************************************* ИЛИ: ********************************************************
 * "|" - Если совпадёт хотя бы один из вариантов - совпадение найдено. https://regex101.com/r/55e6ov/1
 *
 ******************************************************** МАСКИ: *******************************************************
 * "/Меняем автора статьи ([0-9]+) c "(.+)" на "(.+)"./gm" - маски указываются в скобках "()".
 *
 *
 *
 **********************************************************************************************************************
 ******************************************************* ПРИМЕРЫ: *****************************************************
 **********************************************************************************************************************
 * Проверка на российский номер телефона https://regex101.com/r/5ugdAX/1
 *
 * Нужно из строки Меняем автора статьи 123 c "Иван" на "Пётр" и извлечь идентификатор статьи и имена авторов.
 * В PHP мы можем сделать из этого отдельные переменные:
 */
$pattern = '/Меняем автора статьи ([0-9]+) c "(.+)" на "(.+)"./';
$str = 'Меняем автора статьи 123 c "Иван" на "Пётр".';
preg_match($pattern, $str, $matches);
var_dump($matches);
/**
 * Результат:
 *
 * array (size=4)
 * 0 => string 'Меняем автора статьи 123 c "Иван" на "Пётр".' (length=72)
 * 1 => string '123' (length=3)
 * 2 => string 'Иван' (length=8)
 * 3 => string 'Пётр' (length=8)
 *
 * Соответственно, нам остаётся лишь определить переменные под всё это дело:
 */
$articleId = $matches[1];
$oldAuthor = $matches[2];
$newAuthor = $matches[3];
/**
 * Однако, если ничего не совпало, в $matches будет пустой массив,
 * и в реальном коде это всегда нужно учитывать и добавлять дополнительные проверки.
 *
 ********************************* А ещё маске можно дать имя прямо в шаблоне, вот так: ********************************
 * (?P<имя_маски>содержимое) - какбы: "что? P - Pattern" и имя как тег <namePattern> - в массиве будет как ключ.
 */
$pattern = '/Меняем автора статьи (?P<articleId>[0-9]+) c "(.+)" на "(.+)"./';
$str = 'Меняем автора статьи 123 c "Иван" на "Пётр".';
preg_match($pattern, $str, $matches);
var_dump($matches);
/**
 * array (size=5)
 * 0 => string 'Меняем автора статьи 123 c "Иван" на "Пётр".' (length=72)
 * 'articleId' => string '123' (length=3)
 * 1 => string '123' (length=3)
 * 2 => string 'Иван' (length=8)
 * 3 => string 'Пётр' (length=8)
 *
 * И мы можем получить id статьи вот так:
 */
$articleId = $matches['articleId'];

