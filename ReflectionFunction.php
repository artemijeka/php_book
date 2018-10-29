<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/29/18
 * Time: 8:54 AM
 */

/**************************************** REFLECTION FUNCTION *****************************************
 * PHP Reflection API – это набор специальных классов-рефлекторов, позволяющих вывести рефлексию на новый уровень.
 * С помощью этих классов мы можем создавать объекты-рефлекторы для разных типов данных в PHP, которые позволят творить с ними всё что только вздумается.
 *
 * @inheritdoc http://php.net/manual/ru/class.reflectionfunction.php
 * @example: mvc/src\MVCExample\Controllers\ArticlesController;
 *
 * Несколько интересных методов для рефлектора объектов:
 *
 * Получить все методы:
 * ->getMethods()
 *
 * Получить все константы:
 * ->getConstants()
 *
 * Создание нового объекта (даже с непубличным конструктором)
 * ->newInstance()
 *
 * Создание нового объекта без вызова конструктора (o_O) *
 * ->newInstanceWithoutConstructor()
 */

...
    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        $reflector = new \ReflectionObject($article);
        $properties = $reflector->getProperties();
        $propertiesNames = [];
        foreach ($properties as $property) {
            $propertiesNames[] = $property->getName();
        }
        var_dump($propertiesNames);
        return;
        ...
    }
...