<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

$students = selectFullStudents($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Список всех студентов</title>
</head>
<body>
    <div class="col-md-6 container mt-4 w-50 p-3 border border border-dark" style="background-color: #eee;">
        <div class="text-center">
            <h2>Список всех студентов</h2>
            <table class="table table-bordered table-striped", style="border: 5px;">
                <thead class="table-dark">
                    <tr>
                        <th>Имя_студента</th>
                        <th>Фамилия_студента</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $student): ?>
                    <tr>
                        <td><?php echo $student['first_name']; ?></td>
                        <td><?php echo $student['last_name']; ?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
                <a href="../index.php" class="btn btn-primary">Назад</a>
        </div>
    </div>
</body>
</html>