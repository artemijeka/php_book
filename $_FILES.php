<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11.09.18
 * Time: 18:42
 */

/**
 * name – имя файла, переданное из браузера;
 * type – тип файла, в моём случае это image/png;
 * tmp_name – путь до временного файла, который загрузился на сервер, но если с ним до конца запроса ничего не сделать,
 *            то он удалится;
 * error – код ошибки при загрузке файла, если 0 – то ошибки нет. Изучите возможные коды ошибок вот http://php.net/manual/ru/features.file-upload.errors.php;
 * size – размер загруженного файла в байтах.
 */
?>

<!-- ОБЯЗАТЕЛЬНО! method="post" enctype="multipart/form-data" -->
<form action="/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment">
    <input type="submit">
</form>

<?php
/**
 * Чтобы обратиться к информации о файле нужно:
 */
$_FILES['form_attachment'];

/**
 * ПОЛУЧИТЬ РАЗМЕРЫ ИЗОБРАЖЕНИЯ
 */
$file = $_FILES['form_attachment'];
$fileWidth = getimagesize($file['tmp_name'])['0'];
$fileHeight = getimagesize($file['tmp_name'])['1'];

/**
 * ПОЛУЧИТЬ СТРОКУ-РАСШИРЕНИЕ ФАЙЛА
 */
$extension = pathinfo($_FILES['form_attachment']['name'], PATHINFO_EXTENSION);

/**
 * ПОЛУЧИТЬ РАЗМЕР ФАЙЛА
 */
$fileSize = $_FILES['form_attachment']['size'];
?>

