<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

// Получаем ID оценки
$id = $_GET['id'];
$student_id = $_GET['student_id'];

// Функция удаления оценки
$result = DeleteGrade($pdo, $id);
    
if ($result) {
    header('Location: ../Views/view.grades.student.php?id=' . $student_id);
    exit;
} else {
    echo 'Ошибка при удалении оценки...';
}
?>