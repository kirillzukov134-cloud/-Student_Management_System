<?php

//Функция для полного списка всех студентов в Table.php
function selectFullStudents($pdo){
    $sql =
    "SELECT 
    groups.name AS Группа,
    students.Name_student AS Имя_студента,
    students.Surname_student AS Фамилия_студента
FROM students
JOIN groups ON students.group_id = groups.id";

$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
return $results;
}

//Вывод студентов в Main.php (card)
function selectIDCard($pdo){
    $sql = 
    "SELECT 
        students.id,
        students.Name_student AS Имя_студента, 
        students.Surname_student AS Фамилия_студента,
        groups.name AS Группа
    FROM students
    JOIN groups ON students.group_id = groups.id";

$statement = $pdo->prepare($sql);
$statement->execute();
$students = $statement->fetchAll(PDO::FETCH_ASSOC);
return $students;
}

//Добавление студентов в add.view.student.php
function AdditionStudent($pdo, $data){
    $data = [
        'Name_student' => $_POST['Name_student'],
        'Surname_student' => $_POST['Surname_student'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'group_id' => $_POST['group_id'],
        'birth_date' => $_POST['birth_date']
    ];

    $sql =  
    "INSERT INTO `students`(`Name_student`, `Surname_student`, `phone`, `email`, `group_id`, `birth_date`) 
    VALUES (:Name_student, :Surname_student, :phone, :email, :group_id, :birth_date)";
    $statement = $pdo->prepare($sql);
    return $statement->execute($data);
}

//Функциия для подробной информации о студенте
function ShowMoreDetails($pdo){
    $id = $_GET['id'];
    $sql = "SELECT 
        students.id,
        groups.name AS Группа, 
        students.Name_student AS Имя_студента, 
        students.Surname_student AS Фамилия_студента, 
        students.phone AS Номер_телефона, 
        students.email AS Почта, 
        students.birth_date AS День_рождения 
    FROM students
    JOIN groups ON students.group_id = groups.id 
    WHERE students.id = :id";
    
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

//Функция для получения всех оценок студента по всем предметам
function GradesStudent($pdo){
    $id = $_GET['id'];
    $sql = 
    "SELECT 
        grades.grade AS Оценка,
        subjects.Name_subjects AS Предмет
    FROM grades
    JOIN students ON grades.student_id = students.id
    JOIN subjects ON grades.subject_id = subjects.id
    WHERE students.id = :id";
    
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

//Функция для получения данных одного студента в edit.details.php
function getStudentById($pdo, $id){
    $sql = "SELECT * FROM students WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

//Функция для обновления данных существующего студента
function EditStudent($pdo, $data){
    $sql = "UPDATE `students` SET 
        `Name_student` = :Name_student,
        `Surname_student` = :Surname_student,
        `phone` = :phone,
        `email` = :email,
        `group_id` = :group_id,
        `birth_date` = :birth_date
    WHERE `id` = :id";
    
    $statement = $pdo->prepare($sql);
    return $statement->execute($data);
}

//Удаление студента в view.details.student.php

function DeleteStudent($pdo, $id){
    $sql = "DELETE FROM students WHERE id = :id";
    $statement = $pdo->prepare($sql);
    return $statement->execute(['id' => $id]);
}