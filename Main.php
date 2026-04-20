<?php
require "./DataBase/connectDB.php";
require "./functions/functions.php";

$students = selectIDCard($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Главная страница</title>
</head>
<body>
    <!-- Название проекта -->
<div class="container mt-4">
    <div class="text-center">
        <h1 class="display-4">StudentProject</h1>
        <p class="lead text-muted">Система управления студентами</p>
        <hr class="my-4">
    </div>
</div>

<!-- Навигационные кнопки -->
<div class="d-flex justify-content-center gap-3 mb-4 ">
    <a href="view.all.students.php" class="btn btn-secondary btn-lg">
        Просмотреть список студентов
    </a>
    <a href="./add.student.php" class="btn btn-success btn-lg">
        Добавить студента
    </a>
        <!-- <a href="#" class="btn btn-primary btn-lg">
        Просмотр всех студентов -->
    </a>
</div>



<div class="container mt-4"> 
    <div class="row justify-content-center">
        <?php foreach($students as $student): ?>
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $student['Имя_студента'] . ' ' . $student['Фамилия_студента']; ?></h5>
                        <p class="card-text">
                            Группа: <?php echo $student['Группа']; ?>
                        </p>
                            <a href="./view.details.student.php?id=<?php echo $student['id']; ?>" class="btn btn-primary">Подробнее</a>
                            <a href="./view.grades.student.php?id=<?php echo $student['id']; ?>" class="btn btn-primary">Оценки</a>                            
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>    
</div>
</body>
</html>
<!-- class="container mt-4 w-50 p-3 border" style="background-color: #eee;" -->