<?php

/*CREATE TABLE `testovoe`.`users` ( `user_id` INT(255) UNSIGNED NOT NULL AUTO_INCREMENT , `firstname` VARCHAR(30) NOT NULL , `lastname` VARCHAR(30) NOT NULL , `email` VARCHAR(50) NOT NULL , `user_type` VARCHAR(20) NOT NULL , `password` VARCHAR(100) NOT NULL , `created_at` DATE NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;*/
/*ALTER TABLE `users` ADD `city` VARCHAR(50) NOT NULL AFTER `created_at`, ADD `postcode` VARCHAR(10) NOT NULL AFTER `city`, ADD `region` VARCHAR(100) NOT NULL AFTER `postcode`, ADD `street` VARCHAR(200) NOT NULL AFTER `region`;*/
$mysql = new \PDO('mysql:host=localhost;dbname=testovoe;', 'root', 'root'); // localhost, название БД, логин, пароль
$mysql->exec('SET NAMES UTF8');
//$mysql = new mysqli('localhost', 'root', 'root', 'testovoe');
