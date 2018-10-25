------------------------------- Создание резервных копий и восстановление данных в MySQL -------------------------------

---------------------------------- Копирование файлов базы данных (не рекомендуется) ----------------------------------
-- Перед копированием файлов базы данных необходимо остановить работу сервера MySQL,
-- чтобы обеспечить неизменность всех файлов во время копирования.
-- При создании резервной копии простым копированием файлов базы данных восстанавливать их следует в том же каталоге,
-- откуда они были скопированы. (/opt/lampp/var/mysql) После этого нужно перезапустить базу данных.

-------------------------------------------------- Команда mysqldump --------------------------------------------------
-- Гораздо лучше выполнять резервное копирование с помощью инструмента командной строки MySQL.
-- Это инструмент, позволяющий создать резервную копию и восстановить данные,
-- а также переместить базу данных с одного сервера на другой; утилита mysqldump создает текстовый файл
-- с инструкциями SQL, необходимыми для создания объектов базы данных и вставки данных.

-- Утилита mysqldump запускается из командной строки и принимает параметры для создания резервной копии
-- единственной таблицы, базы данных и т.п. Лежит эта утилита там же где и консольный клиент mysql и запускается
-- через командную строку. Синтаксис команды:

-- -- mysqldump -u пользователь -p объекты_для_резервного_копирования

-- По умолчанию mysqldump создает и выводит резервную копию на стандартное устройство вывода (обычно это экран).
-- Указанный пользователь должен иметь право на доступ к копируемым объектам.
-- Перед копированием утилита предложит ввести пароль для данного пользователя. Чтобы выполнить копирование в файл,
-- нужно добавить в конец команды символ (>) и указать имя файла.
cd /opt/lampp/bin
enter password
./mysqldump -u root -p users > /home/artem/users_backup.sql

-- Чтобы создать резервную копию единственной таблицы базы данных, достаточно просто добавить имя таблицы после имени
-- базы данных. Например, следующая команда создает резервную копию таблицы customers:
./mysqldump -u root -p users customers > /home/artem/users_backup_customers.sql

-- Но чаще всего вам понадобится создавать резервную копию всего содержимого базы данных.
-- Это делается с помощью ключа командной строки --all-databases.
-- Результирующий файл содержит команды, необходимые для создания баз данных и пользователей,
-- представляя собой полный снимок базы данных, пригодный для восстановления:
mysqldump -u root -p --all-databases > my_backup.sql

-- Пустая копия базы данных (только структура) создается с помощью ключа --no-data. Ключ --no-create-info позволяет
-- выполнить противоположную операцию – создать только резервную копию данных. Разумеется, в резервной копии мало проку,
-- если не знаешь, как восстановить из нее базу данных.

------------------------------------------ Восстановление из резервной копии ------------------------------------------
cd /opt/lampp/bin
./mysql -u root -p
enter password
CREATE DATABASE users;
USE users;
SOURCE /home/artem/users_backup.sql;

------------------------------------------ Создание backup конкретной таблицы ------------------------------------------
cd /opt/lampp/bin
./mysqldump -u root -p users Customers > /home/artem/users.sql

----------------------------- Создание ПОЛНОГО снимка бд со всеми базами и пользователями -----------------------------
cd /opt/lampp/bin
./mysqldump -u root -p --all-databases > /home/artem/all_dbses.sql
--  Пустая копия базы данных (только структура) создается с помощью ключа --no-data.
--  Ключ --no-create-info позволяет выполнить противоположную операцию – создать только резервную копию данных.
--  Разумеется, в резервной копии мало проку, если не знаешь, как восстановить из нее базу данных.

-------------------------------- ВОССТАНОВЛЕНИЕ ПОЛНОГО СНИМКА ВСЕХ БД И ПОЛЬЗОВАТЕЛЕЙ --------------------------------
cd /opt/lampp/bin
./mysql -u root -p < /home/artem/all.sql
