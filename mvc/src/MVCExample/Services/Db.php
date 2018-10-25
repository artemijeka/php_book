<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 7:46 AM
 */

namespace MVCExample\Services;


class Db
{
    /** @var \PDO */
    private $pdo;

    public function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php')['db']; // src/settings.php

        $this->pdo = new \PDO(
            DB_DRIVER . ':host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    /**
     *  Давайте напишем отдельный метод для выполнения запросов в базу.
     *
     * Третьим аргументом в этот метод будет передаваться имя класса, объекты которого нужно создавать.
     * По умолчанию это будут объекты класса stdClass – это такой встроенный класс в PHP,
     * у которого нет никаких свойств и методов.
     */
    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        /**
         * В метод fetchAll() мы передали специальную константу - \PDO::FETCH_CLASS, она говорит о том,
         * что нужно вернуть результат в виде объектов какого-то класса. Второй аргумент – это имя класса,
         * которое мы можем передать в метод query().
         */
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}