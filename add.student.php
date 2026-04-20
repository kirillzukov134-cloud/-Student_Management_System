<?php
require "./DataBase/connectDB.php";
require "./functions/functions.php";

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'Name_student' => $_POST['Name_student'],
        'Surname_student' => $_POST['Surname_student'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'group_id' => $_POST['group_id'],
        'birth_date' => $_POST['birth_date']
    ];
    
    $result = AdditionStudent($pdo, $data);

    if ($result) {
        header('Location: ./Main.php');
        exit;
    }else {
        echo 'Ошибка при добавлении...';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Добавление студентов</title>
</head>
<body>
<div class="col-md-6 container mt-4 w-50 p-3 border border border-dark" style="background-color: #eee;">
    <form method="post">
        <h2 class="text-center">Добавление студентов</h2>
        <fieldset>
            <legend>Персональные данные</legend>
            <div class="mb-3">
                <label for="name" class="form-label">Имя:</label>
                <input type="text" name="Name_student" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Фамилия:</label>
                <input type="text" name="Surname_student" class="form-control">
            </div>
            <div class="mb-3">
                <label for="group" class="form-label">Группа (ID):</label>
                <input type="number" name="group_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="birth" class="form-label">Дата рождения:</label>
                <input type="date" name="birth_date" class="form-control" required>
            </div>
        </fieldset>
        <fieldset>
            <legend>Контакты</legend>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:*</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон:*</label>
                <input type="tel" name="phone" class="form-control" required>
            </div>
        </fieldset>
        
        <button type="submit" class="btn btn-success">Добавить</button>
        <button type="reset" class="btn btn-secondary">Сбросить</button>
        <a href="./Main.php" class="btn btn-primary">Назад</a>
    </form>
</div>
</body>
</html>