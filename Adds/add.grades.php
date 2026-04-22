<?php
require "../DataBase/connectDB.php";
require "../Functions/functions.php";

// Получаем списки для выпадающих меню
$students = getAllStudents($pdo);
$subjects = getAllSubjects($pdo);

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'student_id' => $_POST['student_id'],
        'subject_id' => $_POST['subject_id'],
        'grade' => $_POST['grade']
    ];
    
    $result = AddGrade($pdo, $data);
    
    if ($result) {
        header('Location: ../Views/view.grades.student.php?id=' . $_POST['student_id']);
        exit;
    } else {
        echo 'Ошибка при добавлении оценки...';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Добавление оценки</title>
</head>
<body>
    <div class="container mt-4 w-50 p-3 border border-dark" style="background-color: #eee;">
        <form method="post">
            <h2 class="text-center">Добавление оценки</h2>
            
            <!-- Выбор студента -->
            <div class="mb-3">
                <label for="student" class="form-label">Студент:</label>
                <select name="student_id" class="form-select" required>
                    <option value="">-- Выберите студента --</option>
                    <?php foreach($students as $student): ?>
                        <option value="<?php echo $student['id']; ?>">
                            <?php echo $student['Name_student'] . ' ' . $student['Surname_student']; ?>
                            (<?php echo $student['group_name']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- Выбор предмета -->
            <div class="mb-3">
                <label for="subject" class="form-label">Предмет:</label>
                <select name="subject_id" class="form-select" required>
                    <option value="">-- Выберите предмет --</option>
                    <?php foreach($subjects as $subject): ?>
                        <option value="<?php echo $subject['id']; ?>">
                            <?php echo $subject['Name_subjects']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- Выбор оценки -->
            <div class="mb-3">
                <label for="grade" class="form-label">Оценка:</label>
                <select name="grade" class="form-select" required>
                    <option value="">-- Выберите оценку --</option>
                    <option value="5">5 - Отлично</option>
                    <option value="4">4 - Хорошо</option>
                    <option value="3">3 - Удовлетворительно</option>
                    <option value="2">2 - Неудовлетворительно</option>
                </select>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-success">Добавить</button>
                <button type="reset" class="btn btn-secondary">Сбросить</button>
                <a href="../index.php" class="btn btn-primary">Назад</a>
            </div>
        </form>
    </div>
</body>
</html>