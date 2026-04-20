<?php
require "./DataBase/connectDB.php";
require "./functions/functions.php";

$students = GradesStudent($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4 w-50 p-3 border border border-dark" style="background-color: #eee;">
        <div class="text-center">
            <legend><b><h1>Все оценки студента</h1></b></legend>
            <table class="table table-bordered table-striped", style="border: 5px;">
                <thead class="table-dark">
                    <tr>
                        <th>Оценка</th>
                        <th>Предмет</th>
                        <!-- <th>Дата добавления</th> -->
                        <th>Кнопка удаления</th>
                    </tr>                        
                </thead>
                <tbody>
                    <?php foreach($students as $student): ?>
                    <tr>
                        <td><?php echo $student['Оценка']?></td>
                        <td><?php echo $student['Предмет']?></td>
                        <td>
                            <a href="./delete.grade.php" class="btn btn-danger">Удалить</a>  
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                <a href="./Main.php" class="btn btn-primary">Назад</a>
                <a href="#" class="btn btn-success">Добавить оценку</a>
                <a href="./edit.grade.php" class="btn btn-warning">Редактировать</a>              
        </div>
    </div>
</body>
</html>


