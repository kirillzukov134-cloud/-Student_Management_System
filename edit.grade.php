<?php
// require "./DataBase/connectDB.php";
// require "./functions/functions.php";

// //Получаем ID студента
// $id = $_GET['id'];

// $student = getStudentById($pdo, $id);

// //проверка того, как пользователь попал на страницу
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// // массив с данными для обновления
//     $data = [
//         'id' => $id,
//         'Name_student' => $_POST['Name_student'],
//         'Surname_student' => $_POST['Surname_student'],
//         'phone' => $_POST['phone'],
//         'email' => $_POST['email'],
//         'group_id' => $_POST['group_id'],
//         'birth_date' => $_POST['birth_date']
//     ];
    
// //Функция обновления студента
//     $result = EditStudent($pdo, $data);
    
// //Если все успешно изменилось, перекидывает к карточке студента с подробной информацией
//     if ($result) {
//         header('Location: ./view.details.student.php?id=' . $id);
//         exit;
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Форма редактирования оценки</title>
</head>
<body>
<div class="container mt-4 w-50 p-3 border border border-dark" style="background-color: #eee;">
    <form method="post">
        <h2 class="text-center">Редактирование оценки</h2>
        <fieldset>
            <legend>Персональные данные</legend>
            <div class="mb-3">
                <label for="name" class="form-label">Оценка:</label>
                <input type="number" name="grades" class="form-control" value="" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Предмет:</label>
                <input type="text" name="subject" class="form-control" value="" required>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="./view.details.student.php" class="btn btn-success">Назад</a>
            </div>
        </form>
    </div>
</body>
</html>