<?php
require "./DataBase/connectDB.php";
require "./functions/functions.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = [
        'Name_Subjects'=> $_POST['Name_Subjects'],
    ];
    
    $result =  AdditionSubjects($pdo, $data);

    if($result){
        header('Location: ./list_subjects.php');
        exit;
    }else {
        echo 'Ошибка при добавлении предмета';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Добавление предмета</title>
</head>
<body>
    <div class="container mt-4 w-50 p-3 border border border-dark" style="background-color: #eee;">
        <form action="post">
            <h2 class="text-center">Добавление предмета</h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Название предмета</label>
                    <input type="text" name="Name_Subjects" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Добавить</button>
                    <button type="reset" class="btn btn-secondary">Сбросить</button>
                    <a href="./Main.php" class="btn btn-primary"> Назад</a>
                </div>
        </form>
    </div>
</body>
</html>