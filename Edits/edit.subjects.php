<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

//Получаем ID предмета
$id = $_GET['id'];

$subject = getSubjectById($pdo, $id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = [
        'id' => $id,
        'Name_Subjects' => $_POST['Name_Subjects']
    ];


//Функция обновления предмета
$result = EditSubject($pdo, $data);

//Если все успешно изменилось, перекидывает обратно к списку всех предметов
    if ($result) {
        header('Location: ../Views/views_list_subjects.php?id=' . $id);
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Форма редактирования студента</title>
</head>
<body>
<div class="container mt-4 w-50 p-3 border border border-dark" style="background-color: #eee;">
    <form method="post">
        <h2 class="text-center">Редактирование предмета</h2>
    <div class="mb-3">
        <label for="name" class="form-label">Предмет:</label>
        <input type="text" name="Name_Subjects" class="form-control" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-warning">Изменить</button>
        <a href="../Views/views_list_subjects.php" class="btn btn-primary">Назад</a>        
    </div>
    </form>
</body>
</html>