<?php
require "./DataBase/connectDB.php";
require "./functions/functions.php";

//Получаем ID студента
$id = $_GET['id'];

$studentDelete = getStudentById($pdo, $id);

//Функция удаление студента
$result = DeleteStudent($pdo, $id);
    
//Если удалилось, на главную страницу проекта
if ($result) {
    header('Location: ./Main.php');
    exit;
}
