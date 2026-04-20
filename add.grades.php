<?php
// require "./DataBase/connectDB.php";
// require "./functions/functions.php";

// Обработка отправки формы
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $data = [
//         'Name_student' => $_POST['Name_student'],
//         'Surname_student' => $_POST['Surname_student'],
//         'phone' => $_POST['phone'],
//         'email' => $_POST['email'],
//         'group_id' => $_POST['group_id'],
//         'birth_date' => $_POST['birth_date']
//     ];
    
//     $result = AdditionStudent($pdo, $data);

//     if ($result) {
//         header('Location: ./Main.php');
//         exit;
//     }else {
//         echo 'Ошибка при добавлении...';
//     }
// }
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
<div class="container mt-4 w-50 p-3 border border border-dark" style="background-color: #eee;">
    <form method="post">
        <h2 class="text-center">Добавление оценки</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Оценка:</label>
                <input type="number" name="Name_student" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Предмет:</label>
                <select>
                    <option></option>                        
                </select>
                <input type="text" name="Surname_student" class="form-control">
            </div>
        <button type="submit" class="btn btn-success">Добавить оценку</button>
        <button type="reset" class="btn btn-secondary">Сбросить</button>
        <a href="./view.grades.student.php" class="btn btn-primary">Назад</a>
    </form>
</div>
</body>
</html>