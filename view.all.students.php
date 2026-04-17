<?php
require "./DataBase/connectDB.php";
require "./functions/functions.php";

$students = selectFullStudents($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <div class="text-center">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Группа</th>
                        <th>Имя_студента</th>
                        <th>Фамилия_студента</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $student): ?>
                    <tr>
                        <td><?php echo $student['Группа'] ?></td>
                        <td><?php echo $student['Имя_студента']?></td>
                        <td><?php echo $student['Фамилия_студента']?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
                <a href="./Main.php" class="btn btn-success ">Назад</a>
        </div>
    </div>
</body>
</html>