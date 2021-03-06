-- Создадим таблицу Customers (покупатели)
CREATE TABLE Customers
(
  id          INT NOT NULL AUTO_INCREMENT,
  firstname   VARCHAR(32),
  secondname  VARCHAR(50),
  adress      VARCHAR(256),
  telephone   VARCHAR(20),
  bookTitle   VARCHAR(256),
  bookAuthor1 VARCHAR(64),
  bookAuthor2 VARCHAR(64),
  pageCount   INT(4),
  dateOrder   DATETIME,
  PRIMARY KEY(id)
) CHARACTER SET utf8;

-- Наполнить таблицу какими-то данными
INSERT INTO Customers
VALUES
       (1, 'Александр', 'Иванов', 'Ленинский проспект 68 - 34, Москва 119296', '+7-920-123-45-67', 'Золотые сказки',
        'Александр Сергеевич Пушкин', '', 128, '2013-04-18 14:56:00'),
       (NULL, 'Дмитрий', 'Петров', 'Хавская 3 - 128, Москва 115162', '+7-495-123-45-67', 'ASP.NET MVC 4',
        'Джесс Чедвик', 'Тодд Снайдер', 432, '2013-02-11 09:18:00'),
       (NULL, 'Дмитрий', 'Петров', 'Хавская 3 - 128, Москва 115162', '+7-495-123-45-67',
        'LINQ. Язык интегрированных запросов', 'Адам Фримен', 'Джозеф С. Раттц', 656, '2013-02-25 19:44:00'),
       (NULL, 'Александр', 'Иванов', 'Ленинский проспект 68 - 34, Москва 119296', '+7-920-123-45-67',
        'Сказки Старого Вильнюса', 'Макс Фрай', '', 480, '2013-05-02 14:12:00'),
       (NULL, 'Александр', 'Иванов', 'Ленинский проспект 68 - 34, Москва 119296', '+7-920-123-45-67', 'Реверс',
        'Сергей Лукьяненко', 'Александр Громов', 352, '2013-03-12 08:25:00'),
       (NULL, 'Елена', 'Козлова', 'Тамбовская - 47, Санкт-Петербург 192007', '+7-920-765-43-21', 'Золотые сказки',
        'Александр Сергеевич Пушкин', '', 128, '2013-04-12 12:56:00'),
       (NULL, 'Елена', 'Козлова', 'Тамбовская - 47, Санкт-Петербург 192007', '+7-920-765-43-21', 'ASP.NET MVC 4',
        'Джесс Чедвик', 'Тодд Снайдер', 432, '2013-04-14 10:11:00');

----------------------------------------------- Первая нормальная форма -----------------------------------------------
---------------------------- A ----------------------------
-- Ни одна таблица не должна иметь повторяющихся столбцов,
-- содержащих одинаковые по смыслу значения, и все столбцы должны содержать единственное значение.

---------------------------- B ----------------------------
-- Обязательно должен быть определен первичный ключ, который уникальным образом описывал бы каждую строку.
-- Это может быть один столбец или комбинация из нескольких столбцов, в зависимости от того,
-- сколько потребуется столбцов для обеспечения уникальной идентификации строк.

-----------------------------------------------------------
-- В созданной нами таблице нарушено требование, предъявляемое к повторяющимся столбцам,
-- потому что в столбцах "bookAuthor1" и "bookAuthor2" хранятся одинаковые по смыслу данные.
-- Это несоответствие надо устранить, в противном случае вам может потребоваться добавить
-- много полей для хранения имен авторов (например, если у книги три автора),
-- что приведет к неоправданному расходу пространства, или может не хватить предусмотренного количества
-- полей для хранения всех имен, если над книгой трудились много авторов. Решение заключается в том,
-- чтобы переместить имена всех авторов в отдельную таблицу, которая будет связана с таблицей книг.

----------------------------------------------- Вторая нормальная форма -----------------------------------------------
---------------------------- A ----------------------------
-- Вторая нормальная форма ликвидирует избыточность данных в столбцах.
-- Нужно определить, какие из ее столбцов содержат одни и те же данные для нескольких строк.
-- Такие столбцы нужно поместить в отдельную таблицу, связав ее с первоначальной по ключу.
-- Другими словами, нужно отыскать поля, не зависящие от первичного ключа.

-----------------------------------------------------------
-- Поскольку имена авторов и такие сведения о книгах, как количество страниц, никак не связаны с первичным ключом,
-- идентифицирующем покупателя, выделим эту информацию в отдельные таблицы
-- (это действие будет включать в себя также нормализацию по первой форме,
-- т.к. мы выделяем в отдельную таблицу имена авторов):

-- Создадим новую таблицу Books
CREATE TABLE Books
(
  bookId    INT NOT NULL AUTO_INCREMENT,
  title     VARCHAR(500),
  authors   VARCHAR(1000),
  pageCount INT(4),
  PRIMARY KEY(bookId)
) CHARACTER SET utf8;

-- Заполним таблицу Books и столбец bookId таблицы customers
INSERT INTO Books
VALUES(1, 'Золотые сказки', 'Александр Сергеевич Пушкин', 128),
      (NULL, 'ASP.NET MVC 4', 'Джесс Чедвик, Тодд Снайдер', 432),
      (NULL, 'LINQ. Язык интегрированных запросов', 'Адам Фримен, Джозеф С. Раттц', 656),
      (NULL, 'Сказки Старого Вильнюса', 'Макс Фрай', 480),
      (NULL, 'Реверс', 'Сергей Лукьяненко, Александр Громов', 352);

-- Видоизменим таблицу Customers удалив избыточные столбцы bookTitle, bookAuthor1, bookAuthor2, pageCount
-- и добавим столбец bookId
ALTER TABLE Customers DROP bookTitle, DROP bookAuthor1, DROP bookAuthor2, DROP pageCount, ADD bookId INT(4);
UPDATE Customers
SET bookId = 1
WHERE id = 1;
UPDATE Customers
SET bookId = 2
WHERE id = 2;
UPDATE Customers
SET bookId = 3
WHERE id = 3;
UPDATE Customers
SET bookId = 4
WHERE id = 4;
UPDATE Customers
SET bookId = 5
WHERE id = 5;
UPDATE Customers
SET bookId = 1
WHERE id = 6;
UPDATE Customers
SET bookId = 2
WHERE id = 7;
-- Этот код позволяет создать дополнительную таблицу Books хранящую данные о книгах.

-----------------------------------------------------------
-- Однако мы еще не выполнили полную нормализацию по второй форме. Можно заметить,
-- что в нескольких строках таблицы Customers повторяется информация о пользователях, сделавших несколько заказов.
-- Для приведения ко второй нормальной форме мы определим новую таблицу Orders (Заказы):
-- Создадим новую таблицу Orders (orderId - идентификатор заказа, userId - идентификатор пользователя, который сделал заказ)
CREATE TABLE Orders
(
  orderId   INT NOT NULL AUTO_INCREMENT,
  userId    INT,
  bookId    INT,
  dateOrder DATETIME,
  PRIMARY KEY(orderId)
) CHARACTER SET utf8;

-- Видоизменим таблицу Customers и добавим данные Orders, обратите внимание
-- что проводить нормализацию заполненной базы данных является трудоемкой задачей,
-- поэтому ее нужно проводить на этапе проектирования базы данных
INSERT INTO Orders (dateOrder, bookId)
SELECT dateOrder, bookId
FROM Customers;

UPDATE Orders
SET userId = 1
WHERE orderId = 1;
UPDATE Orders
SET userId = 2
WHERE orderId = 2;
UPDATE Orders
SET userId = 2
WHERE orderId = 3;
UPDATE Orders
SET userId = 1
WHERE orderId = 4;
UPDATE Orders
SET userId = 1
WHERE orderId = 5;
UPDATE Orders
SET userId = 3
WHERE orderId = 6;
UPDATE Orders
SET userId = 3
WHERE orderId = 7;

ALTER TABLE Customers DROP dateOrder;

-- Удалить дублирующие данные пользователей из таблицы Customers
DELETE
c2
.
*
FROM
Customers
AS
c1
INNER
JOIN
Customers
AS
c2
ON
c1
.
telephone
=
c2
.
telephone
WHERE
c1
.
id
>
c2
.
id

-- Сделать id записей подряд идущими
ALTER TABLE Customers ORDER BY id;

--- Сбросить счётчик для поля id
ALTER TABLE Customers AUTO_INCREMENT = 7;

-- Удалить поле bookId в таблице customers
ALTER TABLE Customers DROP bookId;

-- Теперь данные оформлены безупречно.
-- У нас появились отдельные таблицы со сведениями о покупателях (Customers),
-- книгах (Books) и покупках (Orders).

----------------------------------------------- Третья нормальная форма -----------------------------------------------
---------------------------- A ----------------------------
-- Для приведения к третьей нормальной форме нужно просмотреть таблицы и выделить данные,
-- которые не зависят от первичного ключа, но зависят от других значений.
-- Третья нормальная форма требует, чтобы каждая такая часть данных была выделена в отдельную таблицу.

-----------------------------------------------------------
-- В таблице Customers компоненты адреса не имеют прямого отношения к покупателю.
-- Название улицы и номер дома связаны с почтовым индексом, почтовый индекс – с городом и,
-- наконец, сам город – с областью или краем.

-- Создадим новую таблицу Adresses
CREATE TABLE Adresses
(
  userId   INT NOT NULL AUTO_INCREMENT,
  city     VARCHAR(30),
  street   VARCHAR(50),
  postcode INT(6),
  PRIMARY KEY(userId)
) CHARACTER SET utf8;

-- Видоизменим таблицу Customers и добавим данные в Adresses
ALTER TABLE Customers DROP adress;
INSERT INTO Adresses (city, street, postcode)
VALUES ('Москва', 'Ленинский проспект 68 - 34', 119296),
       ('Москва', 'Хавская 3 - 128', 115162),
       ('Санкт-Петербург', 'Тамбовская - 47', 192007);
-- С практической точки зрения, вы можете обнаружить, что после приведения к третьей нормальной форме было создано
-- больше таблиц, чем вам хотелось бы иметь в своей базе данных. Поэтому вы должны сами решать,
-- когда остановить процесс нормализации. Хорошо, если ваши данные будут соответствовать, по крайней мере,
-- второй нормальной форме. Цель – избежать избыточности данных, предотвратить их повреждение и
-- минимизировать занимаемое данными пространство. Кроме того, нужно убедиться, что одни и те же значения не хранятся в
-- нескольких местах. В противном случае, когда эти данные изменятся, вам придется обновлять их в нескольких местах,
-- что может привести к повреждению базы данных.

-- Как вы могли заметить, третья нормальная форма еще сильнее снижает избыточность данных,
-- но ценой простоты их представления и производительности. В нашем примере не приходится ожидать,
-- что информация об адресах будет часто изменяться. Однако третья нормальная форма позволяет снизить риск
-- появления орфографических ошибок в названиях городов и улиц. Поскольку это ваша база данных,
-- вам и определять соотношение между нормализацией, простотой и производительностью.
