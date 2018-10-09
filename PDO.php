<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 04.09.18
 * Time: 8:21
 */

/**
 * PDO позволяет защититься от SQL-инъекций, позволяя подставлять корректные данные в нужные места.
 * Это происходит благодаря биндингу передаваемых данных – мы задаём определённые подстановки в запросе,
 * а затем передаём нужные для них значения. Код получится таким:
 */
$id = $_GET['id'];
$sql = 'SELECT name, text FROM posts WHERE id = :id';

$dbh = new \PDO(
    'mysql:host=127.0.0.1;dbname=database;',
    'root'
);
$sth = $dbh->prepare($sql);
$sth->execute([':id' => $id]);

$post = $sth->fetch(\PDO::FETCH_ASSOC);

echo $post['name'];
echo '<br>';
echo $post['text'];
/**
 * Здесь мы назвали подстановку :id и затем в методе execute передали для неё значение.
 * Всегда используйте PDO и биндинг значений, это не позволит прокинуть что-либо опасное в ваш SQL-запрос.
 */

