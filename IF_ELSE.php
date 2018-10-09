<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.09.18
 * Time: 10:37
 */
/**
 * Кроме стандартного if () elseif () else
 * есть еще такая запись для внедрения в html:
 */
?>
<?php if ($login === null): ?>
    <a href="/login.php">Авторизуйтесь</a>
<?php else: ?>
    Добро пожаловать, <?= $login ?>
    <br>
    <a href="/logout.php">Выйти</a>
<?php endif; ?>

<?php
/**
 * КОРОТКАЯ ЗАПИСЬ if else
 * условие ? если да : если нет
 */
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';

/**
 * ОБЪЕДИНЯЮЩАЯ ОПЕРАЦИЯ АНАЛОГ if elseif else
 * условие ?? если да ?? иначе это ?? иначе это
 */
$username = $_GET['user'] ?? $_POST['user'] ?? 'nobody';
?>