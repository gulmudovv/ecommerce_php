<?php

//Инициализация подключения к базе данных
$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "root";
//Соединяемся с базой данных
$db = mysqli_connect($dblocation, $dbuser, $dbpasswd);

if(!$db){
    echo "Ошибка подключения к БД MySql";
    exit();
}
// Устанавливаем кодировку
mysqli_set_charset($db,'utf8');

if(!mysqli_select_db($db,$dbname)){
    echo "Ошибка доступа к базе данных: {$dbname}";
    exit();
}