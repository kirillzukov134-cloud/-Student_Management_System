<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

//Получаем ID студента
$id = $_GET['id'];

$studentDelete = getStudentById($pdo, $id);

//Функция удаление студента
$result = DeleteStudent($pdo, $id);
    
//Если удалилось, кидает на список всех студентов
if ($result) {
    header('Location: ../index.php');
    exit;
}
