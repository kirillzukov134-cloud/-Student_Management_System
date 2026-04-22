<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

$students = getAllSubjects($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Список всех предметов</title>
</head>
<body>
    <div class="col-md-5 container mt-4 w-50 p-3 border border border-dark" style="background-color: #eee;">
        <div class="text-center">
            <legend><b>Список предметов</b></legend>
            <table class="table table-bordered table-striped" style="border: 2px;">
                <thead class="table-dark">
                    <tr>
                        <th>ID предмета</th>
                        <th>Предметы</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $student): ?>
                    <tr>
                        <th><?php echo $student['id'] ?></th>
                        <th><?php echo $student['Name_subjects'] ?></th>
                        <th>
                            <a href="../Deletes/delete.subject.php?id=<?php echo $student['id']; ?>" class="btn btn-danger">Удалить</a>
                            <a href="../Edits/edit.subjects.php?id=<?php echo $student['id']; ?>" class="btn btn-warning">Изменить</a>
                        </th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                <a href="../Adds/add.subjects.php" class="btn btn-success">Добавить предмет</a>
                <a href="../index.php" class="btn btn-primary">Назад</a>
        </div>
    </div>
</body>
</html>