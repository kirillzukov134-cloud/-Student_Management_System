<?php

//Функция для полного списка всех студентов в Table.php
function selectFullStudents($pdo){
    $sql =
    "SELECT 
        students.id,
        groups.name AS group_name,
        students.Name_student AS first_name,
        students.Surname_student AS last_name
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
        students.Name_student AS first_name, 
        students.Surname_student AS last_name,
        groups.name AS group_name
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

//Функция которая добавляет предмет
function AdditionSubjects($pdo, $data){
    $data = [
        "Name_Subjects"=> $_POST["Name_Subjects"],
    ];
    
    $sql = "INSERT INTO `subjects`(`Name_subjects`) VALUES (:Name_Subjects)";
    $statement = $pdo->prepare($sql);
    return $statement->execute($data);
}

// Добавить оценку
function AdditionGrade($pdo, $data) {
    $sql = "INSERT INTO `grades` (`grade`, `student_id`, `subject_id`) 
            VALUES (:grade, :student_id, :subject_id)";
    
    $statement = $pdo->prepare($sql);
    return $statement->execute([
        ':grade' => $data['grade'],
        ':student_id' => $data['student_id'],
        ':subject_id' => $data['subject_id']
    ]);
}

//Функциия для подробной информации о студенте
function ShowMoreDetails($pdo){
    $id = $_GET['id'];
    $sql = "SELECT 
        students.id,
        groups.name AS group_name, 
        students.Name_student AS first_name, 
        students.Surname_student AS last_name, 
        students.phone AS phone, 
        students.email AS email, 
        students.birth_date AS birth_date 
    FROM students
    JOIN groups ON students.group_id = groups.id 
    WHERE students.id = :id";
    
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

//Функция для получения всех оценок студента по всем предметам
function GradesStudent($pdo, $student_id){
    $sql = "SELECT 
                grades.id as grade_id,
                grades.grade AS Оценка,
                subjects.Name_subjects AS Предмет
            FROM grades
            JOIN subjects ON grades.subject_id = subjects.id
            WHERE grades.student_id = :student_id
            ORDER BY subjects.Name_subjects";
    
    $statement = $pdo->prepare($sql);
    $statement->execute(['student_id' => $student_id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Получить оценку по ID
function getGradeById($pdo, $id) {
    $sql = "SELECT * FROM grades WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([':id' => $id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
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

function DeleteSubject($pdo, $id){
    $sql = "DELETE FROM `subjects` WHERE id = :id";
    $statement = $pdo->prepare($sql);
    return $statement->execute(['id' => $id]);    
}

function DeleteGrade($pdo, $id){
    $sql = "DELETE FROM `grades` WHERE id = :id";
    $statement = $pdo->prepare($sql);
    return $statement->execute(['id' => $id]);    
}


//Функция которая выводит все предметы
function getAllSubjects($pdo){
    $sql = 'SELECT id, Name_subjects FROM subjects';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Получить предмет по ID
function getSubjectById($pdo, $id) {
    $sql = "SELECT * FROM subjects WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Обновить предмет
function EditSubject($pdo, $data) {
    $sql = "UPDATE subjects SET Name_subjects = :Name_Subjects WHERE id = :id";
    $statement = $pdo->prepare($sql);
    return $statement->execute([
        ':Name_Subjects' => $data['Name_Subjects'],
        ':id' => $data['id']
    ]);
}

// Получить всех студентов с группами
function getAllStudents($pdo) {
    $sql = "SELECT 
                students.*,
                groups.name AS group_name
            FROM students
            JOIN groups ON students.group_id = groups.id
            ORDER BY students.Surname_student";
    
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Добавить оценку
function AddGrade($pdo, $data) {
    $sql = "INSERT INTO `grades` (`grade`, `student_id`, `subject_id`) 
            VALUES (:grade, :student_id, :subject_id)";
    
    $statement = $pdo->prepare($sql);
    return $statement->execute([
        ':grade' => $data['grade'],
        ':student_id' => $data['student_id'],
        ':subject_id' => $data['subject_id']
    ]);
}


// Обновить оценку
function EditGrade($pdo, $data) {
    $sql = "UPDATE `grades` SET 
                `grade` = :grade,
                `student_id` = :student_id,
                `subject_id` = :subject_id
            WHERE `id` = :id";
    
    $statement = $pdo->prepare($sql);
    return $statement->execute([
        ':grade' => $data['grade'],
        ':student_id' => $data['student_id'],
        ':subject_id' => $data['subject_id'],
        ':id' => $data['id']
    ]);
}