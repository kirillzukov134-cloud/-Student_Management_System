<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

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
    <div class="container mt-3 w-50 p-4 border border border-dark" style="background-color: #eee;">
        <?php foreach($studentResult as $student): ?>
            <div class="card-header bg-success text-white">
                <h5 class="text-center">
                    <?php echo $student['last_name'] . ' ' . $student['first_name']; ?>
                </h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover">
                    <tr>
                        <th class="bg-light">Группа:</th>
                        <td><?php echo $student['group_name']; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Номер телефона:</th>
                        <td><?php echo $student['phone']; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Почта:</th>
                        <td><?php echo $student['email']; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">День рождения:</th>
                        <td><?php echo $student['birth_date']; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">Навигационные кнопки:</th>
                        <td>
                            <a href="../index.php" class="btn btn-success">Назад</a>
                            <a href="../Edits/edit.details.php?id=<?php echo $student['id']; ?>" class="btn btn-warning">Изменить</a>
                            <a href="../Deletes/delete.student.php?id=<?php echo $student['id']; ?>" class="btn btn-danger">Удалить</a>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>