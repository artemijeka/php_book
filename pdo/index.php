<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10/25/18
 * Time: 7:25 AM
 */
/****************************************** Подключение к базе данных MySQL ******************************************/
/**
 * Перед уроком я создал базу users, а в ней табличку data со следующей структурой:
 *
 * CREATE TABLE `data` (
 * `id` int(11) NOT NULL AUTO_INCREMENT,,
 * `name` varchar(32) DEFAULT NULL,
 * `year` char(4) DEFAULT NULL,
 * PRIMARY KEY (id)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 */
$dbh = new \PDO(
    'mysql:host=localhost;dbname=users;', // DB host & users
    'root', // DB USER NAME
    'admin' // DB PASSWORD
);
/**
 * Первым делом после подключения стоит задать кодировку:
 */
$dbh->exec("SET NAMES UTF8");
/**
 * После этого мы можем выполнять запросы. Выглядит это так:
 */
$stm = $dbh->prepare('INSERT INTO data (`name`, `year`) VALUES (:name, :year)');
$stm->bindValue('name', 'Имя');
$stm->bindValue('year', '1703');
$stm->execute();

/******************************************* Выборка из базы с помощью PHP *******************************************/
/**
 * Давайте теперь прочитаем данные, которые мы записали. Схема та же, только подготавливаем SELECT-запрос.
 */
$stm = $dbh->prepare('SELECT * FROM `data`');
$stm->execute();
/**
 * Теперь нужно получить результат.
 */
$allUsers = $stm->fetchAll();
//echo '<pre>';
//var_dump($allUsers);
//echo '</pre>';
?>
	<table border="1">
		<tr>
			<td>id</td>
			<td>Имя</td>
			<td>Год</td>
		</tr>
      <? foreach ($allUsers as $user): ?>
				<tr>
					<td><?= $user['id'] ?></td>
					<td><?= $user['name'] ?></td>
					<td><?= $user['year'] ?></td>
				</tr>
      <? endforeach; ?>
	</table>
<?
/**
 * Если в SELECT-запросе нужно добавить какие-то параметры, то делается это аналогично:
 */
$stm = $dbh->prepare('SELECT * FROM `data` WHERE id = :id');
$stm->bindValue('id', 1);
$stm->execute();
$users = $stm->fetchAll();
var_dump($users);
/**
 * Главное - всегда используйте биндинг параметров. Не пихайте данные напрямую в запрос - это небезопасно.
 */