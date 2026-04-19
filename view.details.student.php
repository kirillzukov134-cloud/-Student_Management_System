<?php
require "./DataBase/connectDB.php";
require "./functions/functions.php";

$studentResult = ShowMoreDetails($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Подробный просмотр студента</title>
</head>
<body>
    <div class="card mb-3" style="max-width: 600px;">
        <?php foreach($studentResult as $student): ?>
            <div class="card-header bg-success text-white">
                <h5>
                    <?php echo $student['Имя_студента'] . ' ' . $student['Фамилия_студента']; ?>
                </h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover">
                    <tr>
                        <th class="bg-light">Группа:</th>
                        <td><?php echo $student['Группа']; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Номер телефона:</th>
                        <td><?php echo $student['Номер_телефона']; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Почта:</th>
                        <td><?php echo $student['Почта']; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">День рождения:</th>
                        <td><?php echo $student['День_рождения']; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Навигационные кнопки:</th>
                        <td>
                            <a href="./Main.php" class="btn btn-success">Назад</a>
                            <a href="./edit.details.php?id=<?php echo $student['id']; ?>" class="btn btn-warning">Изменить</a>
                            <a href="./delete.student.php?id=<?php echo $student['id']; ?>" class="btn btn-danger">Удалить</a>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>