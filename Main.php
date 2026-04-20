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
<div class="d-flex justify-content-center gap-3 mb-4 " style="padding: 3px;">
    <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
        <a href="view.all.students.php" class="btn btn-secondary btn-lg">
            Просмотреть список студентов
        </a>
        <a href="./add.student.php" class="btn btn-success btn-lg">
            Добавить студента
        </a>
            <a href="#" class="btn btn-info btn-lg">
            Список всех предметов
        </a>
    </nav>
</div>

<!-- Карточки студентов -->
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

<!-- Нижний колонтитул с контактными данными -->
<footer class="border-end">
    <div class="container mt-3 col-md-4 position-absolute bottom-0 start-50 translate-middle-x">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-unstyled d-flex gap-3 mb-2">
                    <li><a href="#" class="text-decoration-none text-muted">Подробная информация о проекте</a></li>
                </ul>
                <p class="text-muted small">&copy; 2026 StudentProject</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">Телефон: +7 (999) 645-79-59</p>
                <p>Email: <a href="kirillzukov134@gmail.com">kirillzukov134@gmail.com</a></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

<!-- Подсказка -->
<!-- class="container mt-4 w-50 p-3 border" style="background-color: #eee;" -->