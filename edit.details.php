<?php
require "./DataBase/connectDB.php";
require "./functions/functions.php";

//Получаем ID студента
$id = $_GET['id'];

$student = getStudentById($pdo, $id);

//проверка того, как пользователь попал на страницу
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// массив с данными для обновления
    $data = [
        'id' => $id,
        'Name_student' => $_POST['Name_student'],
        'Surname_student' => $_POST['Surname_student'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'group_id' => $_POST['group_id'],
        'birth_date' => $_POST['birth_date']
    ];
    
//Функция обновления студента
    $result = EditStudent($pdo, $data);
    
//Если все успешно изменилось, перекидывает к карточке студента с подробной информацией
    if ($result) {
        header('Location: ./view.details.student.php?id=' . $id);
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
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <h2 class="text-center">Редактирование студента</h2>
                <fieldset>
                    <legend>Персональные данные</legend>
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя:</label>
                        <input type="text" name="Name_student" class="form-control" value="<?php echo $student['Name_student']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Фамилия:</label>
                        <input type="text" name="Surname_student" class="form-control" value="<?php echo $student['Surname_student']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="group" class="form-label">Группа (ID):</label>
                        <input type="number" name="group_id" class="form-control" value="<?php echo $student['group_id']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="birth" class="form-label">Дата рождения:</label>
                        <input type="date" name="birth_date" class="form-control" value="<?php echo $student['birth_date']; ?>" required>
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>Контакты</legend>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $student['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон:</label>
                        <input type="tel" name="phone" class="form-control" value="<?php echo $student['phone']; ?>" required>
                    </div>        
                </fieldset>
                
                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="./view.details.student.php?id=<?php echo $id; ?>" class="btn btn-success">Назад</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>