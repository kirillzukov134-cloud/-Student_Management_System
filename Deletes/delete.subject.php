<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

//Получаем ID студента
$id = $_GET['id'];

$subjectDelete = getSubjectById($pdo, $id);

//Функция удаление студента
$result = DeleteSubject($pdo, $id);
    
//Если удалилось, на главную страницу проекта
if ($result) {
    header('Location: ../Views/views_list_subjects.php');
    exit;
}
