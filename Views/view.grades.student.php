<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

$student_id = $_GET['id'];

$grades = GradesStudent($pdo, $student_id);
$student = getStudentById($pdo, $student_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Оценки студента: <?php echo $student['Name_student']; ?></title>
</head>
<body>
    <div class="container mt-4 w-50 p-3 border border-dark" style="background-color: #eee;">
        <div class="text-center">
            <h2>Оценки: <?php echo $student['Name_student'] . ' ' . $student['Surname_student']; ?></h2>
            
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Оценка</th>
                        <th>Предмет</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($grades as $grade): ?>
                    <tr>
                        <td><?php echo $grade['Оценка']; ?></td>
                        <td><?php echo $grade['Предмет']; ?></td>
                        <td>
                            <a href="../Edits/edit.grade.php?id=<?php echo $grade['grade_id']; ?>&student_id=<?php echo $student_id; ?>" class="btn btn-warning">Изменить</a>
                            <a href="../Deletes/delete.grade.php?id=<?php echo $grade['grade_id']; ?>&student_id=<?php echo $student_id; ?>" class="btn btn-danger">Удалить</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <a href="../Adds/add.grades.php?student_id=<?php echo $student_id; ?>" class="btn btn-success">Добавить оценку и предмет</a>
            <a href="../index.php" class="btn btn-primary">Назад</a>
        </div>
    </div>
</body>
</html>