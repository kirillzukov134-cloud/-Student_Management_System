<?php

require '/DataBase/connectDB.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']);
    $password = $_POST['password'];

//Проверка, существует ли пользователь
$sql = 'SELECT id FROM users WHERE username = :username';
$statement = $pdo->prepare($sql);
$statement->execute(['username']);
    if($statement->fetch()){
        echo "Пользовательне найден";
    }
}
$passwordHash = password_hash($password, PASSWORD_DEFAULT);