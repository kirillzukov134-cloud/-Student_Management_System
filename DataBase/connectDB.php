<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=StudentsProject', 'root', ''); 
}catch(PDOException $error){
    die('Error: ' . $error->getMessage());
}
