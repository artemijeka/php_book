<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 7:46 AM
 */

namespace MVCExample\Services;

/****************************************************** SINGLEON *******************************************************
 * Singleton (синглтон). Этот паттерн говорит о том, что в рамках одного запущенного приложения будет гарантироваться
 * что будет использован только один объект какого-то класса. Классы, реализующие паттерн синглтон сами гарантируют,
 * что будет использоваться только один их экземпляр – создать объекты можно только с помощью специального метода,
 * ведь конструктор больше недоступен извне. А этот метод следит за тем, чтобы не было более одного созданного объекта
 * и предоставляет единую точку доступа к этому экземпляру. Вот и вся суть паттерна Singleton.
 */
class Db
{
    private static $instance;

    /** @var \PDO */
    private $pdo;

    private function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];

        $this->pdo = new \PDO(
            DB_DRIVER . ':host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    /**
     * Метод паттерна SINGLETON который обращается к private __constract и следит, чтобы был всего один экземпляр
     * данного обращения (в нашем случае одно обращение к БД)
     */
    public static function getInstance() :self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
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