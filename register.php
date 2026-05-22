<?php
require __DIR__ . '/DataBase/connectDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Проверка, существует ли пользователь
    $sql = 'SELECT id FROM users WHERE username = :username';
    $statement = $pdo->prepare($sql);
    $statement->execute(['username' => $username]);
    
    if ($statement->fetch()) {
        echo "Пользователь уже существует";
    } else {
        // Хешируем пароль
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        // Добавление пользователя
        $insertSql = "INSERT INTO users (username, password, email, phone) VALUES (:username, :password, :email, :phone)";
        $insertStatement = $pdo->prepare($insertSql);
        
        if($insertStatement->execute([
            'username' => $username,
            'password' => $passwordHash,
            'email' => $email,
            'phone' => $phone
        ])){
            header('Location: ./login.html');
            // echo 'Регистрация прошла успешно';
        }
    }
}
?>
