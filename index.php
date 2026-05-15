<?php
require "./DataBase/connectDB.php";
require "./Functions/functions.php";

$students = selectIDCard($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <title>Главная страница</title>
</head>
<body class="d-flex flex-column vh-100">

<!-- Название проекта -->
<div id="name-project" class="container mt-4">
    <div class="text-center">
        <h1 class="display-4">StudentProject</h1>
        <p class="lead text-muted">Система управления студентами</p>
        <hr class="my-4">
    </div>
</div>

<!-- Поиск -->
<nav class="navbar navbar-light justify-content-center p-1">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
    </form>
</nav>

<!-- Навигационные кнопки -->
<div id="a-nav" class="d-flex justify-content-center gap-3 mb-4 " style="padding: 3px;">
    <nav id="navbar-example2">
        <a href="./Views/view.all.students.php" class="btn btn-secondary btn-lg">
            Просмотреть список студентов
        </a>
        <a href="./Adds/add.student.php" class="btn btn-success btn-lg">
            Добавить студента
        </a>
            <a href="./Views/views_list_subjects.php" class="btn btn-info btn-lg">
            Список всех предметов
        </a>
        </a>
            <a href="./Views/view_schedule.php" class="btn btn-info btn-lg">
            Просмотреть расписание пар
        </a>
    </nav>
</div>

<!-- Карточки студентов -->
<div id="card" class="container mt-4"> 
    <div class="row justify-content-center">
        <?php foreach($students as $student): ?>
            <div class="col-md-4 mb-3 d-flex justify-content-center">
                <div class="card" style="width: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($student['first_name']) . ' ' . htmlspecialchars($student['last_name']); ?></h5>
                        <p class="card-text">
                            <p class="card-text">Группа: <?php echo htmlspecialchars($student['group_name']); ?></p>
                        </p>
                            <a href="./Views/view.details.student.php?id=<?php echo htmlspecialchars($student['id']); ?>" class="btn btn-primary">Подробнее</a>
                            <a href="./Views/view.grades.student.php?id=<?php echo htmlspecialchars($student['id']); ?>" class="btn btn-primary">Оценки</a>                            
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>    
</div>

<!-- Нижний колонтитул с контактными данными -->
<footer class="border-top py-3 bg-light mt-auto">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <ul class="list-unstyled d-flex gap-3 mb-1">
                    <li><a href="#" class="text-decoration-none text-muted">Подробная информация о проекте</a></li>
                </ul>
                <p class="text-muted small mb-0">&copy; 2026 StudentProject</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">Телефон: +7 (999) 645-79-59</p>
                <p class="mb-0">Email: <a href="mailto:kirillzukov134@gmail.com">kirillzukov134@gmail.com</a></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

<!-- Подсказка -->
<!-- class="container mt-4 w-50 p-3 border" style="background-color: #eee;" -->