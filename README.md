# Work_test
Тестовое задание к сожалению нет сервера куда бы можно было закинуть данный проект и показать как он работает.
Роутинг работает через index.php
Структура проекта: 
  1) classes - папка с php классами
  2) css - папка со стилями
  3) db - папка с настройками доступа к БД
  4) handle - папка с обработчиками полученных данных от формы
  5) js - папка со скриптами
  6) layouts - папка с шаблонами

SQL: 

  1. SELECT `email` FROM `users` HAVING count(*) > 1

  2. SELECT `users`.`id`, `users`.`login` 
     FROM `users` LEFT OUTER JOIN `orders` 
     ON users.id = orders.user_id 
     WHERE orders.user_id IS null

  3. SELECT `users`.`id`, `users`.`login`
     FROM `users` INNER JOIN `orders` 
     ON (users.id = orders.user_id) 
     GROUP BY `orders`.user_id 
	   HAVING COUNT(*) > 1
