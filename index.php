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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="./main.css">
    <title>Student Management System</title>
</head>
<body class="d-flex flex-column vh-100">

<!-- Название проекта -->
<!-- <div id="name-project" class="container mt-4">
    <div class="text-center">
        <h1 class="display-4">Student Management System</h1>
        <p class="lead text-muted">Система управления данными студентов</p>
        <hr class="my-4">
    </div>
</div> -->

<!-- Поиск -->
<!-- <nav class="navbar navbar-light justify-content-center p-1">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
    </form>
</nav> -->


<header class="header">
    <div class="logo">
        <img src="./images/logo.png" alt="logo">
        <h2>Studify</h2>
    </div>
</header>

<div class="main-container"> 
    <nav class="sidebar"> 
        <div class="item"> 
            <i class="material-symbols-outlined">view_apps</i> 
            <a href="./Views/view.all.students.php">Список студентов</a> 
        </div> 
        <div class="item"> 
            <i class="material-symbols-outlined">add_notes</i> 
            <a href="./Adds/add.student.php">Добавить студента</a> 
        </div> 
        <div class="item"> 
            <i class="material-symbols-outlined">lists</i> 
            <a href="./Adds/add.student.php">Все предметы</a> 
        </div> 
        <div class="item"> 
            <i class="material-symbols-outlined">schedule</i> 
            <a href="./Adds/add.student.php">Расписание пар</a> 
        </div> 
    </nav> 


<!-- Карточки студентов -->
<main class="content">
    <div class="cards-grid">
        <?php foreach($students as $student): ?>
            <div class="student-card">
                <h5><?php echo htmlspecialchars($student['first_name']) . ' ' . htmlspecialchars($student['last_name']); ?></h5>
                <div class="group_info">
                    <p>Группа: <?php echo htmlspecialchars($student['group_name']); ?></p>
                </div>
                <div class="card-actions">
                    <a href="./Views/view.details.student.php?id=<?php echo $student['id']; ?>" class="btn btn-primary">Подробнее</a>
                    <a href="./Views/view.grades.student.php?id=<?php echo $student['id']; ?>" class="btn btn-secondary">Оценки</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</div>


<!-- Подвал -->
<footer class="footer">
    <div class="footer-container">
        <ul class="footer-links">
            <li><a href="#">Подробная информация о проекте</a></li>
        </ul>
        <div class="footer-info">
            <p>&copy; 2026 StudentProject</p>
            <p>Телефон: +7 (999) 645-79-59</p>
            <p>Email: <a href="mailto:kirillzukov134@gmail.com">kirillzukov134@gmail.com</a></p>
        </div>
    </div>
</footer>
</body>
</html>

<!-- Подсказка -->
<!-- class="container mt-4 w-50 p-3 border" style="background-color: #eee;" -->